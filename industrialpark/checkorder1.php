<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php include("p5.php"); ?>
<table width="1292" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="136" height="323">&nbsp;</td>
    <td width="875" valign="top"><p><strong>Check My Order Status </strong></p>
      <p>
        <?php
	include("connection.php");
	session_start();
	$indid=$_SESSION["indid"];
	$clientid=$_SESSION["clientid"];
	$s=mysql_query("select * from clientorder  where clientid='$clientid'");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Orders found";
	  else
	  {
	  $f=1;
	  echo "<Table border='0' width='100%' bgcolor='yellow'><tr><th>Order No</th><th>Order Date</th><th>Show Details(Click)</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  if($f==1)
	  echo "<tr align='center' bgcolor='#abcdef'><td>$row[0]</td><td>$row[3]</td><td><form action='checkorder2.php' method='post'><input type='submit' value='Details==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  else
	  	  echo "<tr align='center' bgcolor='#00cdff'><td>$row[0]</td><td>$row[3]</td><td><form action='checkorder2.php' method='post'><input type='submit' value='Details==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";

	  $f=$f*-1;
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>
    &nbsp; </p></td>
    <td width="281">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
