<html>
<head>
  <meta http-equivv="Content-Type" 
            content="text/html; charset=utf8">
</head>

<body>
<?php
	$link = mysql_connect("localhost","runa","rkn3tht5")
			or die("MySQLへの接続に失敗しました。");
	mysql_select_db("dbs1")
				or die("データベースの選択に失敗しました。");
	mysql_query("set names utf8")
			 or die("文字コードの設定に失敗しました。");
?>
<?php
	$query = "update item set ";
	$query .= "itemName = '".$_POST["m_name"]."'";
	$query .= ", price =";
	$query .= $_POST["price"];
	$query .= ", description = '";
	$query .= $_POST["description"];
	$query .= "' ";
	$query .= "where itemID = ".$_GET["m_id"];
	$result = mysql_query($query)
		or die("商品の編集に失敗しました。");
	print "商品データを更新しました。";

        $query2 = "insert into item_modify(itemID, modifydate) values(";
        $query2 .= "itemID = ";
        $query2 .= $_GET["m_id"];
        $query2 .= ", modifydate = '";
        $query2 .= date('Y-m-d H:i:s');
        $query2 .= "')";
        $result2 = mysql_query($query2)
                or die("修正時刻の記録に失敗しました。");
?>
	<br>
	<a href='./top.php' target='contents'>TOPに戻る</a>

<?php
	$query2 = "insert into item_modify(itemID, modifydate) values(";
	$query2 .= "itemID = ";
	$query2 .= $_GET["m_id"];
	$query2 .= ", modifydate = '";
	$query2 .= date("Y-m-d H:i:s");
	$query2 .= "')";
	$result2 = mysql_query($query2)
		or die("修正時刻の記録に失敗しました。");
?>

<?php
/*
	$query3 = "update item_category set ";

	$query3 .= "category = '";
	$query3 .= $_POST["category1"];
	$query3 .= "' where item_category_ID = ";
	$query3 .= $_POST["c1_id"];

        $query3_2 = "update item_category set ";

        $query3_2 .= "category = '";
        $query3_2 .= $_POST["category2"];
        $query3_2 .= "' where item_category_ID = ";
        $query3_2 .= $_POST["c2_id"];

        $query3_3 = "update item_category set ";

        $query3_3 .= "category = '";
        $query3_3 .= $_POST["category3"];
        $query3_3 .= "' where item_category_ID = ";
        $query3_3 .= $_POST["c3_id"];

        $query3_4 = "update item_category set ";

        $query3_4 .= "category = '";
        $query3_4 .= $_POST["category4"];
        $query3_4 .= "' where item_category_ID = ";
        $query3_4 .= $_POST["c4_id"];

        $result3 = mysql_query($query3)
                or die("問い合わせの実行に失敗しました。0");
        $result3_2 = mysql_query($query3_2)
                or die("問い合わせの実行に失敗しました。00");
        $result3_3 = mysql_query($query3_3)
                or die("問い合わせの実行に失敗しました。000");
        $result3_4 = mysql_query($query3_4)
                or die("問い合わせの実行に失敗しました。1");
*/
?>

<?php
/*
        $query4 = "update item_search_keyword set ";

        $query4 .= "keyword = '";
        $query4 .= $_POST["keyword1"];
        $query4 .= "' where item_search_keyword_ID = ";
        $query4 .= $_POST["k1_id"];

        $query4_2 = "update item_search_keyword set ";

        $query4_2 .= "keyword = '";
        $query4_2 .= $_POST["keyword2"];
        $query4_2 .= "' where item_search_keyword_ID = ";
        $query4_2 .= $_POST["k2_id"];

        $query4_3 = "update item_search_keyword set ";

        $query4_3 .= "keyword = '";
        $query4_3 .= $_POST["keyword3"];
        $query4_3 .= "' where item_search_keyword_ID = ";
        $query4_3 .= $_POST["k3_id"];

        $query4_4 = "update item_search_keyword set ";

        $query4_4 .= "keyword = '";
        $query4_4 .= $_POST["keyword4"];
        $query4_4 .= "' where item_search_keyword_ID = ";
        $query4_4 .= $_POST["k4_id"];

        $result4 = mysql_query($query4)
                or die("問い合わせの実行に失敗しました。2");
        $result4_2 = mysql_query($query4_2)
                or die("問い合わせの実行に失敗しました。3");
        $result4_3 = mysql_query($query4_3)
                or die("問い合わせの実行に失敗しました。4");
        $result4_4 = mysql_query($query4_4)
                or die("問い合わせの実行に失敗しました。5");
*/
?>

<?php	mysql_close($link);	?>

</body>
</html>

