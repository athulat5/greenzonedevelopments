<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<script>
function abc()
{
if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value=="" ||document.form1.t5.value==""||document.form1.t6.value=="" ||document.form1.t7.value==""  ||document.form1.t11.value=="" ||document.form1.t12.value=="")
{
alert("Please enter the details");
return(false);

}

if(document.form1.file.value=="")
{
alert("Please select the Proof");
return(false);
}

if(document.form1.t5.value.length<6)
{
alert("Pin should be exact 6 digits");
return(false);
}

if(document.form1.t6.value.length<10)
{
alert("Phone should be Min 10 digits");
return(false);
}




if(document.form1.t11.value != document.form1.t12.value)
{
alert("Password and Retype Password should be Same...");
return(false);
}

}
</script>

<body>
<?php include("p1.php"); ?>
<table width="1267" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="144" height="15"></td>
    <td width="387"></td>
    <td width="87"></td>
    <td width="408"></td>
    <td width="241"></td>
  </tr>
  <tr>
    <td height="447"></td>
    <td valign="top"><p><strong>Client Application</strong></p>      <form action="clientappln2.php" onSubmit="return abc()" method="post" enctype="multipart/form-data" name="form1">
        <table width="378" border="0">
          <tr>
            <td width="124">Firm Name </td>
            <td width="238"><input name="t1" type="text" id="t1"></td>
          </tr>
          <tr>
            <td>Your Name </td>
            <td><input name="t2" type="text" id="t2" onKeyPress="return alphabets(event)"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input name="t3" type="text" id="t3"></td>
          </tr>
          <tr>
            <td>Place</td>
            <td><input name="t4" type="text" id="t4"  onKeyPress="return alphabets(event)"></td>
          </tr>
          <tr>
            <td>Pin</td>
            <td><input name="t5" type="text" id="t5"  onKeyPress="return numbers(event)" maxlength="6"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input name="t6" type="text" id="t6"  onKeyPress="return numbers(event)" maxlength="13"></td>
          </tr>
          <tr>
            <td>District</td>
            <td><input name="t7" type="text" id="t7"  onKeyPress="return alphabets(event)"></td>
          </tr>
          <tr>
            <td>State</td>
            <td><select name="t8" id="t8" >
              <option>Kerala</option>
              <option>Tamilnadu</option>
              <option>Karnataka</option>
              <option>UP</option>
              <option>MP</option>
              <option>Gujarath</option>
              <option>Sikkim</option>
              <option>Meghalaya</option>
              <option>Manippur</option>
              <option>Missoram</option>
              <option>Jemmu</option>
              <option>Maharashtra</option>
            </select></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><input name="t9" type="radio" value="M">
              Male 
              <input name="t9" type="radio" value="F" checked>
              Female</td>
          </tr>
          <tr>
            <td>Upload Proof </td>
            <td><input type="file" name="file"></td>
          </tr>
          <tr>
            <td>Select Industri ID </td>
            <td><select name="t10" id="t10">
              <?php
			include("connection.php");
	$s=mysql_query("select * from industry");
	
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<option>$row[0]</option>";
	  
	  }
	
			
			?>
                        </select></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input name="t11" type="password" id="t11"></td>
          </tr>
          <tr>
            <td>Retype Password</td>
            <td><input name="t12" type="password" id="t12"></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input type="submit" name="Submit" value="Submit">
              <input type="reset" name="Submit2" value="Reset">
            </div></td>
          </tr>
        </table>
    </form>      <p>&nbsp;    </p></td>
    <td>&nbsp;</td>
    <td valign="top"><p align="center"><strong>Existing Industries Details</strong></p>      <p><?php
	include("connection.php");
	$s=mysql_query("select * from industry");
	if(mysql_num_rows($s)==0)
	  echo "<b>No industry registered";
	  else
	  {
	  echo "<center><table border='0' width='100%'><tr><th>IndID</th><th>Name</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<tr align='center'><td>$row[0]</td><td>$row[4]</td></tr>";
	  
	  }
	  echo "</table>";
	  }
	
	?>&nbsp; </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
