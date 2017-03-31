<html>
	<head>
		<meta http-equiv " Content-Type " content= " text/html; charset=utf-8" >
		<title>線上訂票</title>
		<link rel="stylesheet"  href="jquery.mobile-1.4.5.css" /> 
		<link rel="stylesheet" href="jquery.mobile.datepicker.css" />
		<link rel="stylesheet" href="jquery.mobile.datepicker.theme.css" />
		<script src="jquery.js"></script> 
		<script src="https://rawgithub.com/jquery/jquery-ui/1-10-stable/ui/jquery.ui.datepicker.js"></script>
		<script src="jquery.mobile-1.4.5.js"></script> 
		<script src="jquery.mobile.datepicker.js"></script>
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
			width:100px !important;
		}
		input[type="hidden"] {
			visibility: hidden;\
		}
		</style>
		<script type="text/javascript">
			function check()
			{
				var reD = /\d{8}/g;
				if(form3.BusOrder.value == "")
				{
					alert("請選擇搭乘班次");
					form3.BusOrder.focus();
				}
				else if(form3.bDate.value=="")
				{
					alert("請輸入搭乘日期");
					form3.bDate.focus();
				}
				else if(!reD.test(form3.bDate.value))
				{
					alert("日期格式為yyyymmdd");
					form3.bDate.focus();
				}
				else
					form3.submit();
			}
		</script>
	</head>
	<body>
		<?php
			$conn = mysql_connect("localhost", "root", "admin");
			mysql_select_db("misbus") or die("ERROR!!!");
			mysql_query(" set names utf8");
			mysql_query(" SET CHARACTER SET  'UTF8';");
			mysql_query('SET CHARACTER_SET_CLIENT=UTF8;');
			mysql_query('SET CHARACTER_SET_RESULTS=UTF8;');
		?>
		<div data-role="page">
			<div data-role="header">
				<h1>線上訂票</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<p>Step3.請選擇班次及日期：</p>
				<form id="form3" name="form3" method= "post" action= "Insert2.php" >
					<label for="select2" class="select">搭乘班次：</label>
					<p align="left"><select name="BusOrder" id="select2" data-inline="true">
						<option value="">請選擇</option>
						<?php
							//列出目前有開的班次
							$bmatch=mysql_query("SELECT * FROM bus WHERE RouteID='$_POST[Route]'");
							for($i=0;$i<mysql_num_rows($bmatch);$i++)
							{
								$bus=mysql_fetch_array($bmatch);
								echo "<option value='",$bus[2],"'> ",$bus[3],"</option>";
							}
						?>
					</select></p>
					<div class="ui-field-contain">
						<label for="datepick">搭乘日期(ex:20150116)：</label><br></br>
						<input type="text" data-clear-btn="true" name="bDate" id="datepick" value="">
						<!--<p align="left"><input type="text" data-role="date" name="cDate" id="datepicker" value=""></p>
						<script type="text/javascript">
							var opt={
								showMonthAfterYear:true,
								dateFormat:"yy-mm-dd"
							}
							$("#datepicker").datepicker(opt);
							var bDate = $( ".selector" ).datepicker( "getDate" );
							document.write('<input type="hidden" name="bDate" value="' + bDate+ '">');
						</script>-->
					</div>
					<?php echo '<input type="hidden" name="CustomerID" value="',$_POST[CustomerID],'">'; ?>
					<?php echo '<input type="hidden" name="RouteID" value="',$_POST[Route],'">'; ?>
					<p align="center"><input type="button" data-theme="b" value="下一步" onClick="check()" /></p>
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