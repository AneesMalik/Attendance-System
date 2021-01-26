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
    <title>Assign Class</title>

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
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Assign Class&nbsp; <i class="fas fa-book"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <form class="form-horizontal" method="post" action="assign_classdb.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"><b>Program:</b></label>
                                        <div class="col-sm-10">           
                                            <select name="program" id="prog" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Program</option>
                                                <?php
                                                    $sql="SELECT * FROM `program`";
                                                    $result=mysqli_query($ob->config(),$sql);
                                                while($row=mysqli_fetch_assoc($result))
                                                    {
                                                ?>
                                                <option value="<?php echo $row['prog_name']; ?>"><?php echo $row['prog_name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                
                                            </select>
                                            <div id="verify"></div>
                                            <br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Class Batch:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="class_batch" id="batch" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Batch</option>
                                            </select>
                                            <div id="get"></div><br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Semester:</b></label>
                                        <div class="col-sm-10">          
                                            <select name="semester" id="semester" class="form-control" required="required" style="border-radius: 10px;">
                                                <option value="">Select Semester</option>
                                                <?php
                                                    $sql="SELECT * FROM `semester`";
                                                    $result=mysqli_query($ob->config(),$sql);
                                                while($row=mysqli_fetch_assoc($result))
                                                    {
                                                ?>
                                                <option id="sem" value="<?php echo $row['sem_name']; ?>"><?php echo $row['sem_name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                            <div id="match"></div>
                                            <br>
                                        </div>

                                        <label class="control-label col-sm-2"><b>Courses:</b></label>
                                        <div class="col-sm-10" id="class_corse">          
                                            
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
    var programm = '';
    var semster = '';
    var batch = '';
</script>

<script>
    $('#prog').change(function(){
        programm = $('#prog').val();
        //program = $(this).find(':selected')[0].id;

        //alert(program);

        if (programm!='') {
            $.ajax({
                method: 'POST',
                url: 'assign_classdb.php',
                data: {programm:programm},
                success: function(data)
                {
                    //alert(data);
                    $('#verify').html(data);
                }
            });
        }
        else{
            $('#verify').html('');
        }
    });
</script>

<script>  
 $(document).ready(function(){  
      $('#semester').change(function(){  
           semster = $('#semester').val();
            //alert(semester);
           $.ajax({ 
                method:"POST", 
                url:"assign_classdb.php",  
                data:{semster:semster},  
                success:function(data){
                    //alert(data);  
                    $('#match').html(data);  
                }  
           });  
      });  
 });  
 </script>

<script>
    $('#prog').change(function(){
        programm = $('#prog').val();

        //alert(semester);

        $.ajax({
            method: 'POST',
            url: 'assign_classdb.php',
            data: {programm2:programm},
            success: function(data)
            {
                //alert(data);
                $('#batch').html(data);
            }
        });
    });
</script> 

 <script>  
    $(document).ready(function(){  
        $('#batch').change(function(){  
            batch = $('#batch').val();
            //alert(batch);
            $.ajax({  
                url:"assign_classdb.php",  
                method:"POST",  
                data: {batch:batch},  
                success:function(data){
                    //alert(data);  
                $('#get').html(data);  
                }  
            });  
        });  
    });  
</script> 

<script>  
 $(document).ready(function(){  
      $('#semester').change(function(){  
           semster = $(this).val();
            //alert(semester);
           $.ajax({  
                url:"assign_classdb.php",  
                method:"POST",  
                data:{semster2:semster,
                    batch2:batch},  
                success:function(data){
                    //alert(data);  
                    $('#class_corse').html(data);  
                }  
           });  
      });  
 });  
 </script>
