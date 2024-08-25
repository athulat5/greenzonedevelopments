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
alert("Please Enter All");
return(false);
}
}

</script>
<body>
<?php include("p1.php"); ?>
<table width="1293" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="401" height="76" valign="top"><p><strong>Application Confirmation </strong></p>      
      <form name="form1" method="post" onSubmit="return abc()" action="applconfirm2.php">
        <table width="404" border="0">
          <tr>
            <td width="121">Application No </td>
            <td width="179"><input name="t1" type="text" id="t1"></td>
            <td width="82" rowspan="2"><input type="submit" name="Submit" value="Details&gt;&gt;"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input name="t2" type="password" id="t2"></td>
          </tr>
        </table>
      </form></td>
    <td width="892">&nbsp;</td>
  </tr>
  <tr>
    <td height="332">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
