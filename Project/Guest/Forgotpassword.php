  <?php
include("Head.php");
include("../Assets/Connection/Connection.php"); 
session_start();
if(isset($_POST["btn_submit"]))
{


	$email = $_POST["txt_email"];
    $question = $_POST["selquestion"];
    $answer = $_POST["txt_ans"];

  echo $selUser = "select * from tbl_user where user_email = '".$email."' and user_squestion= '". $question."' and user_sanswer = '".$answer."'";

         
    $result1 = $con -> query($selUser);
    if($dataUser = $result1 -> fetch_assoc()) 
    {
 ?>
		
		<script>
        window.location = 'ChangePassword.php?cid=<?php echo $dataUser["user_id"] ?>';
        </script>;
        <?php
		
	}



    }

 ?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
<style>
    body {
        background-color: #f0f2f5; /* Light gray background */
        font-family: Arial, sans-serif; /* Clean font */
    }

    form {
        max-width: 600px;
        margin: auto;
        background-color: #fff; /* White background for the form */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        vertical-align: middle;
    }

    input[type="text"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type="radio"] {
        margin-right: 10px;
    }

    input[type="submit"],
    input[type="reset"] {
        width: 120px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #28a745; /* Green color */
        color: white;
        cursor: pointer;
        margin: 10px 5px;
    }

    input[type="reset"] {
        background-color: #dc3545; /* Red for cancel button */
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #218838; /* Darker green on hover for submit */
        color: white;
    }

    input[type="reset"]:hover {
        background-color: #c82333; /* Darker red on hover for reset */
    }
    
    select {
        appearance: none; /* For a consistent dropdown across browsers */
    }

    label {
        color: #555;
    }
    
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Alternate row color for readability */
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h1 colspan="2" align ="center">Forgot Password</h1>
  <table align="center" >

  <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" required autocomplete="off"  /></td>
    </tr>

    <tr>
    <td>Security Question</td>
       <td><select name="selquestion" id="selquestion">
        <option value="">---Questions---</option>
        <option value="which is your fav colour">which is your fav colour</option>
        <option value="which is your fav food">which is your fav food</option>
        <option value="which is your fav place">which is your fav place</option>
        <option value="which is your fav flower">which is your fav flower</option></select></td>
</tr>
    <tr>
      <td>Answer</td>
       <td><label for="txt_ans"></label>
     	  <input type="txt" name="txt_ans" id="txt_ans" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit"  />
      <input type="reset" name="btn_reset" id="btn_reset" value="cancel" /></td>
    </tr>
  </table>
</form>
 
</body>
</html>

<?php include("Foot.php")?>