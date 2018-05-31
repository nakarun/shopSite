<html>
<head>
	<title>title</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>

<div id="site-box">

<div id="a-box">
</div>

<div id="b-box">
<div class="menu">▽MENU</div><BR>
<ul>
<a href="./user_loginform.php" target="contents">ログイン</a><br><br>
<a href="./user_registerform.php" target="contents">新規登録</a><br><br>
<a href="./top.php" target="contents">TOPに戻る</a><br><br>
<a href="./sell_firstform_picture.php" target="contents">出品する</a><br><br>
<a href="./user_selledItem.php" target="contents">あなたが出品したもの</a><br><br>
<a href="./user_orderedItem.php" target="contents">あなたが購入したもの</a><br><br>
<a href="./user_acount_delete.php" target="contents">ユーザアカウント削除</a><br><br>
<a href="./user_loginout.php" target="contents">ログアウト</a><br>
</ul>
</div>

<div id="c-box">
<iframe src="top.php" name="contents" width="100%" height="100%" frameborder="0">alt</iframe>
</div>

<div id="d-box">
<div class="search">▽KEYWORD SEARCH</div><BR>

<form method="post" action="search.php" target="contents">
<input type="text" name="search" value="search" size=14> 
<input type="submit" value="検索" />
</form>

<BR>
<div class="category">▽CATEGORY SEARCH</div>
<?php
	$link = mysql_connect("localhost","runa","rkn3tht5")
			or die("MySQLへの接続に失敗しました。");
	mysql_select_db("dbs1")
				or die("データベースの選択に失敗しました。");
	mysql_query("set names utf8")
			 or die("文字コードの設定に失敗しました。");
	/*問い合わせの用意*/
	$query = "select distinct category from item_category";
	$result = mysql_query($query)
		or die("問い合わせの実行に失敗しました。");
?>
<ul>
<?php
  while ($row = mysql_fetch_array($result)){
   print "<a href='./category.php?category=".$row["category"]."' target='contents'><div align='left'><p>".$row["category"]."</p></div></a>";
  }
?>
</ul>
<?php	mysql_close($link);	?>
</div> <?php /*d-boxの終わり*/ ?>


<div id="e-box">
<BR>copylight (c) nakayama.com All right reserved.<BR><BR>
</div>

</div> <?php /*site-boxの終わり*/ ?>
</body>
</html>

