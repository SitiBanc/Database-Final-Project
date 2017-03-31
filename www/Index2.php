<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>X光客運網路訂票系統</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
		</style>
	</head>
	<body>
		<div data-role="page">
		
			<div data-role="header">
				<h1>X光客運網路訂票系統</h1>
					<?php
					$conn = mysql_connect("localhost", "root", "admin");
					mysql_select_db("misbus") or die("ERROR!!!");
					//設定編碼以免亂碼
					mysql_query("set names utf8");
					mysql_query("SET CHARACTER SET 'UTF8';");
					mysql_query('SET CHARACTER_SET_CLIENT=UTF8;');
					mysql_query('SET CHARACTER_SET_RESULTS=UTF8;');
					
					?>
			</div><!-- /header -->

			<div data-role="main" class="ui-content">
				<div class="ui-grid-a" style="height:95px;">
					<div class="ui-block-a" style="height:100%;"><div class="ui-bar ui-bar-c" height="200" width="100%" align="center"><a href="Insert.html" rel="external" data-inline="true" class="ui-shadow ui-btn ui-corner-all">線上訂票</a></div></div>
					<div class="ui-block-b" style="height:100%;"><div class="ui-bar ui-bar-c" height="200" width="100%" align="center"><a href="Delete.html" rel="external" data-inline="true" class="ui-shadow ui-btn ui-corner-all">線上退票</a></div></div>
				</div>
				<div class="ui-grid-a" style="height:95px;">
					<div class="ui-block-a" style="height:100%;"><div class="ui-bar ui-bar-c" height="200" width="100%" align="center"><a href="Update.html" rel="external" data-inline="true" class="ui-shadow ui-btn ui-corner-all">個人資料修改</a></div></div>
					<div class="ui-block-b" style="height:100%;"><div class="ui-bar ui-bar-c" height="200" width="100%" align="center"><a href="Search2.html" rel="external" data-inline="true" class="ui-shadow ui-btn ui-corner-all">訂票紀錄查詢</a></div></div>
				</div>
				<div class="ui-grid-a" style="height:95px;">
					<div class="ui-block" style="height:100%;"><div class="ui-bar ui-bar-c" height="200" width="100%" align="center"><a href="Search.php" rel="external" data-inline="true" class="ui-shadow ui-btn ui-corner-all">路線及票價查詢</a></div></div>
				</div>

			</div><!-- /main -->

			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
		
		</div><!-- /page -->

	</body>
</html>
