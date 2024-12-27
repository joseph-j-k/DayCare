<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIEW COMPLAINT</title>

</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .QA_section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .white_box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .white_box_tittle {
            border-bottom: 2px solid #74CBF9;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .white_box h3 {
            color: #333;
            font-size: 18px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group label {
            color: #333;
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        .btn-dark {
            background-color: #74CBF9;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-dark:hover {
            background-color: #57b6e5;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .table thead {
            background-color: #74CBF9;
        }

        .table th {
            font-size: 16px;
            color: white;
        }

        .table td {
            font-size: 14px;
            color: #333;
        }

        .status_btn {
            background-color: #74CBF9;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .status_btn:hover {
            background-color: #57b6e5;
        }

        .box_header {
            padding-bottom: 20px;
        }

        .main-title {
            font-size: 20px;
            color: #333;
            font-weight: bold;
        }
    </style>
    <?php  
	ob_start();
include('../Assets/Connection/Connection.php');
      
    if(isset($_POST["btn_save"])) {

            $upQry = "update tbl_complaint set complaint_reply='".$_POST["txt_reply"]."',complaint_status='1' where complaint_id='".$_POST["hid"]."'";
            $con->query($upQry);
			
           header("Location:ViewComplaint.php");
        }


    ?>
    <body>
        <section class="main_content dashboard_part">

            <!--/ menu  -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <?php                          
								         if (isset($_GET["up"])) {
                                ?>

                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Send Reply</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_district">Reply</label>
                                                    <input required="" type="text" class="form-control" id="txt_reply" name="txt_reply">
                                                    <input type="hidden" name="hid" value="<?php echo $_GET["up"];?>">
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    }


                                ?>
                                <h1>New Complaints</h1>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Complaint</td>
                                                <td align="center" scope="col">Date</td>
                                                <td align="center" scope="col">User</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$i = 0;
                                                $selQry = "select * from tbl_complaint c inner join tbl_complainttype t on t.complainttype_id=c.complainttype_id inner join tbl_user u on c.user_id = u.user_id where complaint_status='0'";
                                               $rs = $con->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["complaint_content"] ?></td>
                                                <td align="center"><?php echo $data["complaint_date"] ?></td>
                                                <td align="center"><?php echo $data["user_name"] ?></td>
                                                <td align="center"><a href="ViewComplaint.php?up=<?php echo $data["complaint_id"] ?>" class="status_btn">Reply</a> </td>
                                            </tr>
                                            <?php                     
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <h1>Replyed Complaints</h1>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Complaint</td>
                                                <td align="center" scope="col">Date</td>
                                                <td align="center" scope="col">User</td>
                                                <td align="center" scope="col">Reply</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$i = 0;
                                                $selQry = "select * from tbl_complaint c inner join tbl_complainttype t on t.complainttype_id=c.complainttype_id inner join tbl_user u on c.user_id = u.user_id where complaint_status='1'";
                                               $rs = $con->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["complaint_content"] ?></td>
                                                <td align="center"><?php echo $data["complaint_date"] ?></td>
                                                <td align="center"><?php echo $data["user_name"] ?></td>
                                                <td align="center"><?php echo $data["complaint_reply"] ?></td>
                                            </tr>
                                            <?php                     }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </body>
     <?php
		 ob_end_flush();
		?>
    </html>