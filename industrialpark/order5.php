<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p5.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="29" height="19"></td>
    <td width="371"></td>
    <td colspan="3" valign="top"><strong>Online Order </strong></td>
    <td width="357"></td>
    <td width="91"></td>
  </tr>
  <tr>
    <td height="333">&nbsp;</td>
    <td colspan="2" valign="top"><?php
	include("connection.php");
	$gtot=0;
	$a=0;
	$s=mysql_query("select * from temp1");
	if(mysql_num_rows($s)>0)
	 {
	 echo "<strong>Selected Items</strong>";
	 echo "<table border='0' width='100%'><tr><th>Item No.</th><th>PID</th><th>Product  Name</th><th>Price</th><th>Gst%</th><th>Qty</th><th>Total</th></tr>";
	 while($row=mysql_fetch_array($s))
	 {
	 echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
	 $gtot=$gtot+$row[6];
	 $a++;
	 } 
	echo "</table>";
	echo "Grand Total $gtot";
	 }
	?></td>
    <td width="123">&nbsp;</td>
    <td colspan="2" valign="top"><p><strong>Bank Details (Enter Your card Deails) </strong></p>
      <form name="form1" method="post" action="order5.php">
      <?php
	  $s1=$_POST["t1"];
	  $s2=$_POST["t2"];
	  $s3=$_POST["t3"];
	  $s4=$_POST["t4"];
	  $s5=$_POST["t5"];
	  $s6=$_POST["t6"];
	  
	  
	  ?>  <table width="414" border="0">
          <tr>
            <td width="137">Select Bank </td>
            <td width="261"><select name="t1" id="t1"  disabled>
			<?php echo "<option>$s1</option>"; ?>
              <option>SBI</option>
              <option>HDFC</option>
              <option>Indian Bank</option>
              <option>Canara</option>
              <option>ICICI</option>
              <option>IOB</option>
              <option>South Indian</option>
              <option>Axis</option>
            </select></td>
          </tr>
          <tr>
            <td>Card No . </td>
            <td><input name="t2" type="text" id="t2" value="<?php echo $s2;  ?>" disabled></td>
          </tr>
          <tr>
            <td>Customer Name </td>
            <td><input name="t3" type="text" id="t3"  value="<?php echo $s3;  ?>" disabled></td>
          </tr>
          <tr>
            <td>Cvv</td>
            <td><input name="t4" type="password" id="t4"  value="<?php echo $s4;  ?>" disabled></td>
          </tr>
          <tr>
            <td>Exp Date </td>
            <td><select name="t5" id="t5" disabled>
						<?php echo "<option>$s5</option>"; ?>

              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
              MM 
              <select name="t6" id="t6" disabled>
			  <?php
			  $y=date("Y");
			  			echo "<option>$s1</option>";

			  for($i=$y;$i<=$y+10;$i++)
			     echo "<option>$i</option>";
			  
			  
			  ?>
              </select>
              YYYY</td>
          </tr>
          <tr>
            <td colspan="2"><?php
			$s=mysql_query("select * from bank where bname='$s1'  and cardno='$s2' and cname='$s3' and cvv='$s4' and month(expdate)='$s5' and year(expdate)='$s6'");
			if(mysql_num_rows($s)==0)
			  echo "<b><font color='red'>Invalid Bank details";
			  else
			  {
			  session_start();
			  $clientid=$_SESSION["clientid"];
			  $indid=$_SESSION["indid"];
			  $orddate=date("Y")."-".date("m")."-".date("d");
			  $ordno=0;
			  $s=mysql_query("select * from clientorder order by ordno desc");
			  if($row=mysql_fetch_array($s))
			  {
			  $ordno=$row[0];
			  
			  }
			  $ordno++;
			  
			  $s="insert into clientorder values($ordno,'$clientid','$indid','$orddate',$gtot,'$s2')";
			  mysql_query($s);
			  $s=mysql_query("select * from temp1");
			  while($row=mysql_fetch_array($s))
			  {
			  $ss="insert into ordproducts values($ordno,'$row[1]',$row[5])";
			  mysql_query($ss);
			  
			  } 
			  
			  echo "<b><font color='red'>Order Process Completed....The Order No. is $ordno...Please wait...";
			  }
			
			?>&nbsp;</td>
          </tr>
        </table>
      </form>      <p>&nbsp;</p>
    <p>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20"></td>
    <td></td>
    <td width="208">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="134"></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
