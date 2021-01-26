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
    <title>Attendance</title>

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

<body class="animsition" onload="startTime()">
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

            <div class="container" style="margin-top: 150px;">
                <?php
                    $day = date("l");
                    date_default_timezone_set("Asia/Karachi");
                    $date=date("d/m/Y");
                    //echo $date;
                    $t=time();
                    $time=date("G:i:s",$t);
                    //echo $time;

                    
                    $date=date("Y/m/d");
                    $sql="SELECT lec,class FROM `attendance`";
                    $result=mysqli_query($ob->config(),$sql);
                    $row=mysqli_fetch_array($result);
                    $lectures=$row['lec'];
                    $class=$row['class'];

                    $check = "SELECT * FROM attendance WHERE (a_date='$date' AND lec = '$lectures') AND class = '$class' ";
                    //$check = "SELECT * FROM attendance WHERE a_date='$date'";
                    $verify = mysqli_query($ob->config(),$check);

                            
                ?>
                <div id="txt"></div>
                <div class="row">
                    <div style="border: 3px solid lightgrey; margin-left: 30px; font-family: 'poppins' sans-serif; padding: 0 5px 0 5px; font-size: 20px; border-radius: 10px;">
                        <span style="background-color: #212529; color: white; border-radius: 7px; padding: 0 5px 0 5px; font-weight: bold;">Day</span>
                        <!-- <?php
                            //$day = date("l");
                        ?> -->
                        <span><?php echo $day; ?></span>
                    </div>
                    <?php
                        // $sql1="SELECT lec_time_to FROM lecture WHERE lec_day='$day'";
                        // $result1=mysqli_query($ob->config(),$sql1);
                        // $row1=mysqli_fetch_assoc($result1);
                        // print_r($row1) ;
                    ?>
                    <table class="table table-bordered table-hover text-right" id="myTable" style="margin: 30px 30px 0 30px;">
                        <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>Room #</th>
                                <th>Class</th>
                                <th>Lecture</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Date</th>
                                <th>Take Att.</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php
                                $sql="SELECT * FROM `assign_time` WHERE '$time' BETWEEN lec_time_from AND lec_time_to AND day = '$day'";
                                $result=mysqli_query($ob->config(),$sql);
                                while($row=mysqli_fetch_assoc($result))
                                { 
                            ?>
                            <form method="post" action="take_attendance.php">
                            <tr>
                                <td style="color: black;"><?php echo $row['room']; ?></td>
                                <td style="color: black;"><?php echo $row['tclass_batch']; ?></td>
                                <td style="color: black;"><?php echo $row['tcourse_name']; ?></td>
                                <td style="color: black;"><?php echo $row['lec_time_from']; ?></td>
                                <td style="color: black;"><?php echo $row['lec_time_to']; ?></td>
                                <td style="color: black;"><?php echo $date; ?></td>
                                <td>
                                    <a href="take_attendance.php" 
                                        <?php 
                                            if (mysqli_num_rows($verify)>0) {
                                                echo 'class="btn btn-success disabled"';
                                            } 
                                            else{ 
                                                echo 'class="btn btn-success"'; 
                                            } 
                                        ?> 
                                    >Start</a>
                                </td>
                            </tr>
                            </form>
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

<!-- <script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var qrcode = $(this).attr("data-id");

            $.ajax({
                url:"qr.php",
                method:"post",
                data:{qrcode:qrcode},
                success:function(data){
                    $('#qr_code').html(data);
                   // alert(data);
                   //console.log(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    }); 
</script> -->
</body>

</html>

<!-- <div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">QR-Code</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>   
            </div>
            <div class="modal-body" id="qr_code"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius: 10px;">Close</button>
            </div>
        </div>
    </div>
</div> -->

<!-- <script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var qrcode = $(this).attr(data-id);

            $.ajax({
                url:"qr.php",
                method:"post",
                data:{qrcode:qrcode},
                success:function(data){
                    $('#qr_code').html(data);
                   // alert(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    }); 
</script>
 -->


<!-- type="text/javascript">
    function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // m = checkTime(m);
  // s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
</script-->