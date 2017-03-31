<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<body>

	<?php
		$conn = mysql_connect("localhost", "root", "admin");
		mysql_select_db("misbus") or die("ERROR!!!");

		mysql_query("set names utf8");
		mysql_query("SET CHARACTER SET 'UTF8';");
		mysql_query('SET CHARACTER_SET_CLIENT=UTF8;');
		mysql_query('SET CHARACTER_SET_RESULTS=UTF8;');
			//設定編碼以免亂碼

		 $data=mysql_query("select * from route");
		 echo "共",mysql_num_rows($data),"筆資料";
	?>
	<br><br>
	<input type="button" value="新增資料" onclick=" location.href='http://localhost/Insert.html' ">

	<input type="button" value="刪除資料" onclick=" location.href='http://localhost/Delete.html' ">

	<input type="button" value="更新資料" onclick=" location.href='http://localhost/Update.html' ">

	<input type="button" value="查詢資料" onclick=" location.href='http://localhost/Search.html' ">
	<br><br>
	<?php
	  for($i=0;$i<mysql_num_rows($data);$i++)
	  { 
		$rs=mysql_fetch_row($data);
	?>  
	<?php echo "路線編號：",$rs[0]//資料庫的第一欄 ?><br>
	起始站：<?php echo $rs[1],"站"//資料庫的第二欄 ?><br>
	終點站：<?php echo $rs[2],"站"//資料庫的第三欄 ?><br>
	價格：<?php echo $rs[3],"元"//資料庫的第四欄 ?><br><br>
	<?php 
	  }
	?>
	</body>
</html>
