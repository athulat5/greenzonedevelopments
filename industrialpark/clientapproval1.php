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
    <td width="441" height="104" valign="top"><p><strong>Client Approval</strong></p>      <form name="form1" method="post" action="clientapproval2.php">
        <?php
	  include("connection.php");
	  session_start();
	  $indid=$_SESSION["indid"];
	  $s=mysql_query("select * from clientappln where clientid not in(select clientid from clientapproval)");
	  if(mysql_num_rows($s)==0)
	     echo "<b>No Clients waiting for Approval";
		else
		{ 
	  
	  ?>  
        <table width="440" border="0">
          <tr>
            <td width="121">Select Client ID </td>
            <td width="160"><select name="t1" id="t1">
			  <?php
			while($row=mysql_fetch_array($s))
			{
			echo "<option>$row[0]</opton>";
			}
			?>
            </select></td>
            <td width="145"><input type="submit" name="Submit" value="Show Details==&gt;&gt;"></td>
          </tr>
          </table><?php } ?>
    </form></td>
    <td width="873">&nbsp;</td>
  </tr>
  <tr>
    <td height="284">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
