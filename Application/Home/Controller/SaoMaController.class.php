<?php
namespace Home\Controller;
use Think\Controller;
Vendor("dmf_demo.f2fpay.model.builder.AlipayTradePrecreateContentBuilder");
Vendor("dmf_demo.f2fpay.service.AlipayTradeService");
class SaoMaController extends Controller
{
	public function index()
	{
		$this->display();
	}
	public function qrcode()
	{
		$post=I('post.');
		$config=C('alipay_config');
		$order_money=$post['order_money'];
		$order_id=$post['order_id'];
		$order_detail=$post['order_detail'];
		$timeExpress = "5m";
		$body="asdasd";
		$qrPayRequestBuilder = new \AlipayTradePrecreateContentBuilder();
		$qrPayRequestBuilder->setOutTradeNo($order_id);
		$qrPayRequestBuilder->setTotalAmount($order_money);
		$qrPayRequestBuilder->setTimeExpress($timeExpress);
		$qrPayRequestBuilder->setSubject($order_detail);
		$qrPayRequestBuilder->setBody($body);
		$qrPay = new \AlipayTradeService($config);
		$qrPayResult = $qrPay->qrPay($qrPayRequestBuilder);
		switch ($qrPayResult->getTradeStatus()){
			case "SUCCESS":
				$response = $qrPayResult->getResponse();
				$qrcode = $response->qr_code;
				$level=3;
				$size=4;
				Vendor('phpqrcode.phpqrcode');
				$errorCorrectionLevel =intval($level) ;//容错级别
				$matrixPointSize = intval($size);//生成图片大小
				//生成二维码图片
				$object = new \QRcode();
				ob_clean();
				/*$qrod=$object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);*/
				\QRcode::png($qrcode,false,$level,$size);
				break;
			case "FAILED":
				echo "支付宝创建订单二维码失败!!!"."<br>--------------------------<br>";
				if(!empty($qrPayResult->getResponse())){
					print_r($qrPayResult->getResponse());
				}
				break;
			case "UNKNOWN":
				echo "系统异常，状态未知!!!"."<br>--------------------------<br>";
				if(!empty($qrPayResult->getResponse())){
					print_r($qrPayResult->getResponse());
				}
				break;
			default:
				echo "不支持的返回状态，创建订单二维码返回异常!!!";
				break;
		}
		return ;
	}
}