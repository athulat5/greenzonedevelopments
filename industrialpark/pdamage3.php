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
    <td width="442" rowspan="3" valign="top"><p><strong>Purchase Products </strong><?php
	include("connection.php");
	$s1=$_POST["t1"];
	$s2=$_POST["t2"];
	$s3=$_POST["t3"];
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
	  echo "<tr align='center' bgcolor='#abcdef'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='pdamage2.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  else
	  	  echo "<tr align='center' bgcolor='#00cdff'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td><form action='pdamage2.php' method='post'><input type='submit' value='==>>==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";

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
          <td><?php echo $stock-$s2; ?></td>
        </tr>
      </table>      <p>&nbsp; </p></td>
    <td width="268" height="27">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="293" rowspan="3" valign="top"><p><strong>Damaged Details</strong></p>
	<script>
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
      <form name="form1" onSubmit="return abc()" method="post" action="pdamage3.php">
        <table width="288" border="0">
          <tr>
            <td height="31">Damaged Qty </td>
            <td><?php echo $s2; ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">Reason</td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="t3" cols="50" id="t3" disabled><?php echo $s3; ?></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><?php
			$dno=0;
			$s=mysql_query("select * from pdamage order by dno desc");
			if($row=mysql_fetch_array($s))
			{
			$dno=$row[0];
			
			}
			$dno++;
			$ddate=date("Y")."-".date("m")."-".date("d");
			$s="insert into pdamage values($dno,'$s1',$s2,'$s3','$staffid','$ddate')";
			mysql_query($s);
			$s="update pstock set stock=stock-$s2 where pid='$s1'";
			mysql_query($s);
			echo "<b>Damaged products entered...";
			?>&nbsp;</td>
          </tr>
        </table>
      </form>      <p>&nbsp; </p></td>
    <td width="13">&nbsp;</td>
  </tr>
  <tr>
    <td height="257" valign="top"><?php echo "<img src='./products/$pic' width='200' height='200'>";  ?>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="39">&nbsp;</td>
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
