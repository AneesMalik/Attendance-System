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
    <title>Instructor Details</title>

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
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Search Teachers&nbsp; <i class="fas fa-info-circle"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <label class="control-label col-sm-2"><b>Search:</b></label>
                                <div class="col-sm-12">          
                                    <input type="text" class="form-control" id="attend" placeholder="Search" name="attend_details" style="border-radius: 10px;">
                                </div><br>
                                <!-- <form class="form-horizontal" method="post" action="#">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"><b>Search:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="name" placeholder="Teacher Details" name="roll_no" style="border-radius: 10px;">
                                        </div><br>
                                        <label class="control-label col-sm-2"><b>Class:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="c_code" placeholder="Enter Class_code" name="class_code" style="border-radius: 10px;"><br>
                                        </div>
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
                                                    <th style="vertical-align: middle;">Instructor photo</th>
                                                    <th style="vertical-align: middle;">Name</th>
                                                    <th style="vertical-align: middle;">CNIC</th>
                                                    <th style="vertical-align: middle;">Email</th>
                                                    <th style="vertical-align: middle;">Phone#</th>
                                                    <th style="vertical-align: middle;">Department</th>
                                                    <th style="vertical-align: middle;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql_all = "SELECT * FROM `instructor`";
                                                    $result_all=mysqli_query($ob->config(),$sql_all);
                                                    while($row_all=mysqli_fetch_assoc($result_all))
                                                    {
                                                ?>
                                                <tr>
                                                    <td style="width: 150px; height: 100px; vertical-align: middle;"><?php echo "<img src=' user_image/instructor_image/".$row_all['inst_photo']."' >"; ?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['inst_name'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['inst_cnic'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['inst_email'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['inst_phone'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['inst_dept'];?></td>

                                                    <td style="vertical-align: middle;">
                                                    <button style="margin-bottom: 10px" class="btn btn-info update_data" data-toggle="modal" data-target="#up_inst" id="update" data-id="<?php echo $row_all['inst_id'];?>"><i class="fas fa-pen"></i></button><br>

                                                    <button class="btn btn-danger del_data" data-toggle="modal" data-target="#del_inst" id="del_btn" data-id="<?php echo $row_all['inst_id'];?>"><i class="fas fa-trash"></i></button></td>
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

<script type="text/javascript">
    $('.update_data').on('click',function(){
     // alert('hi');
      var id = $(this).attr('data-id');
      alert(id);
      //console.log(id);
      $('#update_inst').val(id);
      //alert(id);
      /*var id = this.value();
      alert(id);*/
    });
</script>

<script type="text/javascript">
    $('.del_data').click(function(){
      //alert(id);
      var id = $(this).data('id');
      $('#delete_inst').val(id);
      alert(id);
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
                url:"search_instructor.php",
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


<div id="up_inst" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  style="border-radius: 20px;">
            <div class="modal-header">
                <h4 class="modal-title">Update Course</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" style="border-radius: 40px;">&times;</button>   
            </div>
            <div class="modal-body">
                <div class="modal-container container-fluid">
                    <form class="form-horizontal" method="post" action="add_instructordb.php">
                        <div class="form-group">
                            <input type="hidden" name="update_inst" id="update_inst">
                            <label class="control-label col-sm-2"><b>Name:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="inst_name" placeholder="Instructor Name" name="inst_name" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>CNIC:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="text" class="form-control" id="cnic" name="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}"  placeholder="xxxxx-xxxxxxx-x" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required="required" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Email:</b></label>
                                        <div class="col-sm-10">          
                                            <input type="email" class="form-control" id="email" name="inst_email" required="required" placeholder="xxxxxx@email.com" style="border-radius: 10px;"><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Cell # :</b></label>
                                        <div class="col-sm-10">          
                                            <input type="tel" class="form-control" id="phone#" name="cell_no" pattern="[+][0-9]{2}-[0-9]{3}-[0-9]{7}" placeholder="+92-321-1234567" maxlength="15" required="required" style="border-radius: 10px;"><br>
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
                                            </select><br>
                                        </div>

                                        <div class="col-sm-10">
                                            <img src="user_image/user.png" alt="avatar" class="avatar col-sm-6" id="profile_image" style="width: 100px; height: 110px; border-radius: 10px;border: 2px solid grey; padding: 0 0 0 0; float: right;margin-right: 350px;">        
                                            <input type="file" class="form-control col-sm-4" id="profile_photo" name="profile_img" style="border-radius: 10px;"><br>
                                        </div>   
                                        
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

<div id="del_inst" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content"  style="border-radius: 20px;">
            <div class="modal-header">
                <h4 class="modal-title">Delete Course</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" style="border-radius: 40px;">&times;</button>   
            </div>
            <div class="modal-body">
                <div class="modal-container container-fluid">
                    <form class="form-horizontal" method="post" action="add_instructordb.php">
                        <div class="form-group" style="text-align: center;">
                            <input type="hidden" name="delete_inst" id="delete_inst">
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