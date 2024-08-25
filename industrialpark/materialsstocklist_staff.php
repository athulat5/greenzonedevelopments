<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
</head>
<script>
function printf()
{
window.print();
}

</script>
<body>
<?php include("p4.php"); ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="110" height="17"></td>
    <td width="440"></td>
    <td width="691"></td>
    <td width="59"></td>
    <td width="14"></td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td rowspan="2" valign="top"><p class="style1">Materials Stock  List</p>      <p>
        <?php
	include("connection.php");
	session_start();
	$indid=$_SESSION["indid"];
	
	$s=mysql_query("select * from mstock where indid='$indid'");
	if(mysql_num_rows($s)==0)
	 echo "<b>No Materials Stock...";
	 else
	 {
	echo "<table border='0' width='100%'><tr><th>Material Name</th><th>Current Stock</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr align='center'><td>$row[0]</td><td>$row[2]</td></tr>";
	
	}
	 
	echo "</table>";
	
	}
	
	?> 
      </p></td>
    <td>&nbsp;</td>
    <td valign="top"><input type="submit" name="Submit" value="Print" onClick="printf()"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="271"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="53"></td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
