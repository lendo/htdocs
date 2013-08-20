<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php 
			// 这是单行注释
			/*
			这是多行注释
			*/
			echo '你好，世界！';
			echo '<br/>';
			print '你好，世界！';
			
			$name = '中国人';
			echo '<br/>';
			echo "$name 你好！";
			echo '<br/>';
			echo '$name 你好！';
			echo '<br/>';
			echo $name . ' 你好！';
			echo '<br/>';
			echo strlen($name);
			echo '<br/>';
			echo count($name);
		?>
	</body>
</html>