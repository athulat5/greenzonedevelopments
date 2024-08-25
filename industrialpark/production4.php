<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p4.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="59" height="16"></td>
    <td width="523"></td>
    <td width="511"></td>
    <td width="234"></td>
  </tr>
  <tr>
    <td height="306"></td>
    <td valign="top"><p><strong>Production Entry </strong></p>
    <p>
      <?php
	include("connection.php");
	
	$s=mysql_query("select * from temp");
	if(mysql_num_rows($s)>0)
	{
	
	echo "<p><strong>Selected Materials</strong></p>";
	
	
	echo "<table border='0' width='100%'><tr><th>Item No</th><th>Material</th><th>Qty</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
	
	}
	echo "</table>";
	}
	?>
    </p></td>
    <td valign="top"><p><strong>Select Product</strong></p>
    <p>
      <?php
	include("connection.php");
	session_start();
	$indid=$_SESSION["indid"];
	$staffid=$_SESSION["staffid"];
	$s=mysql_query("select * from products where indid='$indid'");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Products Registered by the Authority...";
	  else
	  {
	  $f=1;
	  echo "<Table border='0' width='100%' bgcolor='yellow'><tr><th>Product ID</th><th>Product Name</th><th>Product Type</th><th>Price</th><th>Show Details(Click)</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  if($f==1)
	  echo "<tr align='center' bgcolor='#abcdef'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='production5.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  else
	  	  echo "<tr align='center' bgcolor='#00cdff'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='production5.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";

	  $f=$f*-1;
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
  </tr>
</table>
</body>
</html>
