<html>
	<head>
		<meta http-equiv " Content-Type " content= " text/html; charset=utf-8" >
		<title>TEST</title>
		
	</head>
	<body>
		<?php		
			$conn = mysql_connect("140.120.55.53:8080", "root", "iclin2111");
			mysql_select_db("chyi1") or die("ERROR!!!");
			mysql_query("set names utf8");
			mysql_query("SET CHARACTER SET  'UTF8 '; ");
			mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
			mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
		$sql = "select * from customer";//查詢整個表單
		$result = mysql_query($sql) ;
		while($row = mysql_fetch_array($result)){//印出資料
			echo $row[0]." ";
			echo $row[1]."<br>";
		}
		?>
	</body>
</html>