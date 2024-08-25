<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p1.php"); ?>
<table width="1317" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="48" height="15"></td>
    <td width="538"></td>
    <td width="13"></td>
    <td width="689"></td>
    <td width="29"></td>
  </tr>
  <tr>
    <td height="316"></td>
    <td valign="top"><p><strong>Industry Products </strong></p>
    <p>
      <?php
	  $s1=$_POST["t1"];
	include("connection.php");
	$s=mysql_query("select * from industry");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Industries alloted";
	 else
	 {
	echo "<table border='0' width='100%'><tr><th>Industry ID</th><th>Industry Name</th><th>Do</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	if($s1==$row[0])
		echo "<tr align='center' bgcolor='yellow'><td>$row[0]</td><td>$row[4]</td><td><form action='productslist2.php' method='post'><input type='submit' value='Click To View Products'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	else
	echo "<tr align='center'><td>$row[0]</td><td>$row[4]</td><td><form action='productslist2.php' method='post'><input type='submit' value='Click To View Products'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	
	}
	 
	echo "</table>";
	
	}
	
	?>
    </p></td>
    <td>&nbsp;</td>
    <td valign="top"><p><strong>Products Details </strong></p>
    <p>
      <?php
	include("connection.php");
	$s=mysql_query("select * from products where indid='$s1'");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Products Registered...";
	 else
	 {
	echo "<table border='0' width='100%'><tr><th>Product ID</th><th>Product Name</th><th>Product Type</th><th>Price</th><th>GST%</th><th>Unit</th><th>Price Quantity</th><th>Picture</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr align='center'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td><img src='./products/$row[8]' width='50' height='50'></td></tr>";
	
	}
	 
	echo "</table>";
	
	}
	
	?>
    </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
