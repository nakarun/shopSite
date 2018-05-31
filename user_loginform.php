<?php
//セッション開始
session_start();

	$link = mysql_connect('localhost', 'runa', 'rkn3tht5')  or die("MySQLへの接続に失敗しました。");
	mysql_select_db("dbs1") or die ("データベースの選択に失敗しました。");
	//mysql_query("set name utf8") or die ("文字コードの設定に失敗しました。");

	$status = "none";

	//セッションにセットされていたらログイン済み
	if(isset($_SESSION["user_id"]))
	  $status = "logged_in";
	else if(!empty($_POST["user_id"]) && !empty($_POST["user_password"])){
	  //ユーザ名、パスワードが一致する行を探す
	  $password = md5($_POST["user_password"]);
	  $stmt = "SELECT count(*) FROM user WHERE userId = ";
	  $stmt .= $_POST["user_id"];
	  $stmt .= " AND userPassword = '";
	  $stmt .= $password;
	  $stmt .= "'";

	  $result = mysql_query($stmt)
                or die("問い合わせの実行に失敗しました。");
	  print $result;

	  $row = mysql_fetch_array($result);
	  print $row["count(*)"];
	  //結果を保存
	  //$stmt -> store_result();
	  //結果の行数が1だったら成功
	  if($row["count(*)"] == 1){
	    $status = "ok";
	    //セッションにユーザ名を保存
	    $_SESSION["user_id"] = $_POST["user_id"];
	  }else
	    $status = "failed";
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>ログイン</title>
  </head>
  <body>
    <h1>ログイン</h1>
    <?php if($status == "logged_in"): ?>
      <p>ログイン済み</p><br>
      <?php	print $_SESSION["user_id"]; ?><br>
      <a href="top.php">トップページ</a>
    <?php elseif($status == "ok"): ?>
      <p>ログイン成功</p><br>
      <a href="top.php">トップページ</a>
    <?php elseif($status == "failed"): ?>
      <p>ログイン失敗</p>
    <?php else: ?>
      <form method="POST" action="user_loginform.php">
        ユーザID：<input type="text" name="user_id" />
        パスワード：<input type="password" name="user_password" />
        <input type="submit" value="ログイン" />
      </form>
    <?php endif; ?>
    <br>
    <a href="user_registerform.php">新規登録</a>
  </body>
</html>
