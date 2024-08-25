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
	 $s2=$_POST["t2"];
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
    <td width="185">&nbsp;</td>
    <td width="165">&nbsp;</td>
  </tr>
  <tr>
    <td height="43">&nbsp;</td><script>
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
    <td width="300" rowspan="2" valign="top"><form name="form2" onSubmit="return abc()" method="post" action="production3.php">
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
          <td><input name="t2" type="text" id="t2" value="<?php echo $s2; ?>"><?php echo $unit; ?></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <?php
			$s=mysql_query("select * from temp where mname='$s1'");
			if(mysql_num_rows($s)>0)
			  echo "<b>This material already selected...Please remove and Add"; 
			else
			{
			$itemno=0;
			$s=mysql_query("select * from temp order by itemno desc");
			$itemno=0;
			if($row=mysql_fetch_array($s))
			{
			$itemno=$row[0];
			}
			$itemno++;
			$s="insert into temp  values($itemno,'$s1',$s2)";
			mysql_query($s);
			
			}
			
			?></div></td>
        </tr>
      </table>
	  <?php echo "<input type='hidden' name='t1' value='$s1'>";  ?>
    </form></td>
    <td width="15">&nbsp;</td>
    <td width="422" rowspan="2" valign="top"><p><strong>Selected Materials</strong></p>      <p><?php
	$k=0;
	$s=mysql_query("select * from temp");
	echo "<table border='0' width='100%'><tr><th>Item No</th><th>Material</th><th>Qty</th><th>Click...</th></tr>";
	while($row=mysql_fetch_array($s))
	{
	$k++;
	echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td><form action='production33.php' method='post'><input type='hidden' name='t1' value='$s1'><input type='hidden' name='t11' value='$row[0]'><input type='submit' value='Remove'></form></td></tr>";
	
	}
	echo "</table>";
	?>&nbsp; </p></td>
    <td colspan="2" valign="top"><form name="form3" method="post" action="production4.php">
   <?php  if($k>0) {?>   <input type="submit" name="Submit3" value="Production Entry"><?php } ?>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="206">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="17">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
