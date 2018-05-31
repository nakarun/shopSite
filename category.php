<head>
	<title>category</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>
<?php
	$link = mysql_connect("localhost","runa","rkn3tht5")
			or die("MySQLへの接続に失敗しました。");
	mysql_select_db("dbs1")
				or die("データベースの選択に失敗しました。");
	mysql_query("set names utf8")
			 or die("文字コードの設定に失敗しました。");
	$query = "select item.itemID, item.itemName, item.price, item._orderUser, item_Pic.picName, item_category.category from item_category, item, item_Pic where item_category.category = '".$_GET["category"]."' and item_category.itemID = item.itemID and item.itemID = item_Pic.itemID";
	$result = mysql_query($query)
		or die("問い合わせの実行に失敗しました。");
?>
<?php   print "<h2>".$_GET["category"]."</h2>";	?>
<table border="0">
<tr>
<ul>
<?php

	while ($row = mysql_fetch_array($result)){
	print "
	      <td><table>
	       <tr>
	       <td><h2>".$row["itemName"]."</h2></td>
	       <td align='right'>\\".$row["price"]."</td>
	       </tr>
	       <tr>
	       <td></td>
	       <td align='right'><h5></h5></td>
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
	print "	       </table></td>
	       ";
	       }
?>
</ul>
</tr>
</table>
<?php	mysql_close($link);	?>
</body>
</html>

