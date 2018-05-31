<html>
  <meta http-equiv="Content-Type" 
            content="text/html; charset=utf8">
  <link rel="stylesheet" type="text/css" href="style.css" />
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
	$query = "select * from item_keyword, item, item_Pic where item_keyword.keyword like ";
	$query .= "'%".$_POST["search"]."%'";
	$query .= "and item.itemID = item_Pic.itemID and item_keyword.itemID = item.itemID";
	$result = mysql_query($query)
		or die("問い合わせの実行に失敗しました。");
?>

<table border="0">
<?php
	while ($row = mysql_fetch_array($result)){
	print "
	      <td><table>
	       <tr>
	       	<td><h3>".$row["itemName"]."</h3></td>
	       	<td align='right'>".$row["price"]."円</td>
	       </tr>
	       <tr>
	       	<td colspan=2><img src='./upload/".$row["picName"]."' alt='./upload/".$row["itemName"]."' width='100' height='100'>
	       	</td>
	       </tr>";
        if ($row["_orderUser"] != NULL) {
                print "  <tr>    <td align='right' width='160' height='40'>売り切れ</td>        </tr>";

        } else {
                print "  <tr>
                                 <td>
                                 <form method='post' action='./item.php?m_id=".$row["itemID"]."'>
                                        <input type='hidden' name='m_id' value='".$_GET["itemID"]."'>
                                        <input type='submit' value='購入ページへ' />
                                 </form>
                                </td>
                         </tr>";

        }
	
	print"
		</table>
		</td>
	       ";
	       	       
	}
?>
</table>
<?php	mysql_close($link);	?>
</body>
</html>

