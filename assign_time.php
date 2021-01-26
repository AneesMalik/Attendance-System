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
    <title>Timetable</title>

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
    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
}
    </style>
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

            <?php

                // $connect = mysqli_connect("localhost", "root", "", "digital_attendance_system");
                // function fill_brand($connect)  
                // {  
                //     // $semester = $_POST['semester2'];
                //     // $program = $_POST['program2'];
                //     $output = '';  
                //     $sql = "SELECT * FROM `course` ";  
                //     $result = mysqli_query($connect, $sql);  
                //     while($row = mysqli_fetch_array($result))  
                //     {  
                //            $output .= '<option value="'.$row["course_id"].'">'.$row["course_name"].'</option>';  
                //     }  
                //     return $output;  
                // }  

            ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="content">
                        <div class="page-inner">
                            <div class="page-header">
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Set Timetable&nbsp; <i class="fas fa-clock"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <form class="form-horizontal" method="post" action="assign_timedb.php" enctype="multipart/form-data">
                                    <div class="form-group">

                                        <label class="control-label col-sm-2"><b>Department:</b></label>
                                        <div class="col-sm-10">           
                                            <select name="dept" id="dept" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Department</option>
                                                <?php
                                                    $sql="SELECT * FROM `depts`";
                                                    $result=mysqli_query($ob->config(),$sql);
                                                while($row=mysqli_fetch_assoc($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['dept_name']; ?>"><?php echo $row['dept_name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                
                                            </select>
                                            <div id="verify" style="padding-left: 10px;"></div><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Program:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="prog" id="prog" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Program</option>
                                            </select>
                                            <div id="match" style="padding-left: 10px;"></div><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Instructor:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="inst_name" id="inst" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Instructor</option>
                                            </select><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Course:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="course_name" id="corse" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Course</option>
                                            </select><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Class:</b></label>
                                        <div class="col-sm-10">    
                                            <select name="class_batch" id="batch" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Class</option>
                                            </select><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Room #:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="room" id="room_no" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Room</option>
                                            </select><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Day:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="day" id="day" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Day</option>
                                                <?php
                                                    $sql_get_cat_id="SELECT * FROM `days`";
                                                    $result_get_cat_id=mysqli_query($ob->config(),$sql_get_cat_id);
                                                while($row_get_cat_id=mysqli_fetch_assoc($result_get_cat_id))
                                                    {
                                                ?>
                                                <option value="<?php echo $row_get_cat_id['day_name']; ?>"><?php echo $row_get_cat_id['day_name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Time:</b></label>
                                        <div class="col-sm-10">          
                                            <input class="col-sm-2" type="time" class="form-control" id="time_from" name="time_from" required="required" style="border-radius: 10px; text-align: center;">

                                            <label class="control-label col-sm-1" style="margin-left: 10px;"><b>to</b></label>

                                            <input type="time" class="col-sm-2" class="form-control" id="time_to" name="time_to" required="required" style="border-radius: 10px; text-align: center;">
                                        </div><br>

                                        <div class="col-sm-12">
                                            <button class="btn btn-rounded btn btn-primary" name="save" style="border-radius: 10px;">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
    <script src="vendor/select2/select2.min.js"></script>
    

    <!-- Main JS-->
    <script src="js/main.js"></script>
    

</body>

</html>
<!-- end document-->
<script type="text/javascript">
    var depts = '';
    var program = '';
    var instructor = '';
    var clas = '';
</script>

<script>
    $('#dept').change(function(){
        depts = $('#dept').val();
        //program = $(this).find(':selected')[0].id;

        //alert(depts);
        $.ajax({
            method: 'POST',
            url: 'assign_timedb.php',
            data: {depts:depts},
            success: function(data)
            {
                //alert(data);
                $('#verify').html(data);
            }
        });
        
    });
</script>

<script>
    $('#dept').change(function(){
        depts = $('#dept').val();
        //alert(semester);
        $.ajax({
            method: 'POST',
            url: 'assign_timedb.php',
            data: {depts2:depts},
            success: function(data)
            {
                //alert(data);
                $('#prog').html(data);
            }
        });
    });
</script>

 <script>  
 $(document).ready(function(){  
      $('#prog').change(function(){  
           program = $(this).val();
            //alert(semester);
           $.ajax({  
                url:"assign_timedb.php",  
                method:"POST",  
                data:{program:program},  
                success:function(data){
                    //alert(data);  
                    $('#match').html(data);  
                }  
           });  
      });  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#dept').change(function(){  
           depts = $(this).val();
            //alert(semester);
           $.ajax({  
                url:"assign_timedb.php",  
                method:"POST",  
                data:{depts3:depts},  
                success:function(data){
                    //alert(data);  
                    $('#inst').html(data);  
                }  
           });  
      });  
 });  
 </script> 

 <script>  
 $(document).ready(function(){  
      $('#inst').change(function(){  
           instructor = $(this).val();
            //alert(semester);
           $.ajax({  
                url:"assign_timedb.php",  
                method:"POST",  
                data:{instructor2:instructor,
                    program2:program},  
                success:function(data){
                    //alert(data);  
                    $('#corse').html(data);  
                }  
           });  
      });  
 });  
 </script> 

 <script>  
    $(document).ready(function(){  
        $('#corse').change(function(){  
            corse = $('#corse').val();
            //alert(corse);
            $.ajax({  
                url:"assign_timedb.php",  
                method:"POST",  
                data:{corse:corse},  
                success:function(data){
                    //alert(data);  
                $('#batch').html(data);  
                }  
            });  
        });  
    });  
</script> 

 <script>
    $('#batch').change(function(){
        clas = $('#batch').val();
        //program = $(this).find(':selected')[0].id;
        //alert(clas);
            $.ajax({
                method: 'POST',
                url: 'assign_timedb.php',
                data: {clas:clas},
                success: function(data)
                {
                    //alert(data);
                    $('#room_no').html(data);
                }
            });

    });
</script> 

 <!-- <script>  
 $(document).ready(function(){  
      $('#course').change(function(){  
           var course = $('#course').val(); 
           alert(course); 
           // $.ajax({  
           //      url:"assign_timedb.php",  
           //      method:"POST",  
           //      data:{semester3:semester,
           //          program3:program,
           //          course3:course},  
           //      success:function(data){  
           //           $('#inst').html(data);  
           //      }  
           // });  
      });  
 });  
 </script>   -->

