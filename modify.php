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
        $query = "select * from item, item_Pic where item.itemID = item_Pic.itemID and item.itemID =";	
	$query .= $_GET["m_id"];
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");
?>
<?php
	$query2 = "select * from item_category where itemID =";
	$query2 .= $_GET["m_id"];
	$result2 = mysql_query($query2)
		or die("問い合わせの実行に失敗しました。");
?>
<?php
	$query3 =  "select * from item_keyword where itemID =";
	$query3 .= $_GET["m_id"];
	$result3 = mysql_query($query3)
		or die("問い合わせの実行に失敗しました。");
?>
<?php
	$row = mysql_fetch_array($result);
	print "
		<form method='post' action='modify_execution.php?m_id=".$row["itemID"]."'>
		       商品名 <br> <input type='text' name='m_name' value= '".$row["itemName"]."' size=18 > <br />
 		       価格 <br> <input type='text' name='price' value='".$row["price"]."' size=18 > <br />
 		       説明 <br> <textarea name='description' cols='30' rows='5' >".$row["description"]."</textarea> <br />
 		       <br>";
//	$num = 1;
//	while($row2 = mysql_fetch_array($result2)){		
//		$category = "category".$num;
//		$c_id = "c".$num."_id";
//		print "<input type='text' name='".$category."' value='".$row2["category"]."' size='18' > <br />
//                     <input type='hidden' name='".$c_id."' value='".$row2["item_category_ID"]."'>";
//		$num += 1;
//	}
	
//	if ($num < 5) {
//		while($num < 5){
//              	$category = "category".$num;
//             	$c_id = "c".$num."_id";
//			print "<input type='text' name='".$category."' value='' size='18' > <br />
//              	       <input type='hidden' name='".$c_id."' value=''>";
//                	$num += 1;
//		}
//	}
//	print $num;

/*	print "	       検索キーワード <br>";
	$num1 = 1;
	while($row3 = mysql_fetch_array($result3)){
		$keyword = "keyword".$num1;
		$k_id = "k".$num1."_id";
		print "<input type='text' name='".$keyword."' value='".$row3["keyword"]."' size='18' > <br />
                       <input type='hidden' name='".$k_id."' value='".$row3["item_search_keyword_ID"]."'>";
		$num1 += 1;
	}
	
	if ($num1 < 5){
		while($num1 < 5){
                	$keyword = "category".$num1;
                	$k_id = "c".$num1."_id";         
                	print "<input type='text' name='".$category."' value='' size='18' > <br />
                       	       <input type='hidden' name='".$c_id."' value=''>";
                	$num1 += 1;
		}
	}
	print $num1;
*/
	print "         <input type='hidden' name='m_id' value=".$_GET["m_id"].">
			<input type='submit' value='商品を編集する' />
		</form>	";
?>
<?php mysql_close($link);	?>
</body>
</html>
