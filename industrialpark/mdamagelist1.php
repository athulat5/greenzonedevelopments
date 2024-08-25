<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p3.php"); ?>
<table width="1293" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="191" height="142">&nbsp;</td>
    <td width="750" valign="top"><p><strong>Materials Damage List </strong></p>      <form name="form1" method="post" action="mdamagelist2.php">
       <?php
	 include("connection.php");
	 session_start();
	 $indid=$_SESSION["indid"];
	 
	 $s=mysql_query("select * from mstock where indid='$indid'");
	 if(mysql_num_rows($s)==0)
	  echo "<b>No Materials Purchase";
	 else
	 {
	 ?> 
	   
	   <table width="449" border="0">
          <tr>
            <td>Select Material</td>
            <td><select name="t1" id="t1">
			  <?php
			while($row=mysql_fetch_array($s))
			{
			echo "<option>$row[0]</option>";
			}
			
			
			?>
            </select></td>
            <td><input type="submit" name="Submit" value="Show Details"></td>
          </tr>
        </table><?php }
		?>
    </form>      <p>&nbsp;</p></td>
    <td width="352">&nbsp;</td>
  </tr>
  <tr>
    <td height="218">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
