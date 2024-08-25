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
    <td width="461" rowspan="2" valign="top"><p><strong>Check User Confirmation</strong></p>      <p><?php
	include("connection.php");
	$s1=$_POST["t1"];
	$s2=$_POST["t2"];
	$s3=$_POST["t3"];
	//$s=mysql_query("select * from application where applno not in(select applno from applresponse)");
		$s=mysql_query("select * from application where applno in(select applno from applresponse where respstatus='Y') and applno not in(select applno from industry) ");
	if(mysql_num_rows($s)==0)
	  echo "<b> No Application waiting for Response";
	  else
	  {
	 
	  echo "<Table border='0' width='100%'><tr><th>Application No.</th><th>Applicant Name</th><th>Place</th><th>Application Date</th><th>More...</th></tr>";
	  while($row=mysql_fetch_array($s))
	  {
	  if($s1==$row[0])
	  	  echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[11]</td><td>Processed</td></tr>";

	  else
	 
	  echo "<tr align='center'><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[11]</td><td><form action='checkconfirmstatus2.php' method='post'><input type='submit' value='Select==>>'><input type='hidden' name='t1' value='$row[0]'></form></td></tr>";
	  
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
          <td colspan="2"><textarea name="textarea" disabled><?php echo $requirements; ?></textarea></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo $appldate; ?>&nbsp;</td>
        </tr>
      </table>      <p>&nbsp;</p></td>
    <td width="434" valign="top"><p><strong>Confirmation</strong></p>
      <form name="form2" method="post" action="applresponse3.php">
      <?php
	  $s=mysql_query("select * from applconfirm where applno='$s1'");
	  if(mysql_num_rows($s)==0)
	    echo "<b>Please wait for the confirmation";
		else
		{
	  if($row=mysql_fetch_array($s))
	  {
	  $confirmstatus=$row[1];
	  $comment=$row[2];
	  $cdate=$row[3];
	  $cardno=$row[4];
	  $agrdocument=$row[5];
	  
	  
	  }
	  
	  ?>  <table width="334" border="0">
          <tr>
            <td width="155">Confirm Status</td>
            <td width="233"><?php echo $confirmstatus; ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">Comment</td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="t2" cols="60" rows="7" id="t2"  disabled><?php echo $comment; ?></textarea></td>
          </tr>
          <tr>
            <td>Date</td>
            <td><?php echo $cdate; ?>&nbsp;</td>
          </tr>
        </table>
      </form>   <?php if($confirmstatus=="Y")
	  {
	  ?>   
      <table width="398" border="0">
        <tr>
          <td width="163">Card No </td>
          <td width="219"><?php echo $cardno; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><form name="form3" method="post" action="down1.php">
            <input type="submit" name="Submit2" value="Download Agreement">
		<?php echo "<input type='hidden' name='t1' value='$agrdocument'>";  ?>
          </form></td>
        </tr>
      </table>      <form name="form4" method="post" action="checkconfirmstatus3.php">
        <table width="390" border="0">
          <tr>
            <td height="23" colspan="2">Terms And Conditions </td>
          </tr>
          <tr>
            <td height="79" colspan="2"><textarea name="t2" cols="60" id="t2" disabled><?php echo $s2; ?></textarea></td>
          </tr>
          <tr>
            <td width="145">Industry Name           
            
            <td width="243"><?php echo $s3; ?>            
          </tr>
          <tr>
            <td colspan="2"><?php
			$sdate=date("Y")."-".date("m")."-".date("d");
			
			$s=mysql_query("select * from industry  order by  indid desc");
			$indid="I1000";
			if($row=mysql_fetch_array($s))
			{
			$indid=$row[0];
			
			
			}
			$indid++;
			$s="insert into  industry values('$indid','$s1','$s2','$sdate','$s3')";
			mysql_query($s);
			$s="insert into login values('$indid','$indid')";
			mysql_query($s);
			echo "<b>Industry registered,,,The ID is $indid and Password is the same...";
			
			?>            
          </tr>
        </table>
		
        <p><?php }} ?>&nbsp;</p>
      </form>      <p>&nbsp;</p>      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="178">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
