<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p2.php"); ?>
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
    <td height="329" valign="top"><p><strong>Complaint Reply To Industry</strong></p>      <p>
        <?php
	include("connection.php");
	$s1=$_POST["t1"];
	$s=mysql_query("select * from complaint  where indid is not null and reply is null");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Complaint waiting for Reply...";
	  else
	  {
	  echo "<Table border='0' width='100%'><tr><th>Complaint No.</th><th>Industrial ID</th><th>Complaint Date</th><th>More...</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[5]</td><td><form action='cmpreply2.php' method='post'><input type='submit' value='Next==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
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
	$indid=$row[1];
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
      <p><strong>Industry Details</strong></p>
	  <?php
	  $s=mysql_query("select * from industry where indid='$indid'");
	  if($row=mysql_fetch_array($s))
	  {
	  $applno=$row[1];
	  $indname=$row[4];
	  }
	  
	  $s=mysql_query("select * from application where applno='$applno'");
	  if($row=mysql_fetch_array($s))
	  {
	  $applname=$row[1];
	  $place=$row[3];
	  $pin=$row[4];
	  $phone=$row[5];
	  }
	  
	  ?>
      <table width="350" border="0">
        <tr>
          <td width="140">Industry ID </td>
          <td width="194"><?php echo $indid; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Industry Name </td>
          <td><?php echo $indname; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Authority Name </td>
          <td><?php echo $applname; ?>&nbsp;</td>
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
          <td><?php echo $phone; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>      <p>&nbsp; </p></td>
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
	</script><form name="form1" onSubmit="return abc()" method="post" action="cmpreply3.php">
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
