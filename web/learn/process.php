<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>订单结果</h1>
		<h3><?php echo ('订单已提交');?></h3>
		<p>
		<?php 
			$time = '处理时间：'.date('Y-m-d H:i:s');
			$name = '<p>名称：'.$_POST['name'].'</p>';
			$price = '<p>价格：'.$_POST['price'].'</p>';
			echo $time;
			echo $name;
			echo $price;
		?>
		</p>
	</body>
</html>