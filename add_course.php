<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Courses</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="css/fontawesome.css" rel="stylesheet" media="all">
    <link href="css/fontawesome.min.css" rel="stylesheet" media="all">
    <link href="css/solid.css" rel="stylesheet" media="all">
    <link href="css/solid.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
            <?php
                include_once 'header_mobile.php';
            ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
            <?php
                include_once 'sidebar.php';
            ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php
                include_once 'header.php';
            ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="content">
                        <div class="page-inner">
                            <div class="page-header">
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Courses&nbsp; <i class="fas fa-book"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <form class="form-horizontal" method="post" action="add_coursedb.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"><b>Course name:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="corse_name" placeholder="Course name" name="course_name" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Course Code:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" pattern="[A-Z]{3}-[0-9]{3})" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" id="corse_code" placeholder="ABC-123" name="course_code" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Credit hours:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" pattern="[0-9]{1}[(][0-9]{1}-[0-9]{1}[)]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" id="crdt_hours" placeholder="3(2-1)" name="credit_hours" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <!-- <label class="control-label col-sm-2"><b>Semester:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="semester" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Semester</option>
                                                <option value="1st">1st</option>
                                                <option value="2nd">2nd</option>
                                                <option value="3rd">3rd</option>
                                                <option value="4th">4th</option>
                                                <option value="5th">5th</option>
                                                <option value="6th">6th</option>
                                                <option value="7th">7th</option>
                                                <option value="8th">8th</option>
                                            </select><br>
                                        </div> -->

                                        <label class="control-label col-sm-2"><b>Program:</b></label>
                                        <div class="col-sm-10">          
        									<select name="program" class="form-control" required="required" style="border-radius: 10px;">
        										<option value="">Select Program</option>
                    							<?php
                    								$sql="SELECT * FROM `program`";
                    								$result=mysqli_query($ob->config(),$sql);
                    							while($row=mysqli_fetch_assoc($result))
                    								{
                      							?>
                      							<option value="<?php echo $row['prog_name']; ?>"><?php echo $row['prog_name']; ?></option>
                      							<?php
                    								}
                    							?>
                  							</select>
        								</div><br>
                                        
                                        <label class="control-label col-sm-2"><b>Semester:</b></label>
                                        <div class="col-sm-10">          
        									<select name="department" class="form-control" required="required" style="border-radius: 10px;">
        										<option value="">Select Semester</option>
                    							<?php
                    								$sql="SELECT * FROM `semester`";
                    								$result=mysqli_query($ob->config(),$sql);
                    							while($row=mysqli_fetch_assoc($result))
                    								{
                      							?>
                      							<option value="<?php echo $row['sem_name']; ?>"><?php echo $row['sem_name']; ?></option>
                      							<?php
                    								}
                    							?>
                  							</select>
        								</div><br> 
                                        <div class="col-sm-12">
                                        <button class="btn btn-rounded btn btn-primary" name="save" style="border-radius: 10px;">Submit</button>
                                        </div>
                                    </div>
                                </form><br>
                                <!-- <div class="row">
                                    <table class="table table-bordered table-hover text-center" id="myTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Class_code</th>
                                                <th>Program</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
					            				$sql_all = "SELECT * FROM `class`";
					            				$result_all=mysqli_query($ob->config(),$sql_all);
					            				while($row_all=mysqli_fetch_assoc($result_all))
					            				{
					        				?>
                                            <tr>
                                                <td><?php echo $row_all['code'];?></td>
                                                <td><?php echo $row_all['class_name'];?></td>
                                                <td><?php echo $row_all['dept'];?></td>
                                                <td><i class="fas fa-pen"></i></td>
                                            </tr>
                                            <?php
                                            	}
                                            ?>
                                        </tbody>
                                    </table>
                                </div--> <!--row--> 
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
