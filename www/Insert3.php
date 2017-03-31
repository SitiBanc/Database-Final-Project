<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>線上訂票</title>
		<link rel="stylesheet" href="jquery.mobile-1.4.5.css" />
		<script src="jquery.js"></script>
		<script src="jquery.mobile-1.4.5.js"></script>
		<style type="text/css">
		body {
			background:url(BUS2.jpg);
			background-repeat:repeat-y;
			background-position:center center;
			background-attachment:scroll;
			background-size:cover;
		}
		.ui-page {
			background: transparent;
		}
		.ui-content{
			background: transparent;
		}
		.ui-input-text{
			width:350px !important;
		}
		.ui-btn{
			width:50px !important;
		}
		input[type="hidden"] {
			visibility: hidden;\
		}
		</style>
	</head>
	<body>
		<?php	
			$conn = mysql_connect("localhost", "root", "admin");
			mysql_select_db("misbus") or die("ERROR!!!");
			mysql_query("set names utf8 ");
			mysql_query("SET CHARACTER SET 'UTF8';");
			mysql_query('SET CHARACTER_SET_CLIENT=UTF8;');
			mysql_query('SET CHARACTER_SET_RESULTS=UTF8;');
		 ?>
		<div data-role="page" id="delete1">
		
			<div data-role="header">
				<h1>線上訂票</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<?php
					mysql_query("INSERT INTO ticket (CustomerID,BusID,RouteID,Date,Seat) VALUES ('$_POST[CustomerID]','$_POST[BusID]','$_POST[RouteID]','$_POST[bDate]','$_POST[SeatNo]')");
				?>
				<?php echo "您的訂票資料：<br>身分證字號：",$_POST[CustomerID],"<br>巴士車號：",$_POST[BusID],"<br>路線編號",$_POST[RouteID],"<br>乘車日期：",$_POST[bDate],"<br>座位編號：",$_POST[SeatNo] ?>
				<p>訂票成功！</p>
			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page-->

	</body>
</html>
