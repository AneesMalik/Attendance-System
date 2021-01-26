<?php 
include_once('std_secure.php');
include_once('host.php');
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
    <title>View Attendance</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

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
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper" style="background-color: transparent;">
        
        <!-- MENU SIDEBAR-->
        <?php
            include_once 'sidebar.php';
        ?>
        <!-- END MENU SIDEBAR--> 

        <!-- PAGE CONTAINER-->
        <div class="page-container2" style="background-color: transparent;">
            <!-- HEADER DESKTOP-->

            <?php
            include_once 'header.php';
            ?>
            
            <!-- END HEADER DESKTOP-->

            

            <div class="container" style="margin-top: 80px;">

                <div class="row"> 
                    <?php
                        $std_id=$_SESSION['sec_id'];
                        $std_name = $_SESSION['sec_name'];
                        $sql="SELECT * FROM `attendance` WHERE std_name='$std_name'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_array($result);
                        $lec=$row['lec'];
                        //$att_status=$row['status'];

                    ?>
                    <div class="page-header">
                        <h4 class="page-title" style="font-weight: 800; font-size: 20px; padding-left: 20px; padding-top: 30px;"><?php echo $row['std_name']; ?> Attendance&nbsp; <i class="fas fa-info-circle"></i></h4>
                    </div>
                    <div class="col-md-12" style="padding-top: 30px;">          
                        <input type="text" class="form-control" id="attend" placeholder="Search" name="attend_details" style="border-radius: 10px;">
                    </div><br>

                    <!-- TASK PROGRESS-->
                    <div class="task-progress">
                        <h3 class="title-3">total attendance</h3>
                        <div class="au-skill-container">
                        <?php

	                        $sqlp="SELECT COUNT(status) AS present FROM `attendance` WHERE std_name='$std_name' AND status='Present' AND lec='Artificial Intelligence'";
	                        $resultp=mysqli_query($ob->config(),$sqlp);
	                        $rowp=mysqli_fetch_array($resultp);
	                        $present = $rowp['present'];
	                        //echo $present;

	                        $sqlt="SELECT COUNT(status) AS total FROM `attendance` WHERE std_name='$std_name' AND lec='Artificial Intelligence'";
	                        $resultt=mysqli_query($ob->config(),$sqlt);
	                        $rowt=mysqli_fetch_array($resultt);
	                        $total = $rowt['total'];
	                        //echo $total;
	                        $percent=($present/$total)*100;
	                        //echo $percent;
                        ?>
                            <div class="au-progress">
                                <span class="au-progress__title">Artificial Intelligence</span>
                                <div class="au-progress__bar">
                                    <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="<?php echo $percent; ?>">
                                        <span class="au-progress__value js-value"></span>
                                    </div>
                            	</div>
                        	</div>

                        <?php

	                        $sqlp="SELECT COUNT(status) AS present FROM `attendance` WHERE std_name='$std_name' AND status='Present' AND lec='Data Mining'";
	                        $resultp=mysqli_query($ob->config(),$sqlp);
	                        $rowp=mysqli_fetch_array($resultp);
	                        $present = $rowp['present'];
	                        //echo $present;

	                        $sqlt="SELECT COUNT(status) AS total FROM `attendance` WHERE std_name='$std_name' AND lec='Data Mining'";
	                        $resultt=mysqli_query($ob->config(),$sqlt);
	                        $rowt=mysqli_fetch_array($resultt);
	                        $total = $rowt['total'];
	                        //echo $total;
	                        $percent=($present/$total)*100;
	                        //echo $percent;
                        ?>
	                        <div class="au-progress">
	                            <span class="au-progress__title">Data Mining</span>
	                            <div class="au-progress__bar">
	                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="<?php echo $percent; ?>">
	                                    <span class="au-progress__value js-value"></span>
	                                </div>
	                            </div>
	                        </div>
                        </div>
                    </div>
                    <!-- END TASK PROGRESS-->

                </div>
                    
                    <table class="table table-bordered table-hover text-center" id="myTable" style="margin: 30px 0 0 0">

                        <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Course</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>

                        <tbody style="text-align: center;">
                            <?php 
                                $sqli="SELECT * FROM `attendance`,`assign_course` WHERE c_name='$lec' AND std_name='$std_name' ORDER BY a_date DESC";
                                //echo $sqli;
                                $resulti=mysqli_query($ob->config(),$sqli);
                                while($rowi=mysqli_fetch_array($resulti))
                                { 
                            ?>
                            <tr>
                                <td style="color: black;"><?php echo $rowi['a_date']; ?></td>
                                <td style="color: black;"><?php echo $rowi['status']; ?></td>
                                <td style="color: black;"><?php echo $rowi['lec']; ?></td>
                                <td style="color: black;"><?php echo $rowi['c_inst']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                    <?php
                       // }
                    ?>
                </div>

            </div>
            
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
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->

<script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"search_atten.php",
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
            //alert(search);
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