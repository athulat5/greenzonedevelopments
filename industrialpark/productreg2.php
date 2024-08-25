<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p3.php"); ?>
<table width="1283" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="158" height="15"></td>
    <td width="447"></td>
    <td width="36"></td>
    <td width="537"></td>
    <td width="105"></td>
  </tr>
  <tr>
    <td height="319"></td>
    <td valign="top"><p><strong>Products Registration</strong></p>      <form action="productreg2.php" method="post" enctype="multipart/form-data" name="form1">
        <?php
	  $s1=$_POST["t1"];
	  $s2=$_POST["t2"];
	  $s3=$_POST["t3"];
	  $s4=$_POST["t4"];
	  $s5=$_POST["t5"];
	  $s6=$_POST["t6"];
	  
	  
	  
	  ?>  <table width="435" border="0">
          <tr>
            <td width="162">Product Name </td>
            <td width="257"><?php echo $s1; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Product Type </td>
            <td><?php echo $s2; ?></td>
          </tr>
          <tr>
            <td>Price</td>
            <td><?php echo $s3; ?></td>
          </tr>
          <tr>
            <td>Gst % </td>
            <td><?php echo $s4; ?></td>
          </tr>
          <tr>
            <td>Product Unit </td>
            <td><?php echo $s5; ?></td>
          </tr>
          <tr>
            <td>Price Qty </td>
            <td><?php echo $s6; ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php
			include("connection.php");
			$s=mysql_query("select * from products order by pid desc");
			$pid="P100";
			if($row=mysql_fetch_array($s))
			{
			$pid=$row[0];
			}
			$pid++;
			session_start();
			$indid=$_SESSION["indid"];
				
			$filename=$_FILES["file"]["name"];
			$x=explode(".",$filename);
			$n=count($x);
			$n--;
			$ext=$x[$n];
			$filename="$pid.$ext";
			move_uploaded_file($_FILES["file"]["tmp_name"],"./products/$filename");
			
			$s="insert into products values('$pid','$indid','$s1','$s2','$s3','$s4','$s5','$s6','$filename')";
			mysql_query($s);
			echo "<b>Product registered"; 
			?>&nbsp;</td>
          </tr>
          </table>
    </form>      <p>&nbsp; </p></td>
    <td>&nbsp;</td>
    <td valign="top"><?php
	
	echo "<img src='./products/$filename' width='200' height='200'>";
	
	?><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
