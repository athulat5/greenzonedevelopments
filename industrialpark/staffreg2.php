<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p3.php");  ?>
<table width="1319" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="351" height="47">&nbsp;</td>
    <td width="393" rowspan="3" valign="top"><p align="center"><strong>Staff Registration</strong></p>      <form name="form1" method="post" action="staffreg2.php">
      <?php	 
	 $s1=$_POST["t1"];
	 $s2=$_POST["t2"];
	 $s3=$_POST["t3"];
	 $s4=$_POST["t4"];
	 $s5=$_POST["t5"];
	 $s6=$_POST["t6"];
	 $s7=$_POST["t7"];
	 $s8=$_POST["t8"];
	 
	 ?>
        <table width="280" border="0" align="center">
          <tr>
            <td width="131">Name</td>
            <td width="133"><?php echo $s1; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>House Name/No </td>
            <td><?php echo $s2; ?></td>
          </tr>
          <tr>
            <td>Place</td>
            <td><?php echo $s3; ?></td>
          </tr>
          <tr>
            <td>Pin</td>
            <td><?php echo $s4; ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><?php echo $s5; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $s6; ?></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><?php echo $s7; ?></td>
          </tr>
          <tr>
            <td>Adhar No </td>
            <td><?php echo $s8; ?></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <?php
			include("connection.php");
			$staffid="S1000";
			$s=mysql_query("select * from staff order by staffid desc");
			if($row=mysql_fetch_array($s))
			{
			$staffid=$row[0];
			}
			$staffid++;
			$regdate=date("Y")."-".date("m")."-".date("d");
			$s=mysql_query("select * from staff where phone='$s5'");
			
			if(mysql_num_rows($s)>0)
			   echo "<b>This staff already registered.....";
			else   
			{
			$filename=$_FILES["file"]["name"];
			$x=explode(".",$filename);
			$n=count($x);
			$n--;
			$ext=$x[$n];
			$filename="$staffid.$ext";
			move_uploaded_file($_FILES["file"]["tmp_name"],"./staffphoto/$filename");
			session_start();
			$indid=$_SESSION["indid"];
			$s="insert into staff values('$staffid','$indid','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$filename','$regdate')";
			mysql_query($s);
			$s="insert into login values('$staffid','$staffid')";
			mysql_query($s);
			echo  "<b>Staff details successfully registered.....The staff ID is $staffid and password is the same";
			}
			?>
            </div></td>
          </tr>
        </table>
    </form>      <p>&nbsp; </p></td>
    <td width="26">&nbsp;</td>
    <td width="303">&nbsp;</td>
    <td width="246">&nbsp;</td>
  </tr>
  <tr>
    <td height="249">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><?php
	echo "<img src='./staffphoto/$filename' width='200' height='200'>";
	
	?>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="52">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="43">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
