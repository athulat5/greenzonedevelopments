<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p2.php"); ?>
<table width="1297" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="238" height="334">&nbsp;</td>
    <td width="638" valign="top"><p><strong>Application Response</strong></p>
    <p><?php
	include("connection.php");
	$s=mysql_query("select * from application where applno not in(select applno from applresponse)");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Application waiting for Response";
	  else
	  {
	  echo "<Table border='0' width='100%'><tr><th>Application No.</th><th>Applicant Name</th><th>Place</th><th>Application Date</th><th>More...</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[11]</td><td><form action='applresponse2.php' method='post'><input type='submit' value='Select==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>&nbsp; </p></td>
    <td width="421">&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
