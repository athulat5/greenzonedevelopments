<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<script>
function abc()
{
if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value=="" ||document.form1.t5.value==""||document.form1.t6.value=="" ||document.form1.t8.value=="")
{
alert("Please enter the details");
return(false);

}

if(document.form1.file.value=="")
{
alert("Please select the Photo");
return(false);
}

if(document.form1.t4.value.length<6)
{
alert("Pin should be exact 6 digits");
return(false);
}

if(document.form1.t5.value.length<10)
{
alert("Phone should be Min 10 digits");
return(false);
}


if(document.form1.t8.value.length<12)
{
alert("Adhar should be exact 12 digits");
return(false);
}


if(document.form1.t6.value.indexOf("@")==-1 || document.form1.t6.value.indexOf(".")==-1 || document.form1.t6.value.indexOf("@")==0  || document.form1.t6.value.indexOf(".")==0)
{
alert("Invalid Email");
return(false);
}

}
</script>
<body>
<?php include("p3.php");  ?>
<table width="1319" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="351" height="346">&nbsp;</td>
    <td width="393" valign="top"><p align="center"><strong>Staff Registration</strong></p>      <form action="staffreg2.php" onSubmit="return abc()" method="post" enctype="multipart/form-data" name="form1">
        <table width="357" border="0" align="center">
          <tr>
            <td width="126">Name</td>
            <td width="191"><input name="t1" type="text" id="t1" onKeyPress="return alphabets(event)"></td>
          </tr>
          <tr>
            <td>House Name/ No </td>
            <td><input name="t2" type="text" id="t2"></td>
          </tr>
          <tr>
            <td>Place</td>
            <td><input name="t3" type="text" id="t3"  onKeyPress="return alphabets(event)"></td>
          </tr>
          <tr>
            <td>Pin</td>
            <td><input name="t4" type="text" id="t4" maxlength="6" onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input name="t5" type="text" id="t5" maxlength="13"  onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input name="t6" type="text" id="t6" onKeyPress="return email(event)"></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><input name="t7" type="radio" value="M" checked>
              Male 
              <input name="t7" type="radio" value="F">
              Female</td>
          </tr>
          <tr>
            <td>Adhar No. </td>
            <td><input name="t8" type="text" id="t8" maxlength="12"  onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Select Photo</td>
            <td><input type="file" name="file"></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input type="submit" name="Submit" value="Submit">
              <input type="reset" name="Submit2" value="Reset">
          </div></td>
          </tr>
        </table>
    </form>      <p>&nbsp; </p></td>
    <td width="575">&nbsp;</td>
  </tr>
  <tr>
    <td height="43">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
