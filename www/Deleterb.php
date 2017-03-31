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
			width:150px !important;
		}
		</style>
		<script type="text/javascript">
			function check()
			{
					if(form2.ticket.value=="")
					{
						alert("請選擇欲對退訂車票");
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
				<form id= "form2" name= "form2" method= "post" action= "Delete.php#delete2" >
					<fieldset data-role="controlgroup">
					    <legend>選擇車票：</legend>
						<?php
						$result=mysql_query("SELECT * FROM ticket WHERE CustomerID='$_POST[CustomerID]'");
						$checkt=mysql_fetch_array($result);
						//查無資料
						if(!$checkt)
						{
							echo "<script>document.location.href='DeleteNotFound.html';</script>";
							exit();
						}
						for($i=0;$i<mysql_num_rows($result);$i++)
						{
							$ticket=mysql_fetch_array($result);
							echo '<input type="radio" name="ticket" id="',$i,'" value="',$ticket[0],'>';
							echo '<label for="',$i,'">路線編號：',$ticket[3],'  |  乘車日期：',$ticket[4],'  |  座位：',$ticket[5],'</label>';
						}
						?>
						<input type="radio" name="ticket" id="radio-choice-v-2a" value="" checked="checked">
        				<label for="radio-choice-v-2a">Test</label>
						<input type="radio" name="ticket" id="radio-choice-v-2b" value="">
        				<label for="radio-choice-v-2b">Test2</label>
						<p align="center"><input type="button" data-theme="b" value="刪除" onClick="check()" /></p>
				</fieldset>
				</form>
			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page delete1-->
		
		<div data-role="page" id="delete2">
		
			<div data-role="header">
				<h1>線上退票</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<?php
					$rs=mysql_query("SELECT * FROM ticket WHERE TicketID='$_POST[ticket]'");
					$CID=mysql_fetch_array($rs);
					$cmatch=mysql_query("SELECT * FROM customer WHERE CustomerID='$CID[1]'");
					//$customer=mysql_fetch_array($cmatch);
					mysql_query("DELETE FROM ticket WHERE TicketID='$_POST[ticket]'");
					//如果該customer已經沒有其他訂票紀錄，則刪除該customer資料
					if(mysql_num_rows($cmatch)<1)
					{
						mysql_query("DELETE FROM customer WHERE CustomerID='$CID[1]'");
					}
					echo "退票成功！";
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
