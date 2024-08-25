<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>

<script>
function abc()
{
if(document.form2.t2.value=="")
{
alert("Please Enter Comment");
return(false);
}
}

</script>
<body>
<?php include("p1.php"); ?>
<table width="1293" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="404" height="151" valign="top"><p><strong>Application Status</strong></p>      <form name="form1" onSubmit="return abc()" method="post" action="applconfirm2.php">
    <?php
	$s1=$_POST["t1"];
	$s2=$_POST["t2"];
	$a=0;
			include("connection.php");
			$s=mysql_query("select * from login where userid='$s1' and password='$s2'");
			if(mysql_num_rows($s)>0)			
			 $a++; 
			else
			{ 
			
	?>    <table width="404" border="0">
          <tr>
            <td width="121">Application No </td>
            <td width="179"><input name="t1" type="text" id="t1" value="<?php echo $s1; ?>"></td>
            <td width="82" rowspan="2"><input type="submit" name="Submit" value="Details&gt;&gt;"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input name="t2" type="password" id="t2" value="<?php echo $s2; ?>"></td>
          </tr>
          <tr>
            <td colspan="3"><div align="center"><span class="style1">Invalid Application Number or Password </span></div></td>
          </tr>
        </table>
		<?php
		}
		?>
      </form></td>
    <td width="376" rowspan="3" valign="top"><?php if ($a>0) { ?><p><strong>Application Details </strong></p>
      <?php
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
      </table>  <?php } ?>  </td>
    <td width="221" rowspan="2" valign="top"><?php if($a>0){?><p><strong>Approval Details</strong></p>      <?php
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
      </table>      <?php } } ?>      <p>&nbsp;</p>      <p>&nbsp;</p></td>
  <td width="260" rowspan="2" valign="top"><?php if($a>0){ if ($b>0) {
  
  $s=mysql_query("select * from applconfirm where applno='$s1'");
  if(mysql_num_rows($s)>0)
    echo "<b>Your confirmation already registered";
	else
	{
  ?><p><strong>Confirmation</strong></p>
    <form name="form2" onSubmit="return abc()" method="post" action="applconfirm3.php">
      <table width="259" border="0">
        <tr>
          <td width="102">Confirm Status </td>
          <td width="141"><input name="r1" type="radio" value="Y">
            Yes 
            <input name="r1" type="radio" value="N" checked>
            No</td>
        </tr>
        <tr>
          <td colspan="2">Comment</td>
          </tr>
        <tr>
          <td colspan="2"><textarea name="t2" id="t2"></textarea></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="Submit3" value="Submit"><?php
		  echo "<input type='hidden' name='t1' value='$s1'>";
		  ?></td>
        </tr>
      </table><?php } } ?>
    </form> <?php } ?>   <p>&nbsp;</p></td>
  <td width="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="381">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="278">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
