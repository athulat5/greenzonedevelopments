<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="javascript">
function abc()
{
if (document.form1.t1.value=="" || document.form1.t2.value=="" || document.form1.t3.value=="")
{
alert("please enter all fields");
return(false);
}
if((document.form1.t2.value) != (document.form1.t3.value))
{
alert("Incorrect new password and retype password");
return(false);
}

}
</script>
<body>
<?php echo ""; include("p2.php");  ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="393" height="17"></td>
    <td width="402"></td>
    <td width="504"></td>
  </tr>
  <tr>
    <td height="165"></td>
    <td valign="top"><div align="center">
        <p><strong>CHANGE PASSWORD</strong></p>
        <form name="form1"  onSubmit="return abc()" method="post" action="adchangepass2.php">
          <table width="343" border="0">
            <tr>
              <td width="134">Old Password </td>
              <td width="193"><input name="t1" type="password" id="t1"></td>
            </tr>
            <tr>
              <td>New Password </td>
              <td><input name="t2" type="password" id="t2"></td>
            </tr>
            <tr>
              <td>Retype Password </td>
              <td><input name="t3" type="password" id="t3"></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                  <input type="submit" name="Submit" value="Submit">
                  <input type="reset" name="Submit2" value="Reset">
              </div></td>
            </tr>
          </table>
        </form>
    </div></td>
    <td></td>
  </tr>
  <tr>
    <td height="161"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>
