<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<script>

function abc()
{
if(document.form2.t2.value==""|| document.form2.t4.value==""|| document.form2.t5.value=="")
{
alert("Please fill all");
return(false);

}
if(document.form2.file.value=="")
{
alert("Please Upload file");
return(false);

}

}

</script>
<body>
<?php include("p1.php"); ?>
<table width="1293" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="142" height="151" valign="top"><p><strong>Application Status</strong></p>      <form name="form1" method="post" action="checkapplstatus2.php">
      <?php
	$s1=$_POST["t1"];
	$a=1;
			include("connection.php");
			?>  
    </form></td>
    <td width="19">&nbsp;</td>
    <td width="401" rowspan="3" valign="top"><?php if ($a>0) { ?>      <p><strong>Application Details </strong></p>      <?php
	$s=mysql_query("select * from application where applno=$s1");
	if($row=mysql_fetch_array($s))
	{
	$name=$row[1];
	$addr=$row[2];
	$place=$row[3];
	$pin=$row[4];
	$ph=$row[5];
	$dist=$row[6];
	$state=$row[7];
	$gender=$row[8];
	$documents=$row[9];
	$requirements=$row[10];
	$appldate=$row[11];
	
	}
	
	
	?>
      <table width="376" border="0">
        <tr>
          <td width="126">Application No </td>
          <td width="234"><?php echo $s1; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Name</td>
          <td><?php echo $name; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $addr; ?></td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo $place; ?></td>
        </tr>
        <tr>
          <td>Pin</td>
          <td><?php echo $pin; ?></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><?php echo $ph; ?></td>
        </tr>
        <tr>
          <td>District</td>
          <td><?php echo $dist; ?></td>
        </tr>
        <tr>
          <td>State</td>
          <td><?php echo $state; ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $gender; ?></td>
        </tr>
        <tr>
          <td colspan="2"><form name="form1" method="post" action="down.php">
              <div align="center">
                <input type="submit" name="Submit2" value="Download Documents">
              </div>
              <?php echo "<input type='hidden' name='t1' value='$documents'>"; ?>
          </form></td>
        </tr>
        <tr>
          <td colspan="2">Requirements</td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea"><?php echo $requirements; ?></textarea></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo $appldate; ?>&nbsp;</td>
        </tr>
      </table>      <?php } ?>  </td>
    <td width="18">&nbsp;</td>
    <td width="240" rowspan="2" valign="top"><p><strong>Approval Details</strong></p>      <?php
  $respstatus="";
  $b=0;
  $s=mysql_query("select * from applresponse where applno='$s1'");
  if(mysql_num_rows($s)==0)
   echo "<b><font color='red'>No Response found ...Please wait";
   else
   {
  $b++;
  
  if($row=mysql_fetch_array($s))
  {
  $respstatus=$row[1];
  $comment=$row[2];
  $areadetails=$row[3];
  $payamt=$row[4];
  $paymentdetails=$row[5];
  $rdate=$row[6];
  
  }
  ?>      <table width="215" border="0">
        <tr>
          <td width="171">Response Status </td>
          <td width="34"><?php echo $respstatus; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">Comment </td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea2"><?php echo $comment; ?></textarea></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo $rdate; ?>&nbsp;</td>
        </tr>
      </table>      <?php } ?>      <?php if($respstatus=="Y") { ?>      <table width="212" border="0">
        <tr>
          <td colspan="2">Area Details </td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea3"><?php echo $areadetails; ?></textarea></td>
        </tr>
        <tr>
          <td width="176">Pay Amount </td>
          <td width="26"><?php echo $payamt; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">Payment Details </td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea4"><?php echo $paymentdetails; ?></textarea></td>
        </tr>
          </table>      <?php } ?>      <p>&nbsp;</p>      <p>&nbsp;</p></td>
  <td width="23">&nbsp;</td>
  <td width="418" rowspan="2" valign="top"><p><strong>Bank Details</strong></p>
    <form action="applconfirm5.php" onSubmit="return abc()" method="post" enctype="multipart/form-data" name="form2">
      <table width="379" border="0">
        <tr>
          <td width="173">Pay Amount</td>
          <td width="190"><?php   echo $payamt; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Card No </td>
          <td><input name="t2" type="text" id="t2" onKeyPress="return numbers(event)"></td>
        </tr>
        <tr>
          <td>Select Bank </td>
          <td><select name="t3" id="t3">
            <option>SBI</option>
            <option>IOB</option>
            <option>South Indian</option>
            <option>Indian</option>
            <option>ICICI</option>
            <option>HDFC</option>
            <option>Canara</option>
          </select></td>
        </tr>
        <tr>
          <td>Customer Name </td>
          <td><input name="t4" type="text" id="t4" onKeyPress="return alphabets(event)" ></td>
        </tr>
        <tr>
          <td>Cvv</td>
          <td><input name="t5" type="password" id="t5"></td>
        </tr>
        <tr>
          <td>Exp Date </td>
          <td><select name="t6" id="t6">
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
            <select name="t7" id="t7">
			<?php
			$y=date("Y");
			for($i=$y;$i<=$y+10;$i++)
			   echo "<option>$i</option>";
			?>
            </select>
            YYYY</td>
        </tr>
        <tr>
          <td>Select Agreement (Doc) </td>
          <td><input type="file" name="file"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="Submit" value="Submit">
            <?php
		  echo "<input type='hidden' name='t1' value='$s1'>";
		  ?></td>
          </tr>
      </table>
    </form>    <p><strong> </strong></p>    <p>&nbsp;</p></td>
  <td width="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="381">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="278">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
