<html>
<head>
	<meta v="Content-Type" 
            content="text/html; charset=utf8">
<body>

<?php
	$link = mysql_connect("localhost","runa","rkn3tht5")
			or die("MySQLへの接続に失敗しました。");
	mysql_select_db("dbs1")
			or die("データベースの選択に失敗しました。");
	mysql_query("set names utf8")
			 or die("文字コードの設定に失敗しました。");
?>
<?php	session_start();	?>
<?php
	print date("Y-m-d");

	$query = "update item set ";
	$query .= "_orderuser = ";
	$query .= $_SESSION["user_id"].", _orderdate = '";
	$query .= date("Y-m-d H:i:s");
	$query .= "' where itemID = ";
	$query .= $_GET["item_id"];
	$result = mysql_query($query)
		or die("問い合わせの実行に失敗しました。");
	print "<div align='center'>購入承りました.</div>";
?>
<div align='center'><a href='./top.php'>TOPに戻る</a></div><br><br>

<?php	mysql_close($link);	?>
</body>
</html>
