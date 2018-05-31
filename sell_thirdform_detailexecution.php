<html> 
  <meta http-equivv="Content-Type" 
            content="text/html; charset=utf8">
<body>
<?php
	session_start();

	$link = mysql_connect("localhost","runa","rkn3tht5")
			or die("MySQLへの接続に失敗しました。");
	mysql_select_db("dbs1")
				or die("データベースの選択に失敗しました。");
	mysql_query("set names utf8")
			 or die("文字コードの設定に失敗しました。");
?>
<br>
<?php
	$query = "insert into item (itemName, _sellUser, _selldate, price, description) values (";
	$query .= "'".$_POST["m_name"]."',";
	$query .= $_SESSION["user_id"];
	$query .= ", '";
        $query .= date("Y-m-d H:i:s");
        $query .= "', ";
	$query .= $_POST["price"];
	$query .= ", '";
	$query .= $_POST["description"];
	$query .= "')";
	$result = mysql_query($query)
		or die("商品登録に失敗しました。");
	print "商品の登録に成功しました。\n";
?>
<br>
	<a href='./top.php' target='contents'>TOPに戻る</a>
<br>
<?php
	$query5 = "select itemID from item where itemName = '";
	$query5 .= $_POST["m_name"];
	$query5 .= "' and _sellUser = ";
	$query5 .= $_SESSION["user_id"];
        $result5 = mysql_query($query5)
                or die("商品IDの取得に失敗しました。");
?>
<br>
<?php
	$row = mysql_fetch_array($result5);	
?>
<br>
<?php
	if ($_POST["category1"] != null) {
        	$query3 = "insert into item_category(itemID, category) values ( ";
        	$query3 .= $row["itemID"];
        	$query3 .= ", '";
        	$query3 .= $_POST["category1"];
        	$query3 .= "')";		
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
	}

	if ($_POST["category2"] != null) {
        	$query3 = "insert into item_category(itemID, category) values ( ";
        	$query3 .= $row["itemID"];
        	$query3 .= ", '";
        	$query3 .= $_POST["category2"];
        	$query3 .= "')";
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
	}

        if ($_POST["category3"] != null) {
        	$query3 = "insert into item_category(itemID, category) values ( ";
        	$query3 .= $row["itemID"];
        	$query3 .= ", '";
        	$query3 .= $_POST["category3"];
        	$query3 .= "')";
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
	}

        if ($_POST["category4"] != null) {
                $query3 = "insert into item_category(itemID, category) values ( ";
                $query3 .= $row["itemID"];
                $query3 .= ", '";
                $query3 .= $_POST["category4"];
                $query3 .= "')";
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
	}

	print "<br>";
?>
<br>
<?php
        if ($_POST["keyword1"] != null) {
                $query3 = "insert into item_keyword(itemID, keyword) values ( ";
                $query3 .= $row["itemID"];
                $query3 .= ", '";
                $query3 .= $_POST["keyword1"];
                $query3 .= "')";
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
        }

        if ($_POST["keyword2"] != null) {
                $query3 = "insert into item_keyword(itemID, keyword) values ( ";
                $query3 .= $row["itemID"];
                $query3 .= ", '";
                $query3 .= $_POST["keyword2"];
                $query3 .= "')";
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
        }

        if ($_POST["keyword3"] != null) {
                $query3 = "insert into item_keyword(itemID, keyword) values ( ";
                $query3 .= $row["itemID"];
                $query3 .= ", '";
                $query3 .= $_POST["keyword3"];
                $query3 .= "')";
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
        }

        if ($_POST["keyword4"] != null) {
                $query3 = "insert into item_keyword(itemID, keyword) values ( ";
                $query3 .= $row["itemID"];
                $query3 .= ", '";
                $query3 .= $_POST["keyword4"];
                $query3 .= "')";
        $result3 = mysql_query($query3)
                or die("キーワードの登録に失敗しました。");
        }

        print "<br>";
?>

<?php	mysql_close($link);	?>

</body>
</html>

