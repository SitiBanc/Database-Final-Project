<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>線上退票</title>
		<link rel="stylesheet" href="jquery.mobile-1.4.5.css" />
		<script src="jquery.js"></script>
		<script src="jquery.mobile-1.4.5.js"></script>
		<style type="text/css">
		body {
			background: url(BUS2.jpg);
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
			width:200px !important;
		}
		</style>
		<script type="text/javascript">
			function check()
			{
					if(form2.ticket.value=="")
					{
						alert("請選擇欲對退訂車票");
						form2.ticket.focus();
					}
					else form2.submit();
			 }
		</script>
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
		<div data-role="page" id="delete2">
		
			<div data-role="header">
				<h1>線上退票</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<?php
					$rs=mysql_query("SELECT * FROM ticket WHERE TicketID='$_POST[ticket]'");
					$CID=mysql_fetch_array($rs);
					$CIDCheck=$CID[1];
					$cmatch=mysql_query("SELECT * FROM customer WHERE CustomerID='$CID[1]'");
					//$customer=mysql_fetch_array($cmatch);
					mysql_query("DELETE FROM ticket WHERE TicketID='$_POST[ticket]'");
					echo "退票成功！";
				?>
				<?php
					$cmatch=mysql_query("SELECT * FROM customer WHERE CustomerID='$CID[1]'");
					//如果該customer已經沒有其他訂票紀錄，則刪除該customer資料
					if(mysql_num_rows($cmatch)<1)
					{
						mysql_query("DELETE FROM customer WHERE CustomerID='$CIDCheck'");
					}
				?>
			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page delete2-->
		
	</body>
</html>