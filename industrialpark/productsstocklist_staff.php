<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p4.php"); ?>
<table width="1305" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="113" height="18"></td>
    <td width="1066"></td>
    <td width="126"></td>
  </tr>
  <tr>
    <td height="322"></td>
    <td valign="top"><p><strong>Products Stock Details </strong></p>
      <p>
        <?php
	include("connection.php");
	session_start();
	$indid=$_SESSION["indid"];
	$s=mysql_query("select * from products where indid='$indid'");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Products Registered...";
	 else
	 {
	echo "<table border='0' width='100%'><tr><th>Product ID</th><th>Product Name</th><th>Product Type</th><th>Price</th><th>GST%</th><th>Unit</th><th>Price Quantity</th><th>Current Stock</th><th>Picture</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	$stock=0;
	$ss=mysql_query("select * from pstock where pid='$row[0]'");
	if($row1=mysql_fetch_array($ss))
	{
	$stock=$row1[1];
	
	}
	echo "<tr align='center'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$stock</td><td><img src='./products/$row[8]' width='50' height='50'></td></tr>";
	
	}
	 
	echo "</table>";
	
	}
	
	?>
      </p></td>
    <td></td>
  </tr>
  <tr>
    <td height="29"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>
