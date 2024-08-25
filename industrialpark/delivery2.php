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
    <td width="429" height="343" valign="top"><p><strong>Product Delivery </strong></p>      <p>
        <?php
		$s1=$_POST["t1"];
	include("connection.php");
	session_start();
	$indid=$_SESSION["indid"];
	$staffid=$_SESSION["staffid"];
	$s=mysql_query("select * from clientorder  where indid='$indid' and ordno not in(select ordno from delivery)");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Orders waiting for delivery";
	  else
	  {
	  $f=1;
	  echo "<Table border='0' width='100%' bgcolor='yellow'><tr><th>Order No</th><th>Client ID</th><th>Order Date</th><th>Show Details(Click)</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  if($f==1)
	  echo "<tr align='center' bgcolor='#abcdef'><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td><form action='delivery2.php' method='post'><input type='submit' value='Details==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  else
	  	  echo "<tr align='center' bgcolor='#00cdff'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td><form action='delivery2.php' method='post'><input type='submit' value='Details==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";

	  $f=$f*-1;
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>
    &nbsp; </p></td>
    <td width="10">&nbsp;</td>
    <td width="305" valign="top"><p><strong>Details</strong></p>      <?php
   $s=mysql_query("select * from clientorder where ordno=$s1");
   if($row=mysql_fetch_array($s))
   {
   $clientid=$row[1];
   $orddate=$row[3];
   $total=$row[4];
   $cardno=$row[5];
   }
   
   ?>      <table width="297" border="0">
        <tr>
          <td width="79">Order No . </td>
          <td width="105"><?php echo $s1; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Client ID</td>
          <td><?php echo $clientid; ?></td>
        </tr>
        <tr>
          <td>Order Date </td>
          <td><?php echo $orddate; ?></td>
        </tr>
        <tr>
          <td>Total</td>
          <td><?php echo $total; ?></td>
        </tr>
        <tr>
          <td>Card No . </td>
          <td><?php echo $cardno; ?></td>
        </tr>
    </table>      <p><strong>Ordered Products</strong></p>      <p><?php 
   $flag=0;
   $s=mysql_query("select * from ordproducts where ordno=$s1");
   echo "<table border='0' width='100%'><tr><th>PID</th><th>Qty</th><th>Stock</th><th>Availability</th></tr>";
   while($row=mysql_fetch_array($s))
   {
   $pid=$row[1];
   $qty=$row[2];
   $ss=mysql_query("select * from pstock where pid='$pid'");
   $stock=0;
   if($row1=mysql_fetch_array($ss))
   {
   $stock=$row1[1];
   }
   if($qty>$stock)
   {
   $flag++;
    $avail="No";
	}
	else
	$avail="Yes";
	echo "<tr align='center'><td>$pid</td><td>$qty</td><td>$stock</td><td>$avail</td></tr>";
   }
   echo "</table>";
   
   ?>&nbsp; </p></td>
    <td width="257" valign="top"><p><strong>Client Details</strong></p>
    <?php
	$s=mysql_query("select * from clientappln where clientid='$clientid'");
	if($row=mysql_fetch_array($s))
	{
	$fname=$row[1];
	$cname=$row[2];
	$addr=$row[3];
	$place=$row[4];
	$pin=$row[5];
	$phone=$row[6];
	$dist=$row[7];
	$state=$row[8];
	$gender=$row[9];
	
	}
	
	?>  <table width="247" border="0">
        <tr>
          <td width="107">Firm Name </td>
          <td width="124"><?php echo $fname; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Client Name </td>
          <td><?php echo $cname; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $addr; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo $place; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Pin</td>
          <td><?php echo $pin; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><?php echo $phone; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>District</td>
          <td><?php echo $dist; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>State</td>
          <td><?php echo $state; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $gender; ?>&nbsp;</td>
        </tr>
      </table>      <p>&nbsp; </p></td>
    <td width="276" valign="top"><p><strong>Delivery</strong></p>      <script>
function abc()
{
if(document.form1.t3.value=="")
{
alert("Please enter the delivery Details");
return(false);
}

}
      </script>      <form name="form1" method="post" onSubmit="return abc()" action="delivery3.php">
        <table width="264" border="0">
          <tr>
            <td width="168">Delivery Mode </td>
            <td width="197"><select name="t2" id="t2">
              <option>By Hand</option>
              <option>By Truck</option>
              <option>By Goods</option>
              <option>By Ship</option>
              <option>By Parcel</option>
            </select></td>
          </tr>
          <tr>
            <td colspan="2">Delivery Details </td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="t3" cols="30" id="t3"></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input type="submit" name="Submit" value="Submit">
              <input type="reset" name="Submit2" value="Reset">
            <?php
			echo "<input type='hidden' name='t1' value='$s1'>";
			?></div></td>
          </tr>
        </table>
      </form>      <p>&nbsp;</p></td>
    <td width="15">&nbsp;</td>
  </tr>
</table>
</body>
</html>
