<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function printf()
{
window.print();
}

</script>
<body>
<?php include("p3.php"); ?>
<table width="1293" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="189" height="26">&nbsp;</td>
    <td colspan="3" rowspan="3" valign="top"><p><strong>Materials Damage List </strong></p>      <form name="form1" method="post" action="mdamagelist2.php">
        <?php
	 $s1=$_POST["t1"];
	 include("connection.php");
	 session_start();
	 $indid=$_SESSION["indid"];
	 $s=mysql_query("select * from mstock where indid='$indid'");
	 if(mysql_num_rows($s)==0)
	  echo "<b>No Materials Purchased";
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
    <td width="490">&nbsp;</td>
    <td width="95">&nbsp;</td>
    <td width="51">&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><input type="submit" name="Submit2" value="Print" onClick="return printf()"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="56">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td width="300" valign="top"><form name="form2"  method="post" action="">
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
      </table>
	  <?php echo "<input type='hidden' name='t1' value='$s1'>";  ?>
    </form></td>
    <td width="9">&nbsp;</td>
    <td colspan="2" valign="top"><p><strong>Damage Details</strong></p>
    <p><?php  
	$s=mysql_query("select * from mdamage where mname='$s1' order by dno");
	if(mysql_num_rows($s)==0)
	   echo "<b>No Damage Entry Found";
	   else
	   {
	   echo "<table border='0' width='100%'><Tr><th>Damage No</th><th>Damage Quantity</th><th>Reason</th><th>Staffid</th><th>Damage Date</th></tr>";
	   while($row=mysql_fetch_array($s))
	   {
	   echo "<tr align='center'><td>$row[0]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
	   }
	   echo "</table>";
	   
	   }
	?>&nbsp; </p></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="1"></td>
    <td></td>
    <td></td>
    <td width="146"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
