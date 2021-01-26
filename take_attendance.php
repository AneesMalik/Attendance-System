<?php 
include_once('inst_secure.php');
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
    <title>Take Attendance</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<?php

    $day = date("l");
    date_default_timezone_set("Asia/Karachi");
    //$date=date("d/m/Y");
    $date=date("Y/m/d");
    //echo $date;
    $t=time();
    $time=date("G:i:s",$t);
    //echo $time;

    $sql="SELECT lec,class FROM `attendance`";
    $result=mysqli_query($ob->config(),$sql);
    $row=mysqli_fetch_array($result);
    $lectures=$row['lec'];
    $class=$row['class'];

    $check = "SELECT * FROM attendance WHERE (a_date='$date' AND lec = '$lectures') AND class = '$class' ";
    //$check = "SELECT * FROM attendance WHERE a_date='$date'";
    $verify = mysqli_query($ob->config(),$check);
    if(mysqli_num_rows($verify)>0){

            echo"<script type='text/javascript'>
                alert('Data already exists');
                history.back();
            </script>";

    }
    else{

?>

<body class="animsition" onload="timeout()">
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

            <div class="container" style="margin-top: 150px;" id="hide">
                <?php
                    $day = date("l");
                    date_default_timezone_set("Asia/Karachi");
                    $date=date("d/m/Y");
                    //echo $date;
                    $t=time();
                    $time=date("G:i:s",$t);
                    //echo $time;
                ?>

                <!-- <div class="row">
                    <div style="border: 3px solid grey; margin-left: 30px; margin-bottom: 20px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; color: black;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Time Remaining</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="txt" style="color: black;">TIME</span>
                    </div>
                </div> -->

                    <?php

                        //$sql_lec="SELECT * FROM `assign_time` WHERE '$time' BETWEEN lec_time_from AND lec_time_to AND day = '$day'";
                        $sql_lec="SELECT * FROM `assign_time` WHERE '$time' BETWEEN lec_time_from AND lec_time_to AND day = '$day'";
                        //echo $sql;
                        $result_lec=mysqli_query($ob->config(),$sql_lec);
                        while ($row_lec=mysqli_fetch_assoc($result_lec)) 
                        {
                            
                            $tcourse_name = $row_lec['tcourse_name'];
                            $batch = $row_lec['tclass_batch'];
                    ?>
                
                <div class="row">
                    <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Lecture</span>
                            <!-- <?php
                                //$day = date("l");
                            ?> -->
                        <span style="color: black;"><?php echo $row_lec['tcourse_name']; ?></span>
                    </div>
                    <div style="border: 3px solid lightgrey; margin-left: 50px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Class</span>

                        <span style="color: black;"><?php echo $row_lec['tclass_batch']; ?></span>
                    </div>
                    <div style="border: 3px solid lightgrey; margin-left: 50px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Semester</span>

                        <?php
                            $semester = '';
                            $check = "SELECT course_name,course_semester FROM course";
                            $verify = mysqli_query($ob->config(),$check);
                            while($row_check = mysqli_fetch_assoc($verify))
                            {
                                $ac_course = $row_check['course_name'];
                        ?>

                        <span style="color: black;"><?php if($ac_course == $tcourse_name){ echo $row_check['course_semester'];} ?></span>

                        <?php
                            if($ac_course == $tcourse_name){
                                $semester =  $row_check['course_semester'];
                                }
                            }

                        ?>

                    </div>
                </div>
                    <?php

                        //}

                    ?>

                    <?php

                        // $sqlc="SELECT COUNT(std_name) AS total FROM `student`";
                        // $resultc=mysqli_query($ob->config(),$sqlc);
                        // $rowc=mysqli_fetch_assoc($resultc);

                        // $count = $rowc['total'];
                        //echo $count;

                    ?>
                <div class="row">
                    <p style="margin-left: 35px; margin-top: 10px; margin-bottom: 10px; color: black;"><b>Note</b><b style="color: red;">*</b>: All students will be marked as present by default. You can mark student absent which will be absent in class.</p>
                </div>

                <div class="row">
                    <div style="border: 3px solid grey; margin-left: 30px; margin-bottom: 20px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px; color: black;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Time Remaining</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="txt" style="color: black;">TIME</span>
                    </div>
                </div>

                <div class="row">
                    <form style="width: 980px;" id="insert_data" action="confirm.php" method="post">
                        <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 10px 30px 0 30px;">
                            <thead class="thead-dark" style="text-align: center;">
                                <tr>
                                    <th style="text-align: center;">Roll #</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Present</th>
                                    <th style="text-align: center;">Absent</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">

                                    <?php

                                        $sqlc="SELECT COUNT(std_name) AS total FROM `student` WHERE std_batch='$batch'";
                                        $resultc=mysqli_query($ob->config(),$sqlc);
                                        $rowc=mysqli_fetch_assoc($resultc);

                                    ?>

                                    <input type="hidden" name="count" value="<?php echo $rowc['total']; ?>">
                                    <input type="hidden" name="course" value="<?php echo $row_lec['tcourse_name']; ?>">
                                    <input type="hidden" name="batch" value="<?php echo $row_lec['tclass_batch']; ?>">
                                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">

                                    <?php
                                        $sql="SELECT * FROM `student` WHERE std_batch='$batch'";
                                        $result=mysqli_query($ob->config(),$sql);
                                        while($row=mysqli_fetch_assoc($result))
                                        { 
                                    ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo $row['roll_no']; ?>
                                        <input type="hidden" name="roll_no[]" value="<?php echo $row['roll_no']; ?>">
                                    </td>
                                    <td style="vertical-align: middle;"><?php echo $row['std_name']; ?>
                                        <input type="hidden" name="std_name[]" value="<?php echo $row['std_name']; ?>">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <input type="radio" name="attendance_status[]<?php echo $row["std_id"]; ?>" value="Present" checked />
                                        <!-- <input type="checkbox" name="attendance" id="attendance" checked data-toggle="toggle" data-on="Present" data-off="Absent" data-onstyle="success" data-offstyle="danger"> -->
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <input type="radio" name="attendance_status[]<?php echo $row["std_id"]; ?>" value="Absent" />
                                        
                                    </td>
                                </tr>
                                    <?php
                                        }
                                    ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <button class="btn btn-primary" name="insert" id="action" onclick="myFunction()" style="margin-top: 30px; margin-left: auto; border-radius: 10px;">Submit</button>
                        </div>
                    </form>
                    <?php
                        }
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
<?php

}

?>

</html>

<script>
    
    var timeLeft = 1*60;

</script>

<script>

    function timeout()
    {
        var minute = "0"+Math.floor(timeLeft/60);
        var second = timeLeft%60;
        if(second<10){
            second="0"+second;
        }
        //var sec = checktime(second);

        if (timeLeft<=0) 
        {
            clearTimeout(tm);
            document.getElementById('insert_data').submit();
        }
        else
        {
            document.getElementById('txt').innerHTML =minute + " : " + second;
        }
        timeLeft--;
        var tm = setTimeout(function(){timeout()}, 1000);
    }

    // function checktime(msg)
    // {
    //     if(msg<10)
    //     {
    //         msg="0"+msg;
    //     }
    //     //return msg;
    // }

</script>

<!-- <script>
    
    $(document).ready(function(){

        var x = document.getElementById('hide');
        x.style.display = "none";

    });

</script> -->
