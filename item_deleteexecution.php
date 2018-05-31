<head>
  <title>top</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php
        session_start();
        $link = mysql_connect("localhost","runa","rkn3tht5")
                        or die("MySQLへの接続に失敗しました。");
        mysql_select_db("dbs1")
                                or die("データベースの選択に失敗しました。");
        mysql_query("set names utf8")
                         or die("文字コードの設定に失敗しました。");
        /*問い合わせの用意*/
        $query = "delete from item where itemID =";	
	$query .= $_GET["m_id"];
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");

	$query = "delete from item_Pic where itemID =";
	$query .= $_GET["m_id"];
	$result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");

	$query = "delete from item_category where itemID =";
	$query .= $_GET["m_id"];
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");

        $query = "delete from item_keyword where itemID =";
        $query .= $_GET["m_id"];
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");
?>
データを削除しました。<br>
<a href="top.php" target='contents'>TOPに戻る</a>
<?php mysql_close($link);	?>
</body>
</html>
