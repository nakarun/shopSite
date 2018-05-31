<head>
	<meta http-equiv="Content-Type" 
            content="text/html; charset=utf8">
	<title>File Uploader</title>
</head>

<body>
<p>file uploader</p>
<?php
	$updir = "./upload/";
	$filename = $_FILES['upfile']['name'];
	if (move_uploaded_file($_FILES['upfile']['tmp_name'], $updir.$filename) == FALSE){
		print("アップロードに失敗しました。<br>もう一度やり直してください。");
		/* print($_FILES['upfile']['error']); */
	}else{  
        	chmod($updir.$filename, 0644);
		/* print ("<b>".$filename."<b> uploaded!<br><BR>"); */
        	print ("<img src='./upload/".$filename."' alt='./upload/".$filename."' width='200', height='200'><BR>");
        	print ("<a href='./upload/".$filename."'>file</a>");
	}
?>

<?php
        $link = mysql_connect("localhost","runa","rkn3tht5")
                        or die("MySQLへの接続に失敗しました。");
        mysql_select_db("dbs1")
                                or die("データベースの選択に失敗しました。");
        mysql_query("set names utf8")
                         or die("文字コードの設定に失敗しました。");
        /*問い合わせの用意*/
	$query = "INSERT INTO item_Pic(picName) values ('";
	$query .= $filename;
	$query .= "')";

        $result = mysql_query($query)
                or die("問い合わせの実行に失敗しました。");
?>

<h3><div align='center'>商品を登録してください。</div></h3>

<p>
<form method="post" action="sell_thirdform_detailexecution.php">
        商品名：<input type="text" name="m_name" size=18 > <br />
        価格：<input type="text" name="price" size=18 > <br />
	説明：<textarea name="description" cols="30" rows="5" ></textarea> <br />
	カテゴリー：<input type="text" name="category1" size="18" > <input type="text" name="category3" size="18" > <br />
		    <input type="text" name="category2" size="18" > <input type="text" name="category4" size="18" > <br />
	検索キーワード：<input type="text" name="keyword1" size="18" > <input type="text" name="keyword3" size="18" > <br />
			<input type="text" name="keyword2" size="18" > <input type="text" name="keyword4" size="18" > <br />
<input type="submit" value="送信" />
</form>

</body>
</html>
