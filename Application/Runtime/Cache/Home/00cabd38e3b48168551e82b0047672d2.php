<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="post" action="<?php echo U('Index/pay');?>">
		订单号:<input type="text" name="id"><br/>
		订单名称:<input type="text" name="name"><br/>
		总金额:<input type="text" name="total"><br/>
		商品描述:<input type="text" name="body"><br/>
		<input type="submit" name="submit" value="提交">
	</form>
</body>
</html>