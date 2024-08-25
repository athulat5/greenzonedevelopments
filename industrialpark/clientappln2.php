<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p1.php"); ?>
<table width="1267" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="144" height="15"></td>
    <td width="387"></td>
    <td width="87"></td>
    <td width="324"></td>
    <td width="325"></td>
  </tr>
  <tr>
    <td height="361"></td>
    <td valign="top"><p><strong>Client Application</strong></p>      <form action="clientappln2.php" method="post" enctype="multipart/form-data" name="form1">
      <?php
	  $s1=$_POST["t1"];
	  $s2=$_POST["t2"];
	  $s3=$_POST["t3"];
	  $s4=$_POST["t4"];
	  $s5=$_POST["t5"];
	  $s6=$_POST["t6"];
	  $s7=$_POST["t7"];
	  $s8=$_POST["t8"];
	  $s9=$_POST["t9"];
	  $s10=$_POST["t10"];
	  $s11=$_POST["t11"];
	  
	  
	  
	  ?>  <table width="378" border="0">
          <tr>
            <td width="124">Firm Name </td>
            <td width="238"><?php echo $s1; ?>&nbsp;</td>
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
            <td>Upload Proof </td>
            <td>Uploaded</td>
          </tr>
          <tr>
            <td>Select Industri ID </td>
            <td><?php echo $s10; ?></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
            <?php
			include("connection.php");
			$s=mysql_query("select * from clientappln  where phone='$s6' and indid='$s10'");
			if(mysql_num_rows($s)>0)
			   echo "<b>This Firm already send an application";
			else
			{
			$s=mysql_query("select * from clientappln order by 	clientid desc");
			$clientid="C1111";
			if($row=mysql_fetch_array($s))
			{
			$clientid=$row[0];
			}
			$clientid++;
			$applndate=date("Y")."-".date("m")."-".date("d");
					
			
			$filename=$_FILES["file"]["name"];
			$x=explode(".",$filename);
			$n=count($x);
			$n--;
			$ext=$x[$n];
			$filename="$clientid.$ext";
			move_uploaded_file($_FILES["file"]["tmp_name"],"./clientproof/$filename");
			$staffid="";
			$s="insert into clientappln values('$clientid','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$filename','$s10','$staffid','$applndate')";
			mysql_query($s);
			$s="insert into login value('$clientid','$s11')";
			mysql_query($s);
			echo "<b>Your Client Registration Accepted....The client ID is $clientid <br> Please wait for the Approval...";
			}
			?></div></td>
          </tr>
        </table>
    </form>      <p>&nbsp;    </p></td>
    <td>&nbsp;</td>
    <td valign="top"><p align="center"><strong>Existing Industries Details</strong></p>      <p><?php
	include("connection.php");
	$s=mysql_query("select * from industry");
	if(mysql_num_rows($s)==0)
	  echo "<b>No industry registered";
	  else
	  {
	  echo "<center><table border='0' width='100%'><tr><th>IndID</th><th>Name</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<tr align='center'><td>$row[0]</td><td>$row[4]</td></tr>";
	  
	  }
	  echo "</table>";
	  }
	
	?>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
