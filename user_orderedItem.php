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
        $query = "select item.itemID, item.itemName, item.price, item_Pic.picName from item, item_Pic where item.itemID = item_Pic.itemID and item._orderUser = ";
	$query .= $_SESSION["user_id"];
        $result = mysql_query($query)
                        or die("問い合わせの実行に失敗しました。");
?>
<ul>
<table border="0" bgcolor="">
<tr>
<?php
        while ($row = mysql_fetch_array($result)){
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
                         </tr>
                         <tr>
                                
                         </tr>
                        </table>
                </td>
               ";
               }
?>
</tr>
</table>
</ul>
</body>
</html>
