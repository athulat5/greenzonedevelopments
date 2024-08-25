<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p3.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="441" height="104" valign="top"><p><strong>Client Approval</strong></p>      <form name="form1" method="post" action="clientapproval2.php">
        <?php
		$s1=$_POST["t1"];
		$s11=$_POST["r1"];
		$s111=$_POST["t2"];
	  include("connection.php");
	  session_start();
	  $indid=$_SESSION["indid"];
	  $s=mysql_query("select * from clientappln where clientid not in(select clientid from clientapproval)");
	  if(mysql_num_rows($s)==0)
	     echo "<b>No Clients waiting for Approval";
		else
		{ 
	  
	  ?>  
        <table width="440" border="0">
          <tr>
            <td width="121">Select Client ID </td>
            <td width="160"><select name="t1" id="t1" disabled>
			  <?php
			  echo "<option>$s1</option>";
			while($row=mysql_fetch_array($s))
			{
			if($s1==$row[0])
			 continue;
			echo "<option>$row[0]</opton>";
			}
			?>
            </select></td>
            <td width="145">&nbsp;</td>
          </tr>
          </table><?php } ?>
    </form></td>
    <td width="318" rowspan="2" valign="top"><p><strong>Client Details</strong></p>
    <?php
	$s=mysql_query("select * from clientappln where clientid='$s1'");
	if($row=mysql_fetch_array($s))
	{
	$s0=$row[1];
	$s2=$row[2];
	$s3=$row[3];
	$s4=$row[4];
	$s5=$row[5];
	$s6=$row[6];
	$s7=$row[7];
	$s8=$row[8];
	$s9=$row[9];
	$proof=$row[10];
	$applndate=$row[13];
	}
	
	?>  <table width="378" border="0">
        <tr>
          <td width="124">Firm Name </td>
          <td width="238"><?php echo $s0; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Your Name </td>
          <td><?php echo $s2; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $s3; ?></td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo $s4; ?></td>
        </tr>
        <tr>
          <td>Pin</td>
          <td><?php echo $s5; ?></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><?php echo $s6; ?></td>
        </tr>
        <tr>
          <td>District</td>
          <td><?php echo $s7; ?></td>
        </tr>
        <tr>
          <td>State</td>
          <td><?php echo $s8; ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $s9; ?></td>
        </tr>
        <tr>
          <td>Application Date </td>
          <td><?php echo $applndate;  ?></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <form name="form2" method="post" action="down2.php">
              <input type="submit" name="Submit2" value="Download Proof">
			  <?php echo "<input type='hidden' name='t1' value='$proof'>"; ?>
            </form>
          </div></td>
        </tr>
      </table>      <p>&nbsp; </p></td>
    <td width="10">&nbsp;</td>
    <td width="344" rowspan="2" valign="top"><p><strong>Apply Approval</strong></p>
      <form name="form3" method="post" action="clientapproval3.php">
        <table width="341" border="0">
          <tr>
            <td>Status</td>
            <td><?php echo $s11; ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">Comment</td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="t2" id="t2" disabled><?php echo $s111; ?></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><?php
			$appdate=date("Y")."-".date("m")."-".date("d");
			$s="insert into clientapproval values('$s1','$s11','$s111','$appdate')";
			mysql_query($s);
			echo "<b>Ok Done";
			
			?>&nbsp;</td>
          </tr>
        </table>
      </form>      <p>&nbsp;</p></td>
    <td width="142">&nbsp;</td>
  </tr>
  <tr>
    <td height="284">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
