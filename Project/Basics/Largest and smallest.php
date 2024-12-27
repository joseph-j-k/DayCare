<?php
$result="";
if(isset($_POST["btn_lar"]))
{
	$n1=$_POST["txt_no1"];
    $n2=$_POST["txt_no2"];
    $n3=$_POST["txt_no3"];
	if($n1>=$n2&&$n1>=$n3)
	{
		$result=$n1;
	}
	else
	if($n2>=$n3&&$n2>=$n2>=$n1
	{
		$result=$n2;
	}
	else
	{
		$result=$n3
	}
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><table width="200" border="1">
  <tr>
    <td>Number 1</td>
    <td><form id="form1" name="form1" method="post" action="">
      <label for="txt_no1"></label>
      <input type="text" name="txt_no1" id="txt_no1" />
    </form></td>
  </tr>
  <tr>
    <td>Number 2</td>
    <td><form id="form2" name="form2" method="post" action="">
      <label for="txt_no2"></label>
      <input type="text" name="txt_no2" id="txt_no2" />
    </form></td>
  </tr>
  <tr>
    <td>number 3</td>
    <td><form id="form3" name="form3" method="post" action="">
      <label for="txt_no3"></label>
      <input type="text" name="txt_no3" id="txt_no3" />
    </form></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><form id="form5" name="form5" method="post" action="">
      <input type="submit" name="btn_submit2" id="btn_submit2" value="Submit" />
    </form></td>
  </tr>
  <tr>
    <td>Largest</td>
    <td><form id="form6" name="form6" method="post" action="">
      <label for="txt_lar"></label>
      <input type="text" name="txt_lar" id="txt_lar" />
    </form></td>
  </tr>
  <tr>
    <td>Smallest </td>
    <td><form id="form7" name="form7" method="post" action="">
      <label for="txt_sml"></label>
      <input type="text" name="txt_sml" id="txt_sml" />
    </form></td>
  </tr>
</table>
<form id="form4" name="form4" method="post" action="">
  <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
</form>
</body>
</html>