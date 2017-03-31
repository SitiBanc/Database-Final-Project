<html>
	<head>
		<meta http-equiv " Content-Type " content= " text/html; charset=utf-8" >
		<title>路線及票價查詢</title>
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
			width:100px !important;
		}
		</style>
		<script type="text/javascript">
			function check()
			{
				if(form1.RouteID.value == "")
				{
					alert("請選擇查詢路線");
					form1.RouteID.focus();
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
			mysql_query("set names utf8");
			mysql_query("SET CHARACTER SET  'UTF8 '; ");
			mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
			mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
		 ?>
		 <div data-role="page" id="search1">
			<div data-role="header">
				<h1>路線及票價查詢</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<p>請選擇欲查詢路線：</p>
				<form id="form1" name="form1" method= "post" action= "Search.php#search2" >  

				 <div class="ui-field-contain">
				    <label for="select1" class="select"><p align="center">查詢路線：</p></label>
					<select name="RouteID" id="select1" data-mini="true" data-inline="true">
						<option value="">請選擇</option>
						<?php
							$route = mysql_query("SELECT * FROM route");
							for($i=0;$i<mysql_num_rows($route);$i++)
							{
								$result=mysql_fetch_array($route);
								echo "<option value='",$result[0],"'> ",$result[1]," - ",$result[2],"</option>";
							}
						?>
					</select>
				</div>
				<p align="center"><input type="button" data-theme="b" value="查詢" onClick="check()"/></p>
				<br><br><br><br><br><br><br><br><br></br></br></br></br></br></br></br></br>
			</div><!-- /main-->
			
			<div data-role="footer">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page search1-->
		<div data-role="page" id="search2">
			<div data-role="header">
				<h1>路線及票價查詢</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
					<thead>
						<tr>
							<th data-priority="1">路線編號</th>
							<th>起始站</th>
							<th>終點站</th>
							<th>票價</th>
						 </tr>
					</thead>
					<tbody>
						<?php
							$rmatch=mysql_query("SELECT * FROM route WHERE RouteID='$_POST[RouteID]'");
							for($i=0;$i<mysql_num_rows($rmatch);$i++)
							{
								$rs=mysql_fetch_array($rmatch);
								echo "<tr>";
								echo "<th>",$rs[0],"</th>";
								echo "<td>",$rs[1],"</td>";
								echo "<td>",$rs[2],"</td>";
								echo "<td>",$rs[3],"</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				
			</div><!-- /main-->
			
			<div data-role="footer" data-position="fixed">
				<?php
					echo "The server is running version ".PHP_VERSION." of PHP.";
				?>
			</div><!-- /footer -->
			
		</div><!-- /page search2-->
	</body>
</html>
