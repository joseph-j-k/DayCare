<?php  include("../Assets/Connection/Connection.php"); ?>
<?php
include("Head.php");
if(isset($_POST["btn_submit"]))

{
	$place = $_POST["selPlace"];
  $location =$_POST["txt_loc"];
	$name = $_POST["txt_name"];
	$age = $_POST["txt_age"];
	$gender = $_POST["radio"];
	$pincode = $_POST["txt_pincode"];
	$qualification = $_POST["txt_qlt"];
	$dob = $_POST["txt_dob"];
	$doj = $_POST["txt_doj"];
	$address = $_POST["txt_address"];
	$email =  $_POST["txt_email"];
	$password =  $_POST["txt_password"];
	$contact = $_POST["txt_contact"];
	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	 move_uploaded_file($temp, '../Assets/File/Staff/'. $photo);
	 
	 
	 	
	$insQry = "INSERT INTO tbl_staff (staff_location,staff_name, staff_age, staff_gender, 	staff_pincode, staff_qualification,	staff_dob,	staff_doj,	staff_address,staff_email,staff_password,staff_contact,staff_photo,place_id) 
               VALUES ('" . $location . "','" . $name . "', '" .$age . "', '" . $gender . "', '" .$pincode . "', '" . $qualification . "', '" .$dob . "', '" . $doj  . "', '" .$address . "','".	$email ."','" .$password . "','" . $contact . "','" . $photo . "','" . $place . "')";
	
	if($con ->query($insQry))
	{
		
		echo "<script>
				alert('Inserted');
				window.location = 'StaffRegistration.php';
			</script>";
		
		}
	
	
	
	
	
	}





?> 



 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffRegistration</title>
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
<form id="form1" name="form1" method="post" action=""	  enctype="multipart/form-data">
  <h1 align="center">Staff Registration</h1>
  <table  align="center">
    <tr>
      <td>District</td>
      <td><select name="selDistrict" id="selDistrict" onchange="getPlace(this.value)">
          <option>---District---</option>
          <?php 
	  $sel = "select * from tbl_district";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
          <option value="<?php  echo $data["district_id"]?>">
          <?php  echo $data["district_name"]?>
          </option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>place</td>
      <td>
      	<select name="selPlace" id="selPlace">
          <option>---Place---</option>
        </select></td>
    </tr>
    <tr>
      <td>location</td>
      <td><label for="txt_loc"></label>
      <input type="text" name="txt_loc" id="txt_loc" /></td>
    </tr> 
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required autocomplete="off"  /></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><label for="txt_age"></label>
      <input type="text" name="txt_age" id="txt_age" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Gender</td>
       <td><label for="radio_male">Male</label>
        <input type="radio" name="radio" id="radio" value="male" />
        <label for="radio_female">Female</label>
        <input type="radio" name="radio" id="radio" value="female" /></td>
    <tr>
      <td>Pincode</td>
      <td><label for="txt_pincode"></label>
      <input type="text" name="txt_pincode" id="txt_pincode" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Qualification</td>
      <td><label for="txt_qlt"></label>
      <input type="text" name="txt_qlt" id="txt_qlt" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>DOB</td>
      <td><label for="txt_dob"></label>
      <input type="date" name="txt_dob" id="txt_dob" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>DOJ</td>
      <td><label for="txt_doj"></label>
      <input type="date" name="txt_doj" id="txt_doj" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" required autocomplete="off" /></td>
    </tr> <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
    </tr>
     <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required pattern="[7-9]{1}[0-9]{9}"  title="Phone number with 7-9 and remaing 9 digit with 0-9" autocomplete="off" placeholder="+91"/></td>
    </tr>
   <tr>
      <td>Photo</td>
      <td><label for="photo"></label>
     	  <input type="file" name="photo" id="photo" required autocomplete="off" /></td>
    </tr>
    
    
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      
      <input type="reset" name="btn_reset" id="btn_reset" value="cancel" /></td>
    </tr>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script> 
<script>
function getPlace(did)
{
	
	$.ajax({
		
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#selPlace").html(html);
			
			
			}
		
		
		
		});
	
	
	}
	
</script>
  
</body>
</html>

<?php include("Foot.php") ?>	