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
if(document.form1.t1.value=="" || document.form1.t2.value=="")
{
alert("Please Enter Application No. and Password");
return(false);
}
}

</script>
<body>
<?php include("p1.php"); ?>
<table width="1293" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="404" height="151" valign="top"><p><strong>Application Status</strong></p>      <form name="form1" onSubmit="return  abc()" method="post" action="checkapplstatus2.php">
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
            <td><input name="t2" type="password" id="t2" value="<?php echo $s2;  ?>"></td>
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
    <td width="257" rowspan="2" valign="top"><?php if($a>0){?><p><strong>Approval Details</strong></p>      <?php
  
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
  ?>      <table width="248" border="0">
        <tr>
          <td width="171">Response Status </td>
          <td width="67"><?php echo $respstatus; ?>&nbsp;</td>
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
      </table>      <?php } ?>      <?php if($respstatus=="Y") { ?>      <table width="249" border="0">
        <tr>
          <td colspan="2">Area Details </td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea3"><?php echo $areadetails; ?></textarea></td>
        </tr>
        <tr>
          <td width="176">Pay Amount </td>
          <td width="63"><?php echo $payamt; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">Payment Details </td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea4"><?php echo $paymentdetails; ?></textarea></td>
        </tr>
    </table>      <?php } }?>      <p>&nbsp;</p>      <p>&nbsp;</p></td>
  <td width="256" rowspan="2" valign="top"><p>
    <?php
	if($a>0)
	{
	  $s=mysql_query("select * from applconfirm where applno='$s1'");
	  if(mysql_num_rows($s)==0)
	    echo "<b>Please wait for the confirmation";
		else
		{
	  if($row=mysql_fetch_array($s))
	  {
	  $confirmstatus=$row[1];
	  $comment=$row[2];
	  $cdate=$row[3];
	  $cardno=$row[4];
	  $agrdocument=$row[5];
	  
	  
	  }
	  
	  ?>
      </p>
    <form name="form2" method="post" action="applresponse3.php">
      <table width="218" border="0">
        <tr>
          <td width="173">Confirm Status</td>
          <td width="215"><?php echo $confirmstatus; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">Comment</td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea5" cols="30" rows="7" id="textarea"><?php echo $comment; ?></textarea></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo $cdate; ?>&nbsp;</td>
        </tr>
      </table>
    </form>
    <?php if($confirmstatus=="Y")
	  {
	  ?>
    <table width="219" border="0">
      <tr>
        <td width="105">Card No </td>
        <td width="104"><?php echo $cardno; ?>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><form name="form3" method="post" action="down1.php">
            <input type="submit" name="Submit22" value="Download Agreement">
            <?php echo "<input type='hidden' name='t1' value='$agrdocument'>";  ?>
        </form></td>
      </tr>
    </table>
    <form name="form4" method="post" action="checkconfirmstatus3.php">
	<?php
	$indid="";
	$sdate="";
	$s=mysql_query("select * from industry where applno='$s1'");
	if(mysql_num_rows($s)==0)
	   echo "<b><font color='red'>Please wait for the allotment";
	   else
	{
	if($row=mysql_fetch_array($s))
	{
	$indid=$row[0];
	$indname=$row[4];
	$tc=$row[2];
	$sdate=$row[3];
	}
	?><font color="#FF0000">
      <table width="390" border="0" bgcolor="#FFFF00">
        <tr>
          <td height="23" colspan="2"><strong>Industry</strong> <strong>Allotment Details </strong></td>
          </tr>
        <tr>
          <td height="23">Ind ID </td>
          <td><?php echo $indid; ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">Industry Name </td>
          <td height="23"><?php echo $indname; ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="2">Terms and Conditions </td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea5" cols="30" id="textarea"><?php echo $tc; ?></textarea></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo $sdate; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">Your initial password is same as your ID..Please Login and Change for security</td>
          </tr>
      </table>
	</font>
	  <?php } ?>
      <p>
        <?php }} ?>
    &nbsp;</p>
    </form><?php } ?></td>
  </tr>
  <tr>
    <td height="381">&nbsp;</td>
  </tr>
  <tr>
    <td height="278">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
