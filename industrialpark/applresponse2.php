<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p2.php"); ?>
<table width="1297" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="461" rowspan="2" valign="top"><p><strong>Application Response</strong></p>      <p><?php
	include("connection.php");
	$s1=$_POST["t1"];
	$s=mysql_query("select * from application where applno not in(select applno from applresponse)");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Application waiting for Response";
	  else
	  {
	  echo "<Table border='0' width='100%'><tr><th>Application No.</th><th>Applicant Name</th><th>Place</th><th>Application Date</th><th>More...</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[11]</td><td><form action='applresponse2.php' method='post'><input type='submit' value='Select==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  
	  }
	  echo "</table>";
	  
	  
	  
	  }
	
	
	?>&nbsp; </p></td>
    <td width="14" height="319">&nbsp;</td>
    <td width="388" rowspan="2" valign="top"><p><strong>Application Details </strong></p>
    <?php
	$s=mysql_query("select * from application where applno=$s1");
	if($row=mysql_fetch_array($s))
	{
	$name=$row[1];
	$addr=$row[2];
	$place=$row[3];
	$pin=$row[4];
	$ph=$row[5];
	$dist=$row[6];
	$state=$row[7];
	$gender=$row[8];
	$documents=$row[9];
	$requirements=$row[10];
	$appldate=$row[11];
	
	}
	
	
	?>  <table width="376" border="0">
        <tr>
          <td width="126">Application No </td>
          <td width="234"><?php echo $s1; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Name</td>
          <td><?php echo $name; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $addr; ?></td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo $place; ?></td>
        </tr>
        <tr>
          <td>Pin</td>
          <td><?php echo $pin; ?></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><?php echo $ph; ?></td>
        </tr>
        <tr>
          <td>District</td>
          <td><?php echo $dist; ?></td>
        </tr>
        <tr>
          <td>State</td>
          <td><?php echo $state; ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $gender; ?></td>
        </tr>
        <tr>
          <td colspan="2"><form name="form1" method="post" action="down.php">
            <div align="center">
              <input type="submit" name="Submit" value="Download Documents">
            </div>
			<?php echo "<input type='hidden' name='t1' value='$documents'>"; ?>
          </form></td>
        </tr>
        <tr>
          <td colspan="2">Requirements</td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="textarea"><?php echo $requirements; ?></textarea></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo $appldate; ?>&nbsp;</td>
        </tr>
      </table>      <p>&nbsp;</p></td>
    <td width="434" valign="top"><p><strong>Response</strong></p><script>
	function aaa()
	{
	if(document.form2.t2.value=="")
	{
	alert("Please Enter the Comment");
	return(false);
	}
	}
	</script>
      <form name="form2" onSubmit="return aaa()" method="post" action="applresponse3.php">
        <table width="334" border="0">
          <tr>
            <td width="155">Status</td>
            <td width="233"><input name="r1" type="radio" value="Y">
              Yes 
              <input name="r1" type="radio" value="N" checked>
              No</td>
          </tr>
          <tr>
            <td colspan="2">Comment</td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="t2" cols="60" rows="7" id="t2"></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="Submit2" value="Submit"><?php echo "<input type='hidden' name='t1' value='$s1'>"; ?></td>
          </tr>
        </table>
      </form>      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="178">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
