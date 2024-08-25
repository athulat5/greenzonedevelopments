<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function printf()
{
window.print();
}
</script>
<body>
<?php include("p2.php"); ?>
<table width="1308" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="149" height="15"></td>
    <td width="921"></td>
    <td width="155"></td>
    <td width="69"></td>
    <td width="14"></td>
  </tr>
  <tr>
    <td height="23"></td>
    <td rowspan="2" valign="top"><p><strong>Confirmed Applicants  Details</strong></p>
      <p><?php
	include("connection.php");
	$s=mysql_query("select * from application  where applno in(select applno from applconfirm where confirmstatus='Y')");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Confirmed Applicants";
	 else
	 {
	echo "<table border='1' width='100%'><tr><th>Application No</th><th>Applicant Name</th><th>Address</th><th>Place</th><th>Pin</th><th>Phone</th><th>District</th><th>State</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
	
	}
	 
	echo "</table>";
	
	}
	
	?>&nbsp; </p></td>
    <td>&nbsp;</td>
    <td valign="top"><input type="submit" name="Submit" value="Print" onClick="return printf()"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="293"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
