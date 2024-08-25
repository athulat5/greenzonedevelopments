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
    <td rowspan="2" valign="top"><p><strong>Existing Industry Details</strong></p>
    <p><?php
	include("connection.php");
	$s=mysql_query("select * from industry a, application b where a.applno=b.applno");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Industries";
	 else
	 {
	echo "<table border='1' width='100%'><tr><th>Industry ID </th><th>Industry Name</th><th>Authority Name</th><th>Address</th><th>Place</th><th>Pin</th><th>Phone</th><th>District</th><th>State</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr><td>$row[0]</td><td>$row[4]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td><td>$row[11]</td><td>$row[12]</td></tr>";
	
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
