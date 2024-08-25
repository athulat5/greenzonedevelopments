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
    <td width="11" height="17"></td>
    <td width="688"></td>
    <td width="15"></td>
    <td width="578"></td>
    <td width="22"></td>
  </tr>
  <tr>
    <td height="299"></td>
    <td valign="top"><p class="style1">Product Damage  List</p>      <p>
        <?php
	  $s1=$_POST["t1"];
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
	if($s1==$row[0])
		echo "<tr align='center' bgcolor='yellow'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td><form action='productdamagelist2.php' method='post'><input type='submit' value='Click'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	else
	echo "<tr align='center'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td><form action='productdamagelist2.php' method='post'><input type='submit' value='Click'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	} 
	echo "</table>";
	
	}
	
	?> 
     </p></td>
    <td>&nbsp;</td>
    <td valign="top"><p><strong>Damage Details </strong></p>
    <p><?php
	$s=mysql_query("select * from pdamage where pid='$s1'");
	if(mysql_num_rows($s)==0)
	   echo "<b><font color='red'>No Damage Entry Found...";
	   else
	   {
	   echo "<table border='0' width='100%'><tr><th>Damage No.</th><th>Damage Quantity</th><th>Reason</th><th>Staff ID</th><th>Damage Date</th></tr>";
	   while($row=mysql_fetch_array($s))
	   {
	   echo "<tr align='center'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
	   
	   }
	   echo "</table>";
	   }
	
	
	?>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="53"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
