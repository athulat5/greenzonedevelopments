<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php include("p4.php"); ?>
<table width="1292" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="442" height="323" valign="top"><p><strong>Purchase Products </strong><?php
	include("connection.php");
	$s1=$_POST["t1"];
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
	  echo "<tr align='center' bgcolor='#abcdef'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='ppurchase2.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  else
	  	  echo "<tr align='center' bgcolor='#00cdff'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='ppurchase2.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";

	  $f=$f*-1;
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>
    &nbsp; </p>      </td>
    <td width="266" valign="top"><p><strong>Selected Product Details</strong></p>
     <?php
	 $s=mysql_query("select * from products where pid='$s1'");
	 if($row=mysql_fetch_array($s))
	 {
	 $pname=$row[2];
	 $ptype=$row[3];
	 $price=$row[4];
	 $gst=$row[5];
	 $punit=$row[6];
	 $priceqty=$row[7];
	 $pic=$row[8];
	 
	 
	 }
	 
	 ?> <table width="266" border="0">
        <tr>
          <td width="119">Product ID </td>
          <td width="137"><?php echo $s1; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Product Name </td>
          <td><?php echo $pname; ?></td>
        </tr>
        <tr>
          <td>Type</td>
          <td><?php echo $ptype; ?></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><?php echo $price; ?></td>
        </tr>
        <tr>
          <td>Gst % </td>
          <td><?php echo $gst; ?></td>
        </tr>
        <tr>
          <td>Product Unit </td>
          <td><?php echo $punit; ?></td>
        </tr>
        <tr>
          <td>Price Quantity </td>
          <td><?php echo $priceqty; ?></td>
        </tr>
        <tr>
          <td>Current Stock </td>
          <td><?php echo $s1; ?></td>
        </tr>
      </table>      <p>&nbsp; </p></td>
    <td width="584">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
