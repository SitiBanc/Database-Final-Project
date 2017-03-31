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
		<div data-role="page" id="delete1">
		
			<div data-role="header">
				<h1>線上退票</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<form id= "form2" name= "form2" method= "post" action= "Delete2.php" >
					<label for="select1" class="select"><p align="center">選擇車票：</p></label>
					<select name="ticket" id="select1" data-mini="true" data-inline="true">
						<option value="">請選擇</option>
						<?php
							$result=mysql_query("SELECT * FROM ticket WHERE CustomerID='$_POST[CustomerID]'");
							$checkt=mysql_fetch_array($result);
							//查無資料
							if(!$checkt)
							{
								echo "<script>document.location.href='DeleteNotFound.html';</script>";
								exit();
							}
							echo "<option value='",$checkt[0],"'>搭乘路線：",$checkt[3],"  |  乘車日期：",$checkt[4],"  |  座位：",$checkt[5],"</option>";
							for($i=1;$i<mysql_num_rows($result);$i++)
							{
								$ticket=mysql_fetch_row($result);
								echo "<option value='",$ticket[0],"'>搭乘路線：",$ticket[3],"  |  乘車日期：",$ticket[4],"  |  座位：",$ticket[5],"</option>";
							}
						?>
					</select>
					<p align="center"><input type="button" data-theme="b" value="刪除" onClick="check()" /></p>
				</form>
			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page delete1-->
		
	</body>
</html>
