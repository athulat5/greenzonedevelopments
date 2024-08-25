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
    <td width="189" height="111">&nbsp;</td>
    <td colspan="4" valign="top"><p><strong>Production</strong></p>      
      <form name="form1" method="post" action="production2.php">
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
    <td width="350">&nbsp;</td>
  </tr>
  <tr>
    <td height="248"></td><script>
	function abc()
	{
	if(document.form2.t2.value=="")
	{
	alert("Please enter the  qty");
	return(false);
	
	}
	var x=Number(document.form2.t0.value);
	var y=Number(document.form2.t2.value);
	if(y>x)
	{
	alert("Please check the Get Qty.....It should not greater than the stock");
	return(false); 
	}
	}
	</script>
    <td width="294" rowspan="2" valign="top"><form name="form2" onSubmit="return abc()" method="post" action="production3.php">
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
          <td>Get Qty </td>
          <td><input name="t2" type="text" id="t2" onKeyPress="return numbers(event)"><?php echo $unit; ?></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="Submit2" value="Select Material">
          </div></td>
        </tr>
      </table>
	  <?php echo "<input type='hidden' name='t1' value='$s1'>";  ?>
    </form></td>
    <td width="18"></td>
    <td width="425" valign="top"><?php
	
	
	$s=mysql_query("select * from temp");
	if(mysql_num_rows($s)>0)
	{
	
	echo "<p><strong>Selected Materials</strong></p>";
	
	
	echo "<table border='0' width='100%'><tr><th>Item No</th><th>Material</th><th>Qty</th><th>Click...</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td><form action='production33.php' method='post'><input type='hidden' name='t1' value='$s1'><input type='hidden' name='t11' value='$row[0]'><input type='submit' value='Remove'></form></td></tr>";
	
	}
	echo "</table>";
	}
	?></td>
    <td width="11"></td>
    <td></td>
  </tr>
  <tr>
    <td height="1"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
