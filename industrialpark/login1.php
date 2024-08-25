<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function abc()
{
if(document.form1.t1.value=="" || document.form1.t2.value=="")
{
alert("Please Enter the User ID and Password");
return(false);

} 
}

</script>
<body>
<?php include("p1.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="160" height="19">&nbsp;</td>
    <td width="281">&nbsp;</td>
    <td width="890">&nbsp;</td>
  </tr>
  <tr>
    <td height="175">&nbsp;</td>
    <td valign="top"><p><strong>Users LogIn</strong></p>      <form name="form1" method="post" onSubmit="return abc()" action="login2.php">
        <table width="200" border="0">
          <tr>
            <td>User ID </td>
          </tr>
          <tr>
            <td><input name="t1" type="text" id="t1"></td>
          </tr>
          <tr>
            <td>Password</td>
          </tr>
          <tr>
            <td><input name="t2" type="password" id="t2"></td>
          </tr>
          <tr>
            <td><input type="submit" name="Submit" value="SignIn"></td>
          </tr>
        </table>
      </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="195">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
