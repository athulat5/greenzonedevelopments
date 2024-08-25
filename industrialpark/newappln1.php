<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function abc()
{
if(document.form1.t1.value=="" ||document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value=="" ||document.form1.t5.value=="" || document.form1.t6.value=="" || document.form1.t9.value=="" || document.form1.t10.value=="" || document.form1.t11.value=="" )
{
alert("Please fill all entries...");
return(false);
}
if(document.form1.file.value=="")
{
alert("Please select the document to Upload");
return(false);
}

if(document.form1.t4.value.length<6)
{
alert("Pin should be exact 6 digits");
return(false);
}

if(document.form1.t5.value.length<10)
{
alert("Phone should be min 10 digits");
return(false);
}


if(document.form1.t10.value != document.form1.t11.value)
{
alert("Password and Re-type Password should be Same");
return(false);
}


}


</script>
<body>
<?php include("p1.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="157" height="13"></td>
    <td width="907"></td>
    <td width="263"></td>
  </tr>
  <tr>
    <td height="302"></td>
    <td valign="top"><p><strong>New Application for Industry Space</strong></p>
      <form action="newappln2.php" onSubmit="return abc()" method="post" enctype="multipart/form-data" name="form1">
        <table width="674" border="0">
          <tr>
            <td width="131">Applicant Name </td>
            <td width="179"><input name="t1" type="text" id="t1" onKeyPress="return alphabets(event)"></td>
            <td width="131">Address</td>
            <td width="205"><input name="t2" type="text" id="t2"></td>
          </tr>
          <tr>
            <td>Place</td>
            <td><input name="t3" type="text" id="t3"  onKeyPress="return alphabets(event)"></td>
            <td>Pin</td>
            <td><input name="t4" type="text" id="t4"  onKeyPress="return numbers(event)" maxlength="6"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input name="t5" type="text" id="t5"  onKeyPress="return numbers(event)" maxlength="13"></td>
            <td>District</td>
            <td><input name="t6" type="text" id="t6"  onKeyPress="return alphabets(event)"></td>
          </tr>
          <tr>
            <td>State</td>
            <td><select name="t7" id="t7">
              <option>Kerala</option>
              <option>Tamilnadu</option>
              <option>Karnataka</option>
              <option>Andrapradesh</option>
              <option>Delhi</option>
              <option>UP</option>
              <option>MP</option>
              <option>Gujarath</option>
              <option>Assam</option>
              <option>Skkim</option>
              <option>Meghalaya</option>
              <option>Manippur</option>
              <option>Jammu</option>
              <option>Nagaland</option>
              <option>Goa</option>
            </select></td>
            <td>Gender</td>
            <td><input name="t8" type="radio" value="M">
              Male 
              <input name="t8" type="radio" value="F" checked>
              Female</td>
          </tr>
          <tr>
            <td colspan="2">Requirements</td>
            <td>Documents</td>
            <td><input type="file" name="file"></td>
          </tr>
          <tr>
            <td colspan="2" rowspan="3"><textarea name="t9" cols="50" id="t9"></textarea></td>
            <td><div align="left">Password</div></td>
            <td><input name="t10" type="password" id="t10"></td>
          </tr>
          <tr>
            <td>Retype Password </td>
            <td><input name="t11" type="password" id="t11"></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input type="submit" name="Submit" value="Submit">
              <input type="reset" name="Submit2" value="Reset">
            </div></td>
          </tr>
        </table>
      </form>      <p>&nbsp; </p></td>
    <td></td>
  </tr>
  <tr>
    <td height="45"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>
