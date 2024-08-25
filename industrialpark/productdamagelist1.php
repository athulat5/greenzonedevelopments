<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
</head>
<script>
function printf()
{
window.print();
}

</script>
<body>
<?php include("p3.php"); ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="110" height="17"></td>
    <td width="1113"></td>
    <td width="91"></td>
  </tr>
  <tr>
    <td height="299"></td>
    <td valign="top"><p class="style1">Product Damage  List</p>
      <p>
      <?php
	include("connection.php");
	session_start();
	$indid=$_SESSION["indid"];
	
	$s=mysql_query("select * from products where indid='$indid'");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Products Found";
	 else
	 {
	echo "<table border='0' width='100%'><tr><th>Product ID</th><th>Product Name</th><th>Product Type</th><th>Price</th><th>Gst</th><th>Damage List</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr align='center'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td><form action='productdamagelist2.php' method='post'><input type='submit' value='Click'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	} 
	echo "</table>";
	
	}
	
	?> </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="53"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>
