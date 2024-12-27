<?php
$result="";
if(isset($_POST["btn_add"]))
{
    $num1 = $_POST["txt_no1"];
    $num2 = $_POST["txt_no2"];
    $result = $num1 +$num2;
}
if(isset($_POST["btn_sub"]))
{
	$num1 =$_POST["txt_no1"];
	$num2 =$_POST["txt_no2"];
	$result =$num1 -$num2;
}

 if(isset($_POST["btn_mul"]))
{
	$num1 =$_POST["txt_no1"];
	$num2 =$_POST["txt_no2"];
	$result =$num1 * $num2;
}
if(isset($_POST["btn_div"]))
{
	$num1 =$_POST["txt_no1"];
	$num2 =$_POST["txt_no2"];
	$result =$num1 / $num2;
}

    
     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1">
  <tr>
    <td>number 1</td>
    <td><input name="txt_no1" type="text" /></td>
  </tr>
  <tr>
    <td>number 2</td>
    <td><input name="txt_no2" type="text" /></td>
  </tr>
  <tr>
  
    <td colspan="2" align="center">
      <input type="submit" name="btn_add" id="btn_add" value="+" />
      <input type="submit" name="btn_sub" id="btn_sub" value="-" />
      <input type="submit" name="btn_mul" id="btn_mul" value="*" />
      <input type="submit" name="btn_div" id="btn_div" value="/" />
    </form></td>
  </tr>
  <tr>
    <td>result</td>
    <td><?php echo $result ?></td>
  </tr>
</table>
</form>
</body>
</html>
