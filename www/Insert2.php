<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>線上訂票</title>
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
		input[type="hidden"] {
			visibility: hidden;\
		}
		</style>
		<script ="text/javascript">
			function check()
			{
				if(form1.SeatNo.value == "")
				{
					alert("請選擇座位");
					form1.SeatNo.focus();
				}
				else
					form1.submit();
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
		<div data-role="page" id="insert1">
		
			<div data-role="header">
				<h1>線上訂票</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<form id= "form1" name= "form1" method= "post" action= "Insert3.php" >
					<label for="select1" class="select">選擇座位：</label>
					<select name="SeatNo" id="select1" data-mini="true" data-inline="true">
						<option value="">請選擇</option>
						<?php
							$result=mysql_query("SELECT * FROM ticket WHERE BusID='$_POST[BusOrder]' AND Date='$_POST[bDate]'");
							for($i=1;$i<22;$i++)   //共21個座位
							{
								$ticket=mysql_fetch_row($result);
								if($ticket[5]==$i)   //若在table中找到座位編號相同則為已訂位，不列出
								{
									;
								}
								else
									echo "<option value='",$i,"'>",$i,"</option>";
							}
						?>
					</select>
					<?php echo '<input type="hidden" name="CustomerID" value="',$_POST[CustomerID],'">'; ?>
					<?php echo '<input type="hidden" name="BusID" value="',$_POST[BusOrder],'">'; ?>
					<?php echo '<input type="hidden" name="RouteID" value="',$_POST[RouteID],'">'; ?>
					<?php echo '<input type="hidden" name="bDate" value="',$_POST[bDate],'">'; ?>
					<p align="center"><input type="button" data-theme="b" value="確認" onClick="check()" /></p>
				</form>
			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page-->

	</body>
</html>
