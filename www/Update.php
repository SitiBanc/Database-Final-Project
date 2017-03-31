<html>
	<head>
		<meta http-equiv " Content-Type " content= " text/html; charset=utf-8" >
		<title>個人資料修改</title>
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
			width:50px !important;
		}
		input[type="hidden"] {
			visibility: hidden;\
		}
		</style>
		<script type="text/javascript">
			var rePN = /\d{10}/g;    //手機號碼必為10碼數字
			function check2()
			{
				if(form2.Name.value == "") 
				{
					alert("未輸入姓名");
					form2.Name.focus();
				}
				else if(form2.PhoneNumber.value=="")
				{
					alert("未輸入手機號碼");
					form2.PhoneNumber.focus();
				}
				else if(!rePN.test(form2.PhoneNumber.value))
				{
					alert("手機號碼有誤");
					form2.PhoneNumber,focus();
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
		
		<div data-role="page" id="update2">
		
			<div data-role="header">
				<h1>個人資料修改</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<?php
					$result=mysql_query("SELECT * FROM customer WHERE CustomerID='$_POST[CustomerID]'");
					$rs=mysql_fetch_array($result);
					//查無資料
					if(!$rs)
					{
						echo "<script>document.location.href='UpdateNotFound.html';</script>";
						exit();
					}
				?>
				<p>請修改個人資料：</p>
				<span>*為必填欄位</span>
				
				<form id= "form2" name= "form2" method= "post" action= "Update2.php" >
				<div class="ui-field-contain">
					<label for="text-name"><p align="center">* 姓名：</p></label>
					<?php echo '<input type="text" data-clear-btn="true" name="Name" id="text-name" value="',$rs[0],'">' ?>
				</div>
				<div class="ui-field-contain">
					<label for="tel"><p align="center">* 手機號碼：</p></label>
			     	<?php echo '<input type="tel" data-clear-btn="true" name="PhoneNumber" id="tel" value="',$rs[1],'">' ?>
				</div>
				<div class="ui-field-contain">
					<label for="text-id"><p align="center">身分證字號：</p></label>
					<?php echo '<input type="text" disabled="disabled" name="dCustomerID" id="text-id" value="',$rs[2],'">'; ?>
					<?php echo '<input type="hidden" name="CustomerID" value="',$rs[2],'">'; ?>
				</div>
				<div class="ui-field-contain">
					<label for="email"><p align="center">電子信箱：</p></label>
			    	<?php echo '<input type="email" data-clear-btn="true" name="eMailAddr" id="email" value="',$rs[3],'">'?>
				</div>
				<p align="center"><input type="button" data-theme="b" value="確認" onClick="check2()" /></p>

			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page update2-->
		
		
	</body> 
</html>
