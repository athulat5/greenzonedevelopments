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
    <td width="482" height="21">&nbsp;</td>
    <td width="17">&nbsp;</td>
    <td width="343">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="445">&nbsp;</td>
    <td width="9">&nbsp;</td>
  </tr>
  <tr>
    <td height="329" valign="top"><p><strong>Complaint Reply To Staff </strong></p>      
      <p>
        <?php
	include("connection.php");
	$s1=$_POST["t1"];
	session_start();
	$indid=$_SESSION["indid"];
	$s=mysql_query("select * from complaint  where staffid is not null and reply is null and staffid in(select staffid from staff where indid='$indid')");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Complaint waiting for Reply...";
	  else
	  {
	  echo "<Table border='0' width='100%'><tr><th>Complaint No.</th><th>Staff ID</th><th>Complaint Date</th><th>More...</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<tr align='center'><td>$row[0]</td><td>$row[2]</td><td>$row[5]</td><td><form action='cmpreply22.php' method='post'><input type='submit' value='Next==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>
              </p>      <p>&nbsp;</p></td>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><?php
	$s=mysql_query("select * from complaint where cmpno=$s1");
	if($row=mysql_fetch_array($s))
	{
	$staffid=$row[2];
	$complaint=$row[4];
	$cmpdate=$row[5];
	}
	
	
	?><table width="346" border="0">
        <tr>
          <td width="187">Complaint No </td>
          <td width="143"><?php echo $s1; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">Complaint</td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="t" id="t"><?php echo $complaint;  ?></textarea></td>
        </tr>
        <tr>
          <td>Complaint Date </td>
          <td><?php echo $cmpdate; ?>&nbsp;</td>
        </tr>
      </table>      
      <p><strong>Staff Details</strong></p>
	  <?php
	  $s=mysql_query("select * from staff where staffid='$staffid'");
	  if($row=mysql_fetch_array($s))
	  {
	  $name=$row[2];
	  $hname=$row[3];
	  $place=$row[4];
	  $pin=$row[5];
	  $ph=$row[6];
	  }
	  
	  
	  ?>
      <table width="350" border="0">
        <tr>
          <td width="140">Staff ID </td>
          <td width="194"><?php echo $staffid; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Name</td>
          <td><?php echo $name; ?></td>
        </tr>
        <tr>
          <td>House Name </td>
          <td><?php echo $hname; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo $place; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Pin</td>
          <td><?php echo $pin; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><?php echo $ph; ?>&nbsp;</td>
        </tr>
      </table>      
      <p>&nbsp; </p></td>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><script>
	function abc()
	{
	if(document.form1.t2.value=="")
	{
	alert("Please enter Reply");
	return(false);
	}
	}
	</script><form name="form1" onSubmit="return abc()" method="post" action="cmpreply33.php">
      <table width="412" border="0">
        <tr>
          <td width="406" height="38">Reply</td>
        </tr>
        <tr>
          <td><textarea name="t2" cols="40" rows="10" id="t2"></textarea></td>
        </tr>
        <tr>
          <td><input type="submit" name="Submit" value="Submit"><?php
		  echo "<input type='hidden' name='t1' value='$s1'>";
		  ?></td>
        </tr>
      </table>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="110"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="18"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
