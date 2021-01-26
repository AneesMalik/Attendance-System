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
    <title>Assigned Class Details</title>

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
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Search Assigned Classes&nbsp; <i class="fas fa-book"></i></h4>
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
                                        <input type="text" class="form-control" id="details" placeholder="Lecture Details" name="lec-details" style="border-radius: 10px;">
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
                                                    <th style="vertical-align: middle;">Course</th>
                                                    <th style="vertical-align: middle;">Batch</th>
                                                    <th style="vertical-align: middle;">Semester</th>
                                                    <th style="vertical-align: middle;">Program</th>
                                                    <th style="vertical-align: middle;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql_all = "SELECT * FROM `assign_class`";
                                                    $result_all=mysqli_query($ob->config(),$sql_all);
                                                    while($row_all=mysqli_fetch_assoc($result_all))
                                                    {
                                                ?>
                                                <tr>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['ac_course'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['ac_batch'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['ac_sem'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['ac_prog'];?></td>
                                                    <td style="vertical-align: middle;">
                                                        <button class="btn btn-info update_data" data-toggle="modal" data-target="#up_dept" id="update" data-id="<?php echo $row_all['room_id'];?>"><i class="fas fa-pen"></i></button>

                                                        <button class="btn btn-danger del_data" data-toggle="modal" data-target="#del_course" id="del_btn" data-id="<?php echo $row_all['room_id'];?>"><i class="fas fa-trash"></i></button>
                                                    </td>
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

<script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"search_aclass.php",
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
