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
    <title>Classes</title>

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
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Classes&nbsp; <i class="fas fa-chalkboard"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <form class="form-horizontal" method="post" action="add_classdb.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"><b>Program:</b></label>
                                        <div class="col-sm-10">          
        									<select name="program" class="form-control" required="required" style="border-radius: 10px;">
        										<option>Select Program</option>
                    							<?php
                    								$sql_get_cat_id="SELECT * FROM `program`";
                    								$result_get_cat_id=mysqli_query($ob->config(),$sql_get_cat_id);
                    							while($row_get_cat_id=mysqli_fetch_assoc($result_get_cat_id))
                    								{
                      							?>
                      							<option value="<?php echo $row_get_cat_id['prog_name']; ?>"><?php echo $row_get_cat_id['prog_name']; ?></option>
                      							<?php
                    								}
                    							?>
                  							</select>
        								</div><br>
                                        <label class="control-label col-sm-2"><b>Batch:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="c_code" placeholder="AB-111" name="class_code" required="required" style="border-radius: 10px;"><br>
                                        </div>
                                        <label class="control-label col-sm-2"><b>Session:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="s_start" placeholder="0000-0000" name="session" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" pattern="[0-9]{4}-[0-9]{4}" required="required" style="border-radius: 10px;">
                                                  
                                            <!-- <input class="col-sm-2" type="number" class="form-control" id="s_end" placeholder="End Year" name="session_end" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" required="required" style="border-radius: 5px; float: right; margin-right: 500px; text-align: center;"> -->
                                        </div><br>
                                        <label class="control-label col-sm-2"><b>Department:</b></label>
                                        <div class="col-sm-10">          
        									<select name="department" class="form-control" required="required" style="border-radius: 10px;">
        										<option>Select Department</option>
                    							<?php
                    								$sql_get_cat_id="SELECT * FROM `depts`";
                    								$result_get_cat_id=mysqli_query($ob->config(),$sql_get_cat_id);
                    							while($row_get_cat_id=mysqli_fetch_assoc($result_get_cat_id))
                    								{
                      							?>
                      							<option value="<?php echo $row_get_cat_id['dept_name']; ?>"><?php echo $row_get_cat_id['dept_name']; ?></option>
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
                                <div class="row">
                                    <table class="table table-bordered table-hover text-center" id="myTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Batch</th>
                                                <th>Program</th>
                                                <th>Session</th>
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
                                                <td style="vertical-align: middle; color: black;"><?php echo $row_all['class_batch'];?></td>
                                                <td style="vertical-align: middle; color: black;"><?php echo $row_all['class_name'];?></td>
                                                <td style="vertical-align: middle; color: black;"><?php echo $row_all['session'];?></td>
                                                <td style="vertical-align: middle; color: black;"><?php echo $row_all['dept'];?></td>
                                                <td style="vertical-align: middle;">
                                                <button class="btn btn-info update_data" data-toggle="modal" data-target="#up_class" id="update" data-id="<?php echo $row_all['id'];?>"><i class="fas fa-pen"></i></button>

                                                <button class="btn btn-danger del_data" data-toggle="modal" data-target="#del_class" id="del_btn" data-id="<?php echo $row_all['id'];?>"><i class="fas fa-trash"></i></button></td>
                                            </tr>
                                            <?php
                                            	}
                                            ?>
                                        </tbody>
                                    </table>
                                </div> <!--row-->
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

<script>
    $('.update_data').on('click',function(){
     // alert('hi');
      var id = $(this).attr('data-id');
      //alert(id);
      //console.log(id);
      $('#update_class').val(id);
      //alert(id);
      /*var id = this.value();
      alert(id);*/
    });
</script>

<script>
    $('.del_data').click(function(){
      //alert(id);
      var id = $(this).data('id');

      $('#delete_class').val(id);
      //alert(id);
      /*var id = this.value();
      alert(id);*/
    });
</script>

</body>

</html>
<!-- end document-->

<div id="up_class" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  style="border-radius: 20px;">
            <div class="modal-header">
                <h4 class="modal-title">Update Course</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" style="border-radius: 40px;">&times;</button>   
            </div>
            <div class="modal-body">
                <div class="modal-container container-fluid">
                    <form class="form-horizontal" method="post" action="add_classdb.php">
                        <div class="form-group">
                            <input type="hidden" name="update_class" id="update_class">
                            <label class="control-label col-sm-2"><b>Program:</b></label>
                            <div class="col-sm-10">          
                                <select name="program" class="form-control" required="required" style="border-radius: 10px;">
                                        <option>Select Program</option>
                                        <?php
                                            $sql_get_cat_id="SELECT * FROM `program`";
                                            $result_get_cat_id=mysqli_query($ob->config(),$sql_get_cat_id);
                                            while($row_get_cat_id=mysqli_fetch_assoc($result_get_cat_id))
                                                {
                                        ?>
                                            <option value="<?php echo $row_get_cat_id['prog_name']; ?>"><?php echo $row_get_cat_id['prog_name']; ?></option>
                                        <?php
                                                }
                                        ?>
                                </select>
                            </div><br>
                            <label class="control-label col-sm-2"><b>Batch:</b></label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="c_code" placeholder="AB-111" name="class_code" required="required" style="border-radius: 10px;"><br>
                            </div>
                            <label class="control-label col-sm-2"><b>Session:</b></label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="s_start" placeholder="0000-0000" name="session" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" pattern="[0-9]{4}-[0-9]{4}" required="required" style="border-radius: 10px;"><br>
                            </div>
                            <label class="control-label col-sm-2"><b>Department:</b></label>
                            <div class="col-sm-10">          
                                <select name="department" class="form-control" required="required" style="border-radius: 10px;">
                                    <option>Select Department</option>
                                    <?php
                                        $sql_get_cat_id="SELECT * FROM `depts`";
                                        $result_get_cat_id=mysqli_query($ob->config(),$sql_get_cat_id);
                                        while($row_get_cat_id=mysqli_fetch_assoc($result_get_cat_id))
                                            {
                                    ?>
                                    <option value="<?php echo $row_get_cat_id['dept_name']; ?>"><?php echo $row_get_cat_id['dept_name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div><br>
                            <div class="col-sm-12">
                                <button class="btn btn-rounded btn btn-primary" name="save_update" id="save_update" style="border-radius: 10px;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius: 10px;">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="del_class" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content"  style="border-radius: 20px;">
            <div class="modal-header">
                <h4 class="modal-title">Delete Course</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" style="border-radius: 40px;">&times;</button>   
            </div>
            <div class="modal-body">
                <div class="modal-container container-fluid">
                    <form class="form-horizontal" method="post" action="add_classdb.php">
                        <div class="form-group" style="text-align: center;">
                            <input type="hidden" name="delete_class" id="delete_class">
                            <div class="col-sm-12">
                                <p>Are you sure you want to delete?</p>
                            </div><br>
                            <div class="col-sm-12">
                                <button class="btn btn-rounded btn btn-danger" name="delete" style="border-radius: 10px;">YES</button>
                                <button class="btn btn-rounded btn btn-primary" name="delete" style="border-radius: 10px;" data-dismiss="modal">NO</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius: 10px;">Close</button>
            </div>
        </div>
    </div>
</div>