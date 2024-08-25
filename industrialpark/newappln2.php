<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

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
      <form action="newappln2.php" method="post" enctype="multipart/form-data" name="form1">
       <?php
	   $s1=$_POST["t1"];
	   $s2=$_POST["t2"];
	   $s3=$_POST["t3"];
	   $s4=$_POST["t4"];
	   $s5=$_POST["t5"];
	   $s6=$_POST["t6"];
	   $s7=$_POST["t7"];
	   $s8=$_POST["t8"];
	     $s9=$_POST["t9"];
	   $s10=$_POST["t10"];
	   
	   ?> <table width="674" border="0">
          <tr>
            <td width="131">Applicant Name </td>
            <td width="179"><input name="t1" type="text" id="t1" value="<?php echo $s1; ?>" disabled></td>
            <td width="131">Address</td>
            <td width="205"><input name="t2" type="text" id="t2"  value="<?php echo $s2; ?>" disabled></td>
          </tr>
          <tr>
            <td>Place</td>
            <td><input name="t3" type="text" id="t3"  value="<?php echo $s3; ?>" disabled></td>
            <td>Pin</td>
            <td><input name="t4" type="text" id="t4"  value="<?php echo $s4; ?>" disabled></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input name="t5" type="text" id="t5"  value="<?php echo $s5; ?>" disabled></td>
            <td>District</td>
            <td><input name="t6" type="text" id="t6"  value="<?php echo $s6; ?>" disabled></td>
          </tr>
          <tr>
            <td>State</td>
            <td><select name="t7" id="t7" disabled>
			<?php echo "<option>$s7</option>"; ?>
              <option>Kerala</option>
              <option>Tamilnadu</option>
              <option>Karnataka</option>
              <option>Andra</option>
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
            <td><?php if($s8=="M"){ ?><input name="t8" type="radio" value="M" checked disabled>
              Male 
              <input name="8" type="radio" value="F" disabled>
              Female<?php
			  }
			  else
			  {?>
			  
			  <input name="t8" type="radio" value="M" disabled>
              Male 
              <input name="8" type="radio" value="F" checked disabled>
              Female
			  
			  <?php
			  }
			  ?>
			  </td>
          </tr>
          <tr>
            <td colspan="2">Requirements</td>
            <td>Documents</td>
            <td>Selected</td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="t9" cols="50" id="t9" disabled><?php echo $s9; ?></textarea></td>
            <td colspan="2"><div align="center"><?php
			$applno=1000;
			include("connection.php");
			
			$s=mysql_query("select * from application where ph='$s5'");
			if(mysql_num_rows($s)>0)
			{
			echo "<b>This Applicant already registered";
			}
			else
			{
			
			
			$s=mysql_query("select * from application order by applno desc");
			
			if($row=mysql_fetch_array($s))
			{
			$applno=$row[0];
			}
			$applno++;
			$appldate=date("Y")."-".date("m")."-".date("d");
						
			$filename=$_FILES["file"]["name"];
			$x=explode(".",$filename);
			$n=count($x);
			$n--;
			$ext=$x[$n];
			$filename="$applno.$ext";
			move_uploaded_file($_FILES["file"]["tmp_name"],"./docs/$filename");
			$s="insert into application values($applno,'$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$filename','$s9','$appldate')";
			mysql_query($s);
			$s="insert into login value('$applno','$s10')";
			mysql_query($s);
			echo "<b>Your Application submitted...The Application No. is $applno <br> Please wait for the response...";
			}
			?>
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
