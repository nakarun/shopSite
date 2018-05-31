<html>
<head>
  <title>top</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>  
<?php   
        $link = mysql_connect("localhost","runa","rkn3tht5")
                        or die("MySQLへの接続に失敗しました。");
        mysql_select_db("dbs1")
                                or die("データベースの選択に失敗しました。");
        mysql_query("set names utf8")
                         or die("文字コードの設定に失敗しました。");
        /*問い合わせの用意*/
        $query = "select item.itemID, item.itemName, item.price, item.description, item_Pic.picName from item, item_Pic where item.itemID = item_Pic.itemID";
	$query .= " AND item.itemID = ";
	$query .= $_GET["m_id"];
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");
?>
<h1><div align='center'></div></h1>
<ul>


<?php
 $row = mysql_fetch_array($result);
        print "
		<table border='0'>
                       <tr> 
                                <td rowspan=3 olign='center' width='300' height='250'><img src='./upload/".$row["picName"]."' alt='./upload/".$row["itemName"]."' width='300' height='250'></td>
				
				<td width='200' height='40'><h3>　".$row["itemName"]."</h3></td>
			<tr>
				<td align='right' width='200' height='40'>".$row["price"]."円</td>
		        <tr>
		                <td align='right' width='200' height='40'>
		                       <form method='post' action='./order_execution.php?item_id=".$row["itemID"]."'>
		                           <input type='hidden' name='m_id' value='".$_GET["item_id"]."'>
		                           <input type='submit' value='購入する' />
		                       </form>
		                </td>
			
			</tr>
                        <tr>
                                <td colspan=2 lign='left' width='500' height='100'>　".$row["description"]."</td>			
			</tr>		
                 </table>
               ";

?>
</body>
</html>               
