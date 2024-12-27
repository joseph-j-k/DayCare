    <?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_submit"]))
{
	
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	
	
	$selUser = "select * from tbl_user where user_email = '".$email."' and user_password = '".$password."'";
	$selstaff = "select * from  tbl_staff where staff_email = '".$email."' and staff_password = '".$password."'";
	$selAdmin = "select * from  tbl_admin where admin_email = '".$email."' and admin_password = '".$password."'";
	
	
	$result1 = $con -> query($selUser);
	$result2 = $con -> query($selstaff);
	$result3 = $con -> query($selAdmin);
	if($dataUser = $result1 -> fetch_assoc())
	{
		
		$_SESSION["uid"] = $dataUser["user_id"];
		$_SESSION["uname"] = $dataUser["user_name"];
		header("Location:../User/HomePage.php");
	
		
	}

	else if($datastaff = $result2 -> fetch_assoc())
	{
		$_SESSION["stid"] = $datastaff["staff_id"];
		$_SESSION["staffname"] = $datastaff["staff_name"];
		header("Location:../Staff/HomePage.php");
	}
	
	
		


else if($dataadmin = $result3 -> fetch_assoc())
	{
		$_SESSION["aid"] = $dataadmin["admin_id "];
		$_SESSION["adminname"] = $dataadmin["admin_name"];
		header("Location:../Admin/Dashboard.php");
	}
}
?>
<?php include("Head.php") ?>

<!-- Appointment Start -->
<div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4"># Login to continue your journey</h1>
                                <form method="Post" Action="">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0"  name="txt_email" id="txt_email" placeholder="Enter Email">
                                                <label for="gname">Enter Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0"  name="txt_password" id="txt_password" placeholder="Enter Password">
                                                <label for="gmail">Enter Password</label>
                                            </div>
										</div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-primary w-100 py-3" type="submit" name="btn_submit" id="btn_submit">Login</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="btn btn-primary w-100 py-3" href="Forgotpassword.php">forgotpassword</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="https://images.pexels.com/photos/27175639/pexels-photo-27175639/free-photo-of-child-posing-smiling-in-colorful-play-ball-pool.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->

		<?php include("Foot.php") ?>
