<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>扫一扫</title>
</head>
<body>
	<form action="<?php echo U('SaoMa/qrcode');?>" method="post">
		订单号：<input type="number" name="order_id"><br/>
		订单名称：<input type="text" name="order_detail"><br/>
		订单金额：<input type="number" name="order_money"><br/>
		<input type="submit" name="submit" value="提交">
	</form>
</body>
</html>