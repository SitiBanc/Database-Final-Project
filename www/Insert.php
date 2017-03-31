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
		   <!-- 此check()函式在最後的「下一步」按鈕會用到 -->
			function check()
			{
					if(form2.Route.value == "")
					{
						alert("請選擇搭乘路線");
						form2.Route.focus();
					}
					else
						form2.submit();
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
		<div data-role="page" id="insert1">
			<div data-role="header">
				<h1>線上訂票</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<?php
					//檢查客戶資料是否已存於資料庫中，若已存在則執行UPDATE
					mysql_query("INSERT INTO customer (Name,PhoneNumber,CustomerID,eMail)VALUES ('$_POST[Name]', '$_POST[PhoneNumber]', '$_POST[CustomerID] ', '$_POST[eMailAddr]')ON DUPLICATE KEY UPDATE Name='$_POST[Name]', PhoneNumber='$_POST[PhoneNumber]', eMail='$_POST[eMailAddr]'; ");
					$route=mysql_query("SELECT * FROM route");
				 ?>
				<p>Step2.請選擇搭乘路線：</p>
				<form id="form2" name="form2" method= "post" action= "Insert1.php" >
					<div class="ui-field-contain">
						
					    <label for="select1" class="select"><p align="center">搭乘路線：</p></label>
						<select name="Route" id="select1" data-mini="true" data-inline="true">
							<option value="">請選擇</option>
						<?php
							//動態產生下拉式選單
							for($i=0;$i<mysql_num_rows($route);$i++)
							{
								$result=mysql_fetch_array($route);
								echo "<option value='",$result[0],"'> ",$result[1]," - ",$result[2],"</option>";
							}
						?>
						</select>
						<?php echo '<input type="hidden" name="CustomerID" value="',$_POST[CustomerID],'">'; ?>
					</div>
					<!-- type值為button而非submit，加上onClick="check()"來判斷以上的表單資料是否有填寫 -->
					<p align="center"><input type="button" data-theme="b" value="下一步" onClick="check()" /></p>
				</form>

			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page insert1-->
		
	</body>
</html>
