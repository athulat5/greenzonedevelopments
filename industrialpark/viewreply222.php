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
    <td width="490" height="23">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="404">&nbsp;</td>
    <td width="336">&nbsp;</td>
    <td width="68">&nbsp;</td>
  </tr>
  <tr>
    <td height="332" valign="top"><p><strong>My Complaint Reply</strong></p>      <p>
        <?php
		$s1=$_POST["t1"];
	include("connection.php");
	session_start();
$clientid=$_SESSION["clientid"];
	$s=mysql_query("select * from complaint  where clientid='$clientid'");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Complaints Found...";
	  else
	  {
	  echo "<Table border='0' width='100%'><tr><th>Complaint No.</th><th>Complaint Date</th><th>More...</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<tr align='center'><td>$row[0]</td><td>$row[5]</td><td><form action='viewreply222.php' method='post'><input type='submit' value='Next==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  }
	  echo "</table>";
	  }
	
	
	?> 
              </p></td>
    <td>&nbsp;</td>
    <td valign="top"><?php
	$s=mysql_query("select * from complaint where cmpno=$s1");
	if($row=mysql_fetch_array($s))
	{
	$complaint=$row[4];
	$cmpdate=$row[5];
	$reply=$row[6];
	$rdate=$row[7];
	}
	
	?><table width="277" border="0">
      <tr>
        <td width="133">Complaint No </td>
        <td width="134"><?php echo $s1; ?>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">Complaint</td>
        </tr>
      <tr>
        <td colspan="2"><textarea name="textarea" disabled><?php echo $complaint; ?></textarea></td>
        </tr>
      <tr>
        <td>Complaint Date </td>
        <td><?php echo $cmpdate; ?>&nbsp;</td>
      </tr>
    </table></td>
    <td valign="top"><?php
	if($reply=="")
	 echo "<b><font color='red'>Please wait for the Reply";
	 else
	 {
	?><table width="244" border="0">
      <tr>
        <td height="35" colspan="2">Reply</td>
      </tr>
      <tr>
        <td colspan="2"><textarea name="textarea2" disabled><?php echo $reply; ?></textarea></td>
        </tr>
      <tr>
        <td>Reply Date </td>
        <td><?php echo $rdate; ?>&nbsp;</td>
      </tr>
    </table><?php } ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
