<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php include("p5.php"); ?>
<table width="1292" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="442" rowspan="3" valign="top"><p><strong>Order Products </strong><?php
	include("connection.php");
	$s1=$_POST["t1"];
	session_start();
	$indid=$_SESSION["indid"];
	$clientid=$_SESSION["clientid"];
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
	  echo "<tr align='center' bgcolor='#abcdef'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='order2.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  else
	  	  echo "<tr align='center' bgcolor='#00cdff'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='order2.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";

	  $f=$f*-1;
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>
    &nbsp; </p>      </td>
    <td width="266" rowspan="3" valign="top"><p><strong>Selected Product Details</strong></p>
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
	 $stock=0;
	 $s=mysql_query("select * from pstock where pid='$s1'");
	 if($row=mysql_fetch_array($s))
	 {
	 $stock=$row[1];
	 }
	 ?> <script>
	 function abc()
	 {
	 if(document.form1.t2.value=="")
	 {
	 alert("Please enter the Quantity");
	 return(false);
	 }
	 }
	 </script><form name="form1" method="post" onSubmit="return abc()" action="order3.php">
       <table width="266" border="0">
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
           <td>Quantity</td>
           <td><input name="t2" type="text" id="t2" onKeyPress="return numbers(event)"></td>
         </tr>
         <tr>
           <td colspan="2"><div align="center">
             <input type="submit" name="Submit" value="Add To Cart ==&gt;&gt;">
           <?php
		   echo "<input type='hidden' name='t1' value='$s1'>";
		   ?></div></td>
          </tr>
       </table>
     </form>
     <p>&nbsp; </p></td>
    <td width="268" height="27">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="293">&nbsp;</td>
    <td width="13">&nbsp;</td>
  </tr>
  <tr>
    <td height="257" valign="top"><?php echo "<img src='./products/$pic' width='200' height='200'>";  ?>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><script>
	function abc()
	{
	if(document.form1.t2.value=="")
	{
	alert("Please enter the quantity");
	return(false);
	
	}
	
	if(document.form1.t3.value=="")
	{
	alert("Please enter the quantity");
	return(false);
	
	}
	var x=Number(document.form1.t0.value);
		var y=Number(document.form1.t2.value);
	if(y>x)
	{
	alert("Please check the quantity...It should not greater than the stock");
	return(false);
	}
	
	}
	
	</script>
    <p>
      <?php
	$gtot=0;
	$a=0;
	$s=mysql_query("select * from temp1");
	if(mysql_num_rows($s)>0)
	 {
	 echo "<strong>Selected Items</strong>";
	 echo "<table border='0' width='100%'><tr><th>Item No.</th><th>PID</th><th>Product  Name</th><th>Price</th><th>Gst%</th><th>Qty</th><th>Total</th><th>Remove</th></tr>";
	 while($row=mysql_fetch_array($s))
	 {
	 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td><form action='order33.php' method='post'><input type='submit' value='Delete'><input type='hidden' name='t1' value='$s1'><input type='hidden' name='t0' value='$row[0]'></form></td></tr>";
	 $gtot=$gtot+$row[6];
	 $a++;
	 } 
	echo "</table>";
	echo "Grand Total $gtot";
	 }
	?>
      &nbsp;</p>
    <form name="form2" method="post" action="order4.php">
      <?php if($a>0){?>
      <input type="submit" name="Submit2" value="Payment Gateway">
      <?php } ?>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="46">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
