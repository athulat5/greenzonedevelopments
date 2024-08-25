<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p4.php"); ?>
<table width="1290" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="229" height="360">&nbsp;</td>
    <td width="447" valign="top"><p><strong>Purchase New Material</strong></p>      
      <form name="form1" method="post" action="purchasenew2.php">
      <?php
	  $s1=$_POST["t1"];
	  $s2=$_POST["t2"];
	  $s3=$_POST["t3"];
	  $s4=$_POST["t4"];
	  $s5=$_POST["t5"];
	  
	  ?>  <table width="360" border="0">
          <tr>
            <td width="169">Material Name </td>
            <td width="175"><input name="t1" type="text" id="t1" value="<?php echo $s1; ?>" disabled></td>
          </tr>
          <tr>
            <td>Quantity</td>
            <td><input name="t2" type="text" id="t2"  value="<?php echo $s2; ?>" disabled></td>
          </tr>
          <tr>
            <td>Quantity Unit</td>
            <td><select name="t3" id="t3" disabled>
			<?php echo "<option>$s3</option>"; ?>
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
            <td><input name="t4" type="text" id="t4"  value="<?php echo $s4; ?>" disabled></td>
          </tr>
          <tr>
            <td>Purcahse From </td>
            <td><input name="t5" type="text" id="t5"  value="<?php echo $s5; ?>" disabled></td>
          </tr>
          <tr>
            <td colspan="2"><?php
			$pno=0;
			session_start();
			$indid=$_SESSION["indid"];
			$staffid=$_SESSION["staffid"];
			include("connection.php");
			$s=mysql_query("select * from purchase order by pno desc");
			if($row=mysql_fetch_array($s))
			{
			$pno=$row[0];
			}
			$pno++;
			$pdate=date("Y")."-".date("m")."-".date("d");
			$s="insert into purchase values($pno,'$indid','$s1','$s2','$s3','$s4','$s5','$pdate','$staffid')";
			mysql_query($s);
			$s=mysql_query("select * from mstock where mname='$s1' and indid='$indid'");
			if(mysql_num_rows($s)==0)
			  $s="insert into mstock values('$s1','$indid',$s2)";
			else
			  $s="update mstock set stock=stock+$s2 where mname='$s1' and indid='$indid'";
			  
			  mysql_query($s);
			   
			echo "<b>Purchase Process Success..";
			?>&nbsp;</td>
          </tr>
        </table>
    </form>      <p>&nbsp;</p></td>
    <td width="614">&nbsp;</td>
  </tr>
</table>
</body>
</html>
