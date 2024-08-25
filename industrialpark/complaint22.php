<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function abc()
{
if(document.form1.t1.value=="")
{
alert("Please enter the Complaint");
return(false);
}

}


</script>
<body>
<?php include("p4.php"); ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="194" height="345">&nbsp;</td>
    <td width="867" valign="top"><p><strong>Post Your Complaint</strong></p>
      <form name="form1" onSubmit="return abc()" method="post" action="complaint22.php">
    <?php
	$s1=$_POST["t1"];
	
	?>    <table width="863" border="0">
          <tr>
            <td width="857" height="184"><textarea name="t1" cols="80" rows="10" id="t1" disabled><?php echo $s1; ?></textarea></td>
          </tr>
          <tr>
            <td><?php
			session_start();
			$staffid=$_SESSION["staffid"];
			$cmpno=0;
			include("connection.php");
			$s=mysql_query("select * from complaint order by cmpno desc");
			if($row=mysql_fetch_array($s))
			{
			$cmpno=$row[0];
			}
			$cmpno++;
			$cmpdate=date("Y")."-".date("m")."-".date("d");
			$s="insert into complaint(cmpno,staffid,complaint,cmpdate) values($cmpno,'$staffid','$s1','$cmpdate')";
			mysql_query($s);
			echo "<b>Your complaint send to the Authority...Please wait for the Reply...The Complaint No. is $cmpno";
			
			?>&nbsp;</td>
          </tr>
        </table>
      </form>      <p>&nbsp; </p></td>
    <td width="270">&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
