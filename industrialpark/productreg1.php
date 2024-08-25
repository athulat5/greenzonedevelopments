<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function abc()
{
if(document.form1.t1.value=="" || document.form1.t3.value=="" ||document.form1.t4.value=="" ||document.form1.t6.value=="")
{
alert("Please enter the details");
return(false);

}

}

</script>
<body>
<?php include("p3.php"); ?>
<table width="1283" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="158" height="15"></td>
    <td width="897"></td>
    <td width="228"></td>
  </tr>
  <tr>
    <td height="319"></td>
    <td valign="top"><p><strong>Products Registration</strong></p>
      <form action="productreg2.php" onSubmit="return abc()" method="post" enctype="multipart/form-data" name="form1">
        <table width="435" border="0">
          <tr>
            <td width="162">Product Name </td>
            <td width="257"><input name="t1" type="text" id="t1"></td>
          </tr>
          <tr>
            <td>Product Type </td>
            <td><select name="t2" id="t2">
              <option>Iron</option>
              <option>Metal</option>
              <option>Wood</option>
              <option>Glass</option>
              <option>Plastic</option>
              <option>Rubber</option>
              <option>Fiber</option>
              <option>Polycarben</option>
            </select></td>
          </tr>
          <tr>
            <td>Price</td>
            <td><input name="t3" type="text" id="t3" onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Gst % </td>
            <td><input name="t4" type="text" id="t4"  onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Product Unit </td>
            <td><select name="t5" id="t5">
              <option>Gm</option>
              <option>Kg</option>
              <option>Meter</option>
              <option>Cm</option>
              <option>Inch</option>
              <option>SqFeet</option>
              <option>Ton</option>
            </select></td>
          </tr>
          <tr>
            <td>Price Qty </td>
            <td><input name="t6" type="text" id="t6"  onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Select Picture </td>
            <td><input type="file" name="file"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="Submit" value="Submit">
            <input type="reset" name="Submit2" value="Reset"></td>
          </tr>
        </table>
      </form>      <p>&nbsp; </p></td>
    <td></td>
  </tr>
  <tr>
    <td height="26"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>
