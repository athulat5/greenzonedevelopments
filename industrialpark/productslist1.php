<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p1.php"); ?>
<table width="1317" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="48" height="15"></td>
    <td width="538"></td>
    <td width="731"></td>
  </tr>
  <tr>
    <td height="316"></td>
    <td valign="top"><p><strong>Industry Products </strong></p>
    <p>
      <?php
	include("connection.php");
	$s=mysql_query("select * from industry");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Industries alloted";
	 else
	 {
	echo "<table border='0' width='100%'><tr><th>Industry ID</th><th>Industry Name</th><th>Do</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr align='center'><td>$row[0]</td><td>$row[4]</td><td><form action='productslist2.php' method='post'><input type='submit' value='Click To View Products'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	
	}
	 
	echo "</table>";
	
	}
	
	?>
    </p></td>
    <td></td>
  </tr>
  <tr>
    <td height="38"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>
