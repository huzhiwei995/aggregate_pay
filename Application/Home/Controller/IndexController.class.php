<?php
namespace Home\Controller;
use Think\Controller;
Vendor("Alipay_wap.aop.AopClient");
Vendor("Alipay_wap.aop.request.AlipaySystemOauthTokenRequest");
Vendor("Alipay_wap.aop.request.AlipayUserInfoShareRequest");
Vendor("Alipay_wap.wappay.buildermodel.AlipayTradeWapPayContentBuilder");
Vendor("Alipay_wap.wappay.service.AlipayTradeService");
class IndexController extends Controller {
    public function index(){
        $str="http://www.budaiqb.com/index.php/Home/Index/callback";
		$str=urlencode($str);
		$this->assign('str',$str);
		$this->display();
    }
    /**
     * 授权获取用户信息
     */
    public function callback()
	{	

		$code=$_GET['auth_code'];
		$aop = new \AopClient();
		$config = C("alipay_config");
		$aop->gatewayUrl = $config['gatewayUrl'];
		$aop->appId = $config['app_id'];
		$aop->rsaPrivateKey = $config['merchant_private_key'];
		$aop->alipayrsaPublicKey = $config['alipay_public_key'];
		$aop->apiVersion = '1.0';
		$aop->signType = 'RSA2';
		$aop->postCharset = 'UTF-8';
		$aop->format='json';
		$aop->timestamp= date("Y-m-d H:i:s",time());
		//结束
		$request = new \AlipaySystemOauthTokenRequest();
		$request->setGrantType("authorization_code");
		$request->setCode("$code");
		$result = $aop->execute($request);
		$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
		$accessToken = $result->$responseNode->access_token;
			if(!empty($responseNode) && $accessToken !="" ){
				$request1 = new \AlipayUserInfoShareRequest();
				$result1 = $aop->execute($request1,$accessToken);
				$responseNode1 = str_replace(".", "_", $request1->getApiMethodName()) . "_response";
				$resultCode1 = $result1->$responseNode1->user_id;
				dump($resultCode1);exit;
			} else {
				echo "失败";
			}
	}
	public function showlist()
	{
		$this->display();
	}
	public function pay()
	{
		$id=I('post.id');
		$name=I('post.name');
		$total=I('post.total');
		$body='';
		$timeout_express="1m";
		$aop = new \AopClient();
		//参数配置开始
		$config = C("alipay_config");
		$aop->gatewayUrl = $config['gatewayUrl'];
		$aop->appId = $config['app_id'];
		$aop->rsaPrivateKey = $config['merchant_private_key'];
		$aop->alipayrsaPublicKey = $config['alipay_public_key'];
		$aop->apiVersion = '1.0';
		$aop->signType = 'RSA2';
		$aop->postCharset = 'UTF-8';
		$aop->format='json';
		$aop->timestamp= date("Y-m-d H:i:s",time());
		$payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
		$payRequestBuilder->setBody($body);
    	$payRequestBuilder->setSubject($name);
    	$payRequestBuilder->setOutTradeNo($id);
    	$payRequestBuilder->setTotalAmount($total);
    	$payRequestBuilder->setTimeExpress($timeout_express);
    	$payResponse = new \AlipayTradeService($config);
    	$result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

	}
	/*后台处理*/
	public function notify()
	{	
		$config = C("alipay_config");
		$arr=$_POST;
		$alipaySevice = new \AlipayTradeService($config); 
		$alipaySevice->writeLog(var_export($_POST,true));
		$result = $alipaySevice->check($arr);
		if($result){
			echo "success";
		}
		exit;
	}
	/*前台回调*/
	public function return1()
	{	
		$config = C("alipay_config");
		$arr=$_GET;
		$alipaySevice = new \AlipayTradeService($config);
		$result = $alipaySevice->check($arr);
		dump($arr);
		dump($result);exit;
	}
}