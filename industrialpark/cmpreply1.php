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
    <td width="74" height="19">&nbsp;</td>
    <td width="519">&nbsp;</td>
    <td width="738">&nbsp;</td>
  </tr>
  <tr>
    <td height="350">&nbsp;</td>
    <td valign="top"><p><strong>Complaint Reply To Industry</strong></p>
    <p>
      <?php
	include("connection.php");
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
  </tr>
</table>
</body>
</html>
