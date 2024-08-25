<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php echo ""; include("p2.php");  ?>
<table width="1320" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="394" height="206"></td>
    <td width="415" valign="top"><div align="center">
        <p><strong>CHANGE PASSWORD</strong></p>
        <form name="form1" method="post"  onSubmit="return abc()"action="adchangepass2.php"><?php
	  $s1=$_POST["t1"];
	  $s2=$_POST["t2"];
	  $s3=$_POST["t3"];
	   ?>
          <table width="312" border="0">
            <tr>
              <td width="120">Old Password </td>
              <td width="176"><input name="t1" type="password" id="t1"value="<?php echo $s1;?>"></td>
            </tr>
            <tr>
              <td>New Password </td>
              <td><input name="t2" type="password" id="t2 "value="<?php echo $s2;?>"></td>
            </tr>
            <tr>
              <td>Retype Password </td>
              <td><input name="t3" type="password" id="t3" value="<?php echo $s3;?>"></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center"><?php 
			include("connection.php");
			$s=mysql_query("select * from login where userid='Admin' and  password='$s1'");
			$a=0;
			if($row=mysql_fetch_array($s))
			{
			$a++;
			}
			if($a==0)
			echo "<b>Invalid Old Password";
			else
			{
			$s="update login set password='$s2'  where userid='Admin'";
			mysql_query($s);
			echo "<b>Password Changed";
			} 
			?>
              </div></td>
            </tr>
          </table>
        </form>
        <p><strong></strong></p>
    </div></td>
    <td width="511"></td>
  </tr>
  <tr>
    <td height="198"></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
