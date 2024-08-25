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
    <td width="481" height="323" valign="top"><p><strong>Check My Order Status </strong></p>      <p>
        <?php
		$s1=$_POST["t1"];
	include("connection.php");
	session_start();
	$indid=$_SESSION["indid"];
	$clientid=$_SESSION["clientid"];
	$s=mysql_query("select * from clientorder  where clientid='$clientid'");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Orders found";
	  else
	  {
	  $f=1;
	  echo "<Table border='0' width='100%' bgcolor='yellow'><tr><th>Order No</th><th>Order Date</th><th>Show Details(Click)</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  if($f==1)
	  echo "<tr align='center' bgcolor='#abcdef'><td>$row[0]</td><td>$row[3]</td><td><form action='checkorder2.php' method='post'><input type='submit' value='Details==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  else
	  	  echo "<tr align='center' bgcolor='#00cdff'><td>$row[0]</td><td>$row[3]</td><td><form action='checkorder2.php' method='post'><input type='submit' value='Details==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";

	  $f=$f*-1;
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>
    &nbsp; </p></td>
    <td width="21">&nbsp;</td>
    <td width="295" valign="top">Details
      <?php
   $s=mysql_query("select * from clientorder where ordno=$s1");
   if($row=mysql_fetch_array($s))
   {
   $clientid=$row[1];
   $orddate=$row[3];
   $total=$row[4];
   $cardno=$row[5];
   }
   
   ?>
      <table width="297" border="0">
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
      </table>
      <p><strong>Ordered Products</strong></p>
      <p>
        <?php 
   $flag=0;
   $s=mysql_query("select * from ordproducts where ordno=$s1");
   echo "<table border='0' width='100%'><tr><th>PID</th><th>Qty</th></tr>";
   while($row=mysql_fetch_array($s))
   {
   $pid=$row[1];
   $qty=$row[2];
    echo "<tr align='center'><td>$pid</td><td>$qty</td></tr>";
   }
   echo "</table>";
   
   ?>
    &nbsp; </p></td>
    <td width="42">&nbsp;</td>
    <td width="377" valign="top"><p><strong>Delivery Details</strong></p>
   <?php
     
	$s=mysql_query("select * from delivery where ordno='$s1'"); 
	if(mysql_num_rows($s)===0)
	  echo "<b>Not Delivered...Please wait";
	  else
	  { 
	  if($row=mysql_fetch_array($s))
	  {
	  $delmode=$row[1];
	  $deldetails=$row[2];
	  $deldate=$row[3];
	  
	  
	  }

	?>
   
   <table width="264" border="0">
        <tr>
          <td width="168">Delivery Mode </td>
          <td width="197"><?php echo $delmode; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">Delivery Details </td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="t3" cols="30" id="t3"><?php echo $deldetails; ?></textarea></td>
        </tr>
        <tr>
          <td>Delivery Date
            <div align="center">
              </div></td>
          <td><?php echo $deldate; ?>&nbsp;</td>
        </tr>
      </table>  <?php } ?> <p>&nbsp; </p></td>
    <td width="76">&nbsp;</td>
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
