<?php 
//include_once('secure.php');
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
    <title>Time Table</title>

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
                        //$admin_id=$_SESSION['admin_id'];
                        $sql="SELECT day FROM `assign_time` WHERE day='Monday'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_assoc($result); 
                    ?>
                    <!-- <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;"> -->
                        <!-- <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span> -->
                        <?php
                        if(empty($row)){
                        echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px; display: none;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold; display:none">Day</span>';}
                        else{
                            echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;">
                            <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>';
                        }
                        ?>
                        <span><?php echo $row['day']; ?></span>
                    </div>
                    
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">

                        <?php
                        if(empty($row)){
                            echo
                        '<thead class="thead-dark" style="text-align: center; display:none;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        else{
                            echo
                        '<thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        ?>

                        <!-- <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Lecture</th>
                                <th>Class</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead> -->
                        <tbody style="text-align: center;">
                            <?php 
                                $sql="SELECT * FROM `assign_time` WHERE day='Monday'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <tr>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['tcourse_inst']; ?></td>
                                <td><?php echo $row['tcourse_name']; ?></td>
                                <td><?php echo $row['lec_time_from']; ?></td>
                                <td><?php echo $row['lec_time_to']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                </div>

                <div class="row"> 
                    <?php
                        //$admin_id=$_SESSION['admin_id'];
                        $sql="SELECT day FROM `assign_time` WHERE day='Tuesday'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_assoc($result);
                    ?>
                    <!-- <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;"> -->
                        <!-- <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span> -->
                        <?php
                        if(empty($row)){
                        echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px; display: none;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold; display:none">Day</span>';}
                        else{
                            echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;">
                            <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>';
                        }
                        ?>
                        <span><?php  echo $row['day']; ?></span>
                    </div>
                    
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">

                        <?php
                        if(empty($row)){
                            echo
                        '<thead class="thead-dark" style="text-align: center; display:none">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        else{
                            echo
                        '<thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        ?>

                        <!-- <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Lecture</th>
                                <th>Class</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead> -->
                        <tbody style="text-align: center;">
                            <?php 
                                $sql="SELECT * FROM `assign_time` WHERE day='Tuesday'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <tr>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['tcourse_inst']; ?></td>
                                <td><?php echo $row['tcourse_name']; ?></td>
                                <td><?php echo $row['lec_time_from']; ?></td>
                                <td><?php echo $row['lec_time_to']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                </div>

                <div class="row"> 
                    <?php
                        //$admin_id=$_SESSION['admin_id'];
                        $sql="SELECT day FROM `assign_time` WHERE day='Wednesday'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_assoc($result); 
                    ?>
                    <!-- <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;"> -->
                        <!-- <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span> -->
                        <?php
                        if(empty($row)){
                        echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px; display: none;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold; display:none">Day</span>';}
                        else{
                            echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;">
                            <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>';
                        }
                        ?>
                        <span><?php echo $row['day']; ?></span>
                    </div>
                    
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">

                        <?php
                        if(empty($row)){
                            echo
                        '<thead class="thead-dark" style="text-align: center; display:none">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        else{
                            echo
                        '<thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        ?>

                        <!-- <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Lecture</th>
                                <th>Class</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead> -->
                        <tbody style="text-align: center;">
                            <?php 
                                $sql="SELECT * FROM `assign_time` WHERE day='Wednesday'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <tr>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['tcourse_inst']; ?></td>
                                <td><?php echo $row['tcourse_name']; ?></td>
                                <td><?php echo $row['lec_time_from']; ?></td>
                                <td><?php echo $row['lec_time_to']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                </div>

                <div class="row"> 
                    <?php
                        //$admin_id=$_SESSION['admin_id'];
                        $sql="SELECT day FROM `assign_time` WHERE day='Thursday'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_assoc($result); 
                    ?>
                    <!-- <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;"> -->
                        <?php
                        if(empty($row)){
                        echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px; display: none;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold; display:none">Day</span>';}
                        else{
                            echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;">
                            <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>';
                        }
                        ?>
                        <span><?php echo $row['day']; ?></span>
                    </div>
                    
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">

                        <?php
                        if(empty($row)){
                            echo
                        '<thead class="thead-dark" style="text-align: center; display:none">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        else{
                            echo
                        '<thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        ?>

                        <!-- <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Lecture</th>
                                <th>Class</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead> -->
                        <tbody style="text-align: center;">
                            <?php 
                                $sql="SELECT * FROM `assign_time` WHERE day='Thursday'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <tr>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['tcourse_inst']; ?></td>
                                <td><?php echo $row['tcourse_name']; ?></td>
                                <td><?php echo $row['lec_time_from']; ?></td>
                                <td><?php echo $row['lec_time_to']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                </div>

                <div class="row"> 
                    <?php
                        //$admin_id=$_SESSION['admin_id'];
                        $sql="SELECT day FROM `assign_time` WHERE day='Friday'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_assoc($result); 
                    ?>
                    <!-- <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;"> -->
                        <!-- <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span> -->
                        <?php
                        if(empty($row)){
                        echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px; display: none;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold; display:none">Day</span>';}
                        else{
                            echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;">
                            <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>';
                        }
                        ?>
                        <span><?php echo $row['day']; ?></span>
                    </div>
                    
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">
                        <?php
                        if(empty($row)){
                            echo
                        '<thead class="thead-dark" style="text-align: center; display:none">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        else{
                            echo
                        '<thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        ?>
                        <tbody style="text-align: center;">
                            <?php 
                                $sql="SELECT * FROM `assign_time` WHERE day='Friday'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <tr>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['tcourse_inst']; ?></td>
                                <td><?php echo $row['tcourse_name']; ?></td>
                                <td><?php echo $row['lec_time_from']; ?></td>
                                <td><?php echo $row['lec_time_to']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                </div>

                <div class="row"> 
                    <?php
                        //$admin_id=$_SESSION['admin_id'];
                        $sql="SELECT day FROM `assign_time` WHERE day='Saturday'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_assoc($result); 
                    ?>
                    <!-- <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;"> -->
                        <!-- <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span> -->
                        <?php
                        if(empty($row)){
                        echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px; display: none;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold; display:none">Day</span>';}
                        else{
                            echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;">
                            <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>';
                        }
                        ?>
                        <span><?php echo $row['day']; ?></span>
                    </div>
                    
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">

                        <?php
                        if(empty($row)){
                            echo
                        '<thead class="thead-dark" style="text-align: center; display:none">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        else{
                            echo
                        '<thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        ?>

                        <!-- <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Lecture</th>
                                <th>Class</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead> -->
                        <tbody style="text-align: center;">
                            <?php 
                                $sql="SELECT * FROM `assign_time` WHERE day='Saturday'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <tr>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['tcourse_inst']; ?></td>
                                <td><?php echo $row['tcourse_name']; ?></td>
                                <td><?php echo $row['lec_time_from']; ?></td>
                                <td><?php echo $row['lec_time_to']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                </div>

                <div class="row"> 
                    <?php
                        //$admin_id=$_SESSION['admin_id'];
                        $sql="SELECT day FROM `assign_time` WHERE day='Sunday'";
                        $result=mysqli_query($ob->config(),$sql);
                        $row=mysqli_fetch_assoc($result); 
                    ?>
                    <!-- <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;"> -->
                        <!-- <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span> -->
                        <?php
                        if(empty($row)){
                        echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px; display: none;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold; display:none">Day</span>';}
                        else{
                            echo '<div style="border: 3px solid lightgrey; margin-left: 30px; font-family: sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; margin-top: 30px;">
                            <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>';
                        }
                        ?>
                        <span><?php echo $row['day']; ?></span>
                    </div>
                    
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">

                        <?php
                        if(empty($row)){
                            echo
                        '<thead class="thead-dark" style="text-align: center; display:none">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        else{
                            echo
                        '<thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Teacher</th>
                                <th>Lecture</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead>';
                        }
                        ?>

                        <!-- <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Lecture</th>
                                <th>Class</th>
                                <th>Time (from)</th>
                                <th>Time (to)</th>
                            </tr>
                        </thead> -->
                        <tbody style="text-align: center;">
                            <?php 
                                $sql="SELECT * FROM `assign_time` WHERE day='Sunday'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <tr>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['tcourse_inst']; ?></td>
                                <td><?php echo $row['tcourse_name']; ?></td>
                                <td><?php echo $row['lec_time_from']; ?></td>
                                <td><?php echo $row['lec_time_to']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody> 
                    </table>
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
