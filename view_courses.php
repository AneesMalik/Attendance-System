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
    <title>Courses Details</title>

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
            <style type="text/css">
                td{
                    vertical-align: middle;
                }
            </style>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="content">
                        <div class="page-inner">
                            <div class="page-header">
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Search Course Details&nbsp; <i class="fas fa-info-circle"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <label class="control-label col-sm-2"><b>Search:</b></label>
                                <div class="col-sm-12">          
                                    <input type="text" class="form-control" id="attend" placeholder="Search" name="attend_details" style="border-radius: 10px;">
                                </div><br>
                                <!-- <form class="form-horizontal" method="post" action="">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"><b>Search:</b></label>
                                        <div class="col-sm-10"> 
                                        <input type="text" class="form-control" id="name" placeholder="Search Course" name="search" style="border-radius: 10px;">
                                        </div><br>
                                        <div class="col-sm-12">
                                        <button class="btn btn-rounded btn btn-primary" name="save" style="border-radius: 10px;">Search</button>
                                        </div>
                                    </div>
                                </form><br> -->
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center" id="myTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th style="vertical-align: middle;">Course</th>
                                                    <th style="vertical-align: middle;">Code</th>
                                                    <th style="vertical-align: middle;">Credit hours</th>
                                                    <th style="vertical-align: middle;">Program</th>
                                                    <th style="vertical-align: middle;">Semester</th>
                                                    <!-- <th style="vertical-align: middle;">Department</th> -->
                                                    <th style="vertical-align: middle;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if(isset($_POST['save'])){
                                                    $search=$_POST['search'];

                                                    $sql_all = "SELECT * FROM `course` WHERE course_name='$search' OR course_code='$search' OR course_program='$search' OR course_dept='$search'";
                                                }
                                                else{
                                                    $sql_all = "SELECT * FROM `course`";
                                                }
                                                    
                                                    $result_all=mysqli_query($ob->config(),$sql_all);
                                                    while($row_all=mysqli_fetch_assoc($result_all))
                                                    {
                                                        // echo $row_all['course_id'];
                                                        //exit();
                                                ?>

                                                <tr>
                                                    <td  style="vertical-align: middle; color: black"><?php echo $row_all['course_name'];?></td>
                                                    <td  style="vertical-align: middle; color: black"><?php echo $row_all['course_code'];?></td>
                                                    <td  style="vertical-align: middle; color: black"><?php echo $row_all['credit_hours'];?></td>
                                                    <td  style="vertical-align: middle; color: black"><?php echo $row_all['course_program'];?></td>
                                                    <td  style="vertical-align: middle; color: black"><?php echo $row_all['course_semester'];?></td>
                                                    <!-- <td  style="vertical-align: middle; color: black"><?php echo $row_all['course_dept'];?></td> -->

                                                    <td  style="vertical-align: middle;"><button class="btn btn-info update_data" data-toggle="modal" data-target="#up_course" id="update" data-id="<?php echo $row_all['course_id'];?>"><i class="fas fa-pen"></i></button>

                                                    <button class="btn btn-danger del_data" data-toggle="modal" data-target="#del_course" id="del_btn" data-id="<?php echo $row_all['course_id'];?>"><i class="fas fa-trash"></i></button></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <script type="text/javascript"></script>

<script type="text/javascript">
    $('.update_data').on('click',function(){
     // alert('hi');
      var id = $(this).attr('data-id');
      alert(id);
      //console.log(id);
      $('#update_course').val(id);
      //alert(id);
      /*var id = this.value();
      alert(id);*/
    });
</script>

<script type="text/javascript">
    $('.del_data').click(function(){
      //alert(id);
      var id = $(this).data('id');
      $('#delete_course').val(id);
      //alert(id);
      /*var id = this.value();
      alert(id);*/
    });
  </script>

  <script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"search_course.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#myTable').html(data);
                }
            });
        }

        $('#attend').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>


</body>

</html>
<!-- end document-->

<div id="up_course" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  style="border-radius: 20px;">
            <div class="modal-header">
                <h4 class="modal-title">Update Course</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" style="border-radius: 40px;">&times;</button>   
            </div>
            <div class="modal-body">
                <div class="modal-container container-fluid">
                    <form class="form-horizontal" method="post" action="add_coursedb.php">
                        <div class="form-group">
                            <input type="hidden" name="update_course" id="update_course">
                            <label class="control-label col-sm-4" style="padding-left: 15px;"><b>Course name:</b></label>
                            <div class="col-sm-12"> 
                                <input type="text" class="form-control" id="c_name" placeholder="Enter Course" name="course_name" style="border-radius: 10px;">
                            </div><br>
                            <label class="control-label col-sm-4"><b>Course Code:</b></label>
                            <div class="col-sm-12">          
                                <input type="text" class="form-control" pattern="[A-Z]{3}-[0-9]{3})" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" id="corse_code" placeholder="ABC-123" name="course_code" required="required" style="border-radius: 10px;"><br>
                            </div>
                            <label class="control-label col-sm-4"><b>Credit hours:</b></label>
                            <div class="col-sm-12">          
                                <input type="text" class="form-control" pattern="[0-9]{1}[(][0-9]{1}-[0-9]{1}[)]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" id="crdt_hours" placeholder="3(2-1)" name="credit_hours" required="required" style="border-radius: 10px;"><br>
                            </div>
                            <label class="control-label col-sm-2"><b>Semester:</b></label>
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
                                        </div>
                            <label class="control-label col-sm-4"><b>Program:</b></label>
                            <div class="col-sm-12">          
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
                                        
                            <label class="control-label col-sm-4"><b>Department:</b></label>
                            <div class="col-sm-12">          
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
                                <button class="btn btn-rounded btn btn-primary" name="save_update" style="border-radius: 10px;">Update</button>
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

<div id="del_course" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content"  style="border-radius: 20px;">
            <div class="modal-header">
                <h4 class="modal-title">Delete Course</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" style="border-radius: 40px;">&times;</button>   
            </div>
            <div class="modal-body">
                <div class="modal-container container-fluid">
                    <form class="form-horizontal" method="post" action="add_coursedb.php">
                        <div class="form-group" style="text-align: center;">
                            <input type="hidden" name="delete_course" id="delete_course">
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