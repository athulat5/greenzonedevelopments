<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style11 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>		


<style>
body,
.bg
{
background-image:url("./back/a1.jpg");
background-repeat:no-repeat;
background-size: cover;
color: black;
background-position: inherit;
}
</style>

<style type="text/css">

input[type=text],input[type=password]{
width:80%;
height:7px;
border-radius: 7px;
padding:7px;
background-color:#FFFF99;
color:#FF0000;



}
input[type=submit],input[type=reset]{
padding:10px;
background-color:#FFFFFF;
font-size: 14px;
margin: 10px;
width:auto;
border-radius:20px;
border: 1px solid #ff7101;
color:#FF0000;

}

textarea {
	
	width: 90%;
	height: 80px;
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
	border-radius: 8px;
	background-color:#FFFFCC;
	color:#FF0000;
}

</style>





	
</head>


<script  language="javascript">

function numbers(event)
{

var charCode=event.keyCode;
if(charCode>31&&(charCode<48||charCode>57))
return false;

}
function alphabets(event)
{
var charCode=event.keyCode;
if((charCode>=65&&charCode<=90)||(charCode>=97&&charCode<=122)||charCode==32)
return true;
else
return false;
}


function email(event)
{
var charCode=event.keyCode;
if((charCode>=65&&charCode<=90)||charCode==32)
return false;
else
return true;
}

</script>


<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="1331" height="167" valign="top"><img src="back/h1.jpg" width="100%" height="166"></td>
  </tr>
  <tr>
    <td height="23" valign="top" bgcolor="#66CCFF"><span class="style11">Admin Process 
    </span><?php include("adminmenu.html"); ?></td>
  </tr>
</table>
</body>
</html>
