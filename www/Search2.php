<html>
	<head>
		<meta http-equiv " Content-Type " content= " text/html; charset=utf-8" >
		<title>訂票紀錄查詢</title>
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
		</style>
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
		<div data-role="page" id="search2">
		
			<div data-role="header">
				<h1>訂票紀錄查詢</h1>
				<a href="index2.php" rel="external" data-icon="home" class="ui-btn-left">回首頁</a>
			</div><!-- /header-->
			
			<div data-role="main" class="ui-content">
				<?php
					$result=mysql_query("SELECT * FROM customer WHERE CustomerID='$_POST[CustomerID]'");
					$CName=mysql_fetch_array($result);
					//查無資料
					if(!$CName)
					{
						echo "<script>document.location.href='SearchNotFound.html';</script>";
						exit();
					}
					else
						echo "<p>親愛的",$CName[0],"您好！以下是您的訂票紀錄：</p>";
				?>
				<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
					<thead>
						<tr>
							<th data-priority="1">車票編號</th>
							<th>路線編號</th>
							<th data-priority="2">起始站</th>
							<th data-priority="3">終點站</th>
							<th data-priority="4">班次</th>
							<th>乘車日期</th>
							<th>座位</th>
						 </tr>
					</thead>
					<tbody>
						<?php
							$tmatch=mysql_query("SELECT * FROM ticket WHERE CustomerID='$_POST[CustomerID]'");
							for($i=0;$i<mysql_num_rows($tmatch);$i++)
							{
								$rs=mysql_fetch_array($tmatch);
								$rmatch=mysql_query("SELECT * FROM route WHERE RouteID='$rs[3]'");
								$rs2=mysql_fetch_array($rmatch);
								$bmatch=mysql_query("SELECT * FROM bus WHERE BusID='$rs[2]'");
								$rs3=mysql_fetch_array($bmatch);
								echo "<tr>";
								echo "<th>",$rs[0],"</th>";
								echo "<td>",$rs[3],"</td>";
								echo "<td>",$rs2[1],"</td>";
								echo "<td>",$rs2[2],"</td>";
								echo "<td>",$rs3[3],"</td>";
								echo "<td>",$rs[4],"</td>";
								echo "<td>",$rs[5],"</td>";
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
