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
    <td width="388" height="16"></td>
    <td width="408"></td>
    <td width="14"></td>
    <td width="278"></td>
    <td width="15"></td>
    <td width="193"></td>
    <td width="17"></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top"><p><strong>Production Entry </strong></p>      <p>
        <?php
	include("connection.php");
	$s1=$_POST["t1"];
	$s2=$_POST["t2"];
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
    <td rowspan="3" valign="top"><p><strong>Select Product</strong></p>      <p>
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
    <td height="27">&nbsp;</td>
    <td rowspan="3" valign="top"><p><strong>Selected Product Details</strong></p>      <?php
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
	 $pstock=0;
	 $s=mysql_query("select * from pstock where pid='$s1'");
	 if($row=mysql_fetch_array($s))
	 {
	 $pstock=$row[1];
	 }
	 
	 ?>      <form name="form1" method="post" action="production6.php">
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
          <td>Current Stock </td>
          <td><?php echo $pstock; ?></td>
        </tr>
        <tr>
          <td>New Quantity </td>
          <td><input name="t2" type="text" id="t22" value="<?php echo $s2;  ?>"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <?php
			$pno=0;
			$s=mysql_query("select * from production order by pno desc");
			if($row=mysql_fetch_array($s))
			{
			$pno=$row[0];
			}
			$pno++;
			$pdate=date("Y")."-".date("m")."-".date("d");
			$s="insert into production values($pno,'$indid','$s1','$s2','$staffid','$pdate')";
			mysql_query($s);
			$s=mysql_query("select * from pstock where pid='$s1'");
			if(mysql_num_rows($s)==0)
			  $s="insert into pstock values('$s1',$s2)";
			 else
			 $s="update pstock set stock=stock+$s2 where pid='$s1'";
			 
			 mysql_query($s);
			  
			$s=mysql_query("select * from temp order by itemno");
			while($row=mysql_fetch_array($s))
			{
			$mname=$row[1];
			$qty=$row[2];
			$ss="insert into pmaterials values($pno,'$mname',$qty)";
			//echo $ss;
			mysql_query($ss);
			$ss="update mstock set stock=stock-$qty where mname='$mname' and indid='$indid'";
			mysql_query($ss);
			//echo $ss;
			}
			
			
			echo "<b>Production entry Completed";
			
			?></div></td>
        </tr>
      </table>
	  <?php echo "<input type='hidden' name='t1' value='$s1'>"; ?>
    </form>      <p></p></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="218">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><?php
	echo "<img src='./products/$pic' width='200' height='200'>";
	
	?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="61">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
