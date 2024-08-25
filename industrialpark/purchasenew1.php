<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function abc()
{
if(document.form1.t1.value=="" || document.form1.t2.value=="" || document.form1.t3.value=="" || document.form1.t5.value=="")
{
alert("Please fill All");
return (false);

}
}

</script>
<body>
<?php include("p4.php"); ?>
<table width="1290" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="229" height="360">&nbsp;</td>
    <td width="447" valign="top"><p><strong>Purchase New Material</strong></p>      
      <form name="form1" onSubmit="return abc()" method="post" action="purchasenew2.php">
        <table width="360" border="0">
          <tr>
            <td width="169">Material Name </td>
            <td width="175"><input name="t1" type="text" id="t1"></td>
          </tr>
          <tr>
            <td>Quantity</td>
            <td><input name="t2" type="text" id="t2" onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Quantity Unit</td>
            <td><select name="t3" id="t3">
              <option>KG</option>
              <option>Gm</option>
              <option>Meeter</option>
              <option>Cm</option>
              <option>MM</option>
              <option>Sqfeet</option>
              <option>Ltr</option>
            </select></td>
          </tr>
          <tr>
            <td>Price</td>
            <td><input name="t4" type="text" id="t4" onKeyPress="return numbers(event)"></td>
          </tr>
          <tr>
            <td>Purcahse From </td>
            <td><input name="t5" type="text" id="t5" onKeyPress="return alphabets(event)"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="Submit" value="Submit">
            <input type="reset" name="Submit2" value="Reset"></td>
          </tr>
        </table>
    </form>      <p>&nbsp;</p></td>
    <td width="614">&nbsp;</td>
  </tr>
</table>
</body>
</html>
