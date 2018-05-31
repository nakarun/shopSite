<html>
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
        $query = "select * from item i, item_Pic ip where i.itemID = ip.itemID and i._sellUser = ";
	$query .= $_SESSION["user_id"];
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");
?>
<ul>
<table border="0" bgcolor="">
<tr>
<?php
        while ($row = mysql_fetch_array($result)){

	$query_modify = "select max(modifydate) from item_modify where itemID = ".$row["itemID"];
	$result_modify = mysql_query($query_modify)
                        or die("問い合わせの実行に失敗しました。");
	$row_modify = mysql_fetch_array($result_modify);

        print "
                <td>
                        <table border='1'>
                         <tr>
                                <td width='160' height='40'>".$row["itemName"]."</td>
                         </tr>
                         <tr>
                                <td colspan=2 align='center' width='160' height='130'><img src='./upload/".$row["picName"]."' alt='./upload/".$row["itemName"]."' width='150' height='130'>
                                </td>
                         </tr>
                         <tr>
                                <td align='right' width='160' height='40'>".$row["price"]."円</td>
                         </tr>";
        if ($row["_orderUser"] != NULL) {
		print "	 <tr>	<td width='160' height='40'>出品日：".$row["_selldate"]."</td>	</tr>";
                print "  <tr>   <td width='160' height='40'>受注日：".$row["_orderdate"]."</td>  </tr>";
                print "  <tr>   <td align='right' width='160' height='40'>売り切れ</td>        </tr>";

        } else {
                print "  <tr>   <td width='160' height='40'>出品日：".$row["_selldate"]."</td>  </tr>";
                print "  <tr>   <td width='160' height='40'>最終更新日：".$row_modify["max(modifydate)"]."</td>  </tr>";		
                print "  <tr>	<td align='right' width='160' height='40'>販売中</td>		</tr>";
		print "  <tr>
                                <td>
                                 <form method='post' action='./item_deleteform.php?m_id=".$row["itemID"]."'>
                                        <input type='hidden' name='m_id' value='".$_GET["itemID"]."'>
                                        <input type='submit' value='商品を削除する' />
                                 </form>
                                </td> 
                         </tr>
			";
        
        print "         <tr>
                                <td>
				 <form method='post' action='./modify.php?m_id=".$row["itemID"]."'>
                                        <input type='hidden' name='m_id' value='".$_GET["itemID"]."'>
                                        <input type='submit' value='商品を編集する' />
                                 </form>
				</td> 
                         </tr>
               ";
	}
	print "</table></td>";
        }
?>
</tr>
</table>
</ul>
</body>
</html>
