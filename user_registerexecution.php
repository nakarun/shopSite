<html>
<head>
  <title>top</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php
        $link = mysql_connect("localhost","runa","rkn3tht5") or die("MySQLへの接続に失敗しました。");
        mysql_select_db("dbs1") or die("データベースの選択に失敗しました。");
        mysql_query("set names utf8") or die("文字コードの設定に失敗しました。");
        /*問い合わせの用意*/
        $query = "insert into user(userName, userPassword) values(";
	$query .= "'".$_POST["user_name"]."',";
	$hash = md5($_POST["user_password"]);
	$query .= "'".$hash."'";
	$query .= ")";
	/*$query .= "'".$_POST["user_password"]."')";*/
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");
	print $hash;
?>

<?php
	$query2 = "select userId from user where userName ='";
	$query2 .= $_POST["user_name"];
	$query2 .= "' and userPassword = '";
	$query2 .= $hash;
	$query2 .= "'";
	$result2 = mysql_query($query2)
			or die("問い合わせの実行に失敗しました。");
?>
	
登録しました。

<?php
	$row = mysql_fetch_array($result2);
	print "あなたのIDは";
	print $row["userId"];
	print "です。";
	print "<br>";
?>
<a href="user_loginform.php">ログインする</a>
</body>
</html>
