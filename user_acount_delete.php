<?php

session_start();
$_SESSION = array(); 
session_destroy();

?>

<?php
        $link = mysql_connect("localhost","runa","rkn3tht5")
                        or die("MySQLへの接続に失敗しました。");
        mysql_select_db("dbs1")
                                or die("データベースの選択に失敗しました。");
        mysql_query("set names utf8")
                         or die("文字コードの設定に失敗しました。");
?>

<?php
	print $_SESSION["user_id"];
	$query = "delete from user where userID = ";
	$query .= $_SESSION["user_id"];
        $result = mysql_query($query)
                or die("ユーザアカウントの削除に失敗しました。");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ログアウト</title>
  </head>
  <body>
    <h1>ログアウト</h1>
    <p>完了</p>








  </body>
</html>
