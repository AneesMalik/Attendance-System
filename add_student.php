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
    <title>Add Students</title>

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

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="content">
                        <div class="page-inner">
                            <div class="page-header">
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Add Student&nbsp; <i class="fas fa-user-graduate"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <form class="form-horizontal" method="post" action="add_studentdb.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"><b>Roll # :</b></label>
                                        <div class="col-sm-10">          
                                            <input type="number" class="form-control" id="roll#" placeholder="Roll number" name="roll_no" required="required" style="border-radius: 10px;">
                                        </div><br>

                                        <label class="control-label col-sm-2"><b>Registration:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="reg#" placeholder="Registration #" name="reg_no" required="required" style="border-radius: 10px;">
                                        </div><br>

                                        <label class="control-label col-sm-2"><b>Name:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="std_name" placeholder="Student Name" name="std_name" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>CNIC:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="cnic" name="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}"  placeholder="xxxxx-xxxxxxx-x" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Father:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="f_name" placeholder="Father Name" name="f_name" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Date of Birth:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="date" class="form-control" id="dob" name="birth_date" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Email:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="email" class="form-control" id="email" name="std_email" required="required" placeholder="xxxxxx@email.com" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Cell # :</b></label>
                                        <div class="col-sm-10">          
                                            <input type="tel" class="form-control" id="phone#" name="cell_no" pattern="[+][0-9]{2}-[0-9]{3}-[0-9]{7}" placeholder="+92-321-1234567" maxlength="15" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Address:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="address" placeholder="Current Address" name="address" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Program:</b></label>
                                        <div class="col-sm-10"> 
                                            <select name="program" id="prog" class="form-control" required="required" style="border-radius: 10px;">
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
                                            </select><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Class_batch:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="class" id="batch" class="form-control" required="required" style="border-radius: 10px;">
                                                <option>Select Class</option>
                                                <?php
                                                    $sql_get_cat_id="SELECT * FROM `class`";
                                                    $result_get_cat_id=mysqli_query($ob->config(),$sql_get_cat_id);
                                                while($row_get_cat_id=mysqli_fetch_assoc($result_get_cat_id))
                                                    {
                                                ?>
                                                <option value="<?php echo $row_get_cat_id['code']; ?>"><?php echo $row_get_cat_id['class_batch']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Session:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="s_start" placeholder="0000-0000" name="session" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" pattern="[0-9]{4}-[0-9]{4}" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <!-- <label class="control-label col-sm-2"><b>Session:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="s_start" placeholder="0000-0000" name="session" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" pattern="[0-9]{4}-[0-9]{4}" required="required" style="border-radius: 10px;">
                                        </div><br> -->

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
                                            </select><br>
                                        </div>

                                        <div class="col-sm-10">
                                            <!-- <img src="user_image/user.png" alt="avatar" class="avatar col-sm-6" id="profile_image" style="width: 100px; height: 110px; border-radius: 10px;border: 2px solid grey; padding: 0 0 0 0; float: right;margin-right: 350px;"> -->        
                                            <input type="file" class="form-control col-sm-4" id="profile_photo" name="profile_img" style="border-radius: 10px;"><br>
                                        </div>   

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

<!-- <script type="text/javascript">
    var program = '';
    var batch = '';
    var sesion = '';
</script>

<script>
    $('#prog').change(function(){
        program = $('#prog').val();

        alert(program);

        // if (program!='') {
        //     $.ajax({
        //         method: 'POST',
        //         url: 'add_studentdb.php',
        //         data: {program:program},
        //         success: function(data)
        //         {
        //             alert(data);
        //             //$('#match').html(data);
        //         }
        //     });
        // }
        // else{
        //     $('#match').html('');
        // }
    });
</script> -->

<!-- <script>
    $('#batch').change(function(){
        batch = $(this).val();

        alert(batch);

        // if (program!='') {
        //     $.ajax({
        //         method: 'POST',
        //         url: 'add_studentdb.php',
        //         data: {program:program},
        //         success: function(data)
        //         {
        //             alert(data);
        //             //$('#match').html(data);
        //         }
        //     });
        // }
        // else{
        //     $('#match').html('');
        // }
    });
</script> -->

<script>  
 $(document).ready(function(){  
      $('#s_start').change(function(){  
           var sesion = $(this).val();
            //alert(semester);
           $.ajax({  
                url:"add_studentdb.php",  
                method:"POST",  
                data:{program2:program},  
                success:function(data){
                    //alert(data);  
                    $('#course').html(data);  
                }  
           });  
      });  
 });  
 </script> 

    <!--script>
    
        $(":input").inputmask();

    </script-->

    <!--script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function(e) {
                    $('#profile_image').attr('src', e.target.result);
                }
    
            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_photo").change(function() {
            readURL(this);
        });

    </script-->

    <!--script type="text/javascript">
        
        function previewImage(event){

            var reader = new FileReader();
            var imageField = document.getElementById("profile_image");

            reader.onload = function(){

                if(reader.readystate == 2){

                    imageField.src = reader.result;
                }
            } 

            reader.readAsDataURL(event.target.files[0]);
        }

    </script-->


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