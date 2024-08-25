<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p4.php"); ?>
<table width="1293" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="191" height="111">&nbsp;</td>
    <td colspan="2" valign="top"><p><strong>Materials Damage </strong></p>      <form name="form1" method="post" action="mdamage2.php">
        <?php
	 $s1=$_POST["t1"];
	 include("connection.php");
	 session_start();
	 $indid=$_SESSION["indid"];
	 $staffid=$_SESSION["staffid"];
	 $s=mysql_query("select * from mstock where indid='$indid' and stock>0");
	 if(mysql_num_rows($s)==0)
	  echo "<b>No Materials in stock";
	 else
	 {
	 ?> 
	     
	   <table width="449" border="0">
          <tr>
            <td>Select Material</td>
            <td><select name="t1" id="t1">
			    <?php
			echo "<option>$s1</option>";
			while($row=mysql_fetch_array($s))
			{
			if($s1==$row[0])
			  continue;
			echo "<option>$row[0]</option>";
			}
			
			
			?>
            </select></td>
            <td><input type="submit" name="Submit" value="Show Details"></td>
          </tr>
        </table><?php }
		?>
      </form></td>
    <td width="352">&nbsp;</td>
  </tr>
  <tr>
    <td height="249">&nbsp;</td><script>
	function abc()
	{
	if(document.form2.t2.value=="")
	{
	alert("Please enter the damage qty");
	return(false);
	
	}
	if(document.form2.t3.value=="")
	{
	alert("Please enter the Reason");
	return(false);
	
	}
	var x=Number(document.form2.t0.value);
	var y=Number(document.form2.t2.value);
	if(y>x)
	{
	alert("Please check the damage Qty.....It should not greater than the stock");
	return(false); 
	}
	}
	</script>
    <td width="294" valign="top"><form name="form2" onSubmit="return abc()" method="post" action="mdamage3.php">
    <?php
	$s=mysql_query("select * from purchase where mname='$s1' and indid='$indid'");
	if($row=mysql_fetch_array($s))
	{
	$unit=$row[4];
	
	}	
	
	$stock=0;
	$s=mysql_query("select * from mstock where mname='$s1' and indid='$indid'");
	if($row=mysql_fetch_array($s))
	{
	$stock=$row[2];
	
	}	
	?>  <table width="300" border="0">
        <tr>
          <td width="152">Current Stock </td>
          <td width="126"><?php echo $stock ;
		  echo "<input type='hidden' name='t0' value='$stock'>";
		  echo " $unit";
		  ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Damage Qty </td>
          <td><input name="t2" type="text" id="t2" onKeyPress="return numbers(event)"><?php echo $unit; ?></td>
        </tr>
        <tr>
          <td colspan="2">Reason</td>
          </tr>
        <tr>
          <td colspan="2"><textarea name="t3" cols="50" id="t3"></textarea></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="Submit2" value="Submit"></td>
        </tr>
      </table>
	  <?php echo "<input type='hidden' name='t1' value='$s1'>";  ?>
    </form></td>
    <td width="456">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
