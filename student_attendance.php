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
    <title>Attendance Details</title>

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" />
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script> -->

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

    <style>
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>

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
                                <h4 class="page-title" style="font-weight: 800; font-size: 20px;">Search Attendance&nbsp; <i class="fas fa-info-circle"></i></h4>
                            </div>
                            <div class="container-fluid" style="margin-top: 20px;">
                                <!-- <label class="control-label col-sm-2"><b>Search:</b></label> -->
                                <div class="col-md-12" style="/*padding-bottom: 20px;*/">          
                                    <input type="text" class="form-control" id="attend" placeholder="Search" name="attend_details" style="border-radius: 10px;">
                                    <!-- <div class="col-md-10">
                                        <input type="text" id="tags" class="form-control" data-role="tagsinput" />
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" name="search" class="btn btn-primary" id="search" style="font-size: 15px;">Search</button>
                                    </div> -->
                                </div><br>
                                <div class="row" style="padding-bottom: 20px;">
                                    <form method="post" action="export.php">
                                        <input type="submit" name="export" class="btn btn-success" value="Export" style="font-size: 15px;" />
                                    </form>
                                </div>
                                <!-- <form class="form-horizontal" method="post" action="#">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"><b>Search:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="attend" placeholder="Search" name="attend_details" style="border-radius: 10px;">
                                        </div><br>
                                        label class="control-label col-sm-2"><b>Class:</b></label>
                                        <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="c_code" placeholder="Enter Class_code" name="class_code" style="border-radius: 10px;"><br>
                                        </div
                                        <<div class="col-sm-12">
                                        <button class="btn btn-rounded btn btn-primary" name="save" style="border-radius: 10px;">Search</button>
                                        </div>
                                    </div>
                                </form><br> -->
                                <div class="row">
                                    <div class="table-responsive">
                                        <!-- <div align="right">
                                            <p><b>Total Records - <span id="total_records"></span></b></p>
                                        </div> -->
                                        <table class="table table-bordered table-hover text-center" id="myTable">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Semester</th>
                                                    <th>Class</th>
                                                    <th>Roll #</th>
                                                    <th>Student</th>
                                                    <th>Lecture</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql_all = "SELECT * FROM `attendance`";
                                                    $result_all=mysqli_query($ob->config(),$sql_all);
                                                    while($row_all=mysqli_fetch_assoc($result_all))
                                                    {
                                                ?>
                                                <tr>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['semester'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['class'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['roll_no'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['std_name'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['lec'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['status'];?></td>
                                                    <td style="vertical-align: middle; color: black;"><?php echo $row_all['a_date'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!--row-->
                                <!-- <div style="clear:both"></div> -->
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
    <script src="datatables/datatables.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>

<!-- <script>  
    $(document).ready(function(){  
      $('#attend').change(function(){  
           var search = $(this).val();
            //alert(semester);
            if (search!='') {
                $.ajax({  
                    url:"search_atten.php",  
                    method:"POST",  
                    data:{search:search},
                    dataType:"text",  
                    success:function(data){
                        //alert(data);  
                        $('#myTable').html(data);  
                    }  
               });
            }
            else{
                $('#myTable').html('');
            }  
        });  
    });  
</script>  -->

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

</body>

</html>
<!-- end document-->


<!-- <script>
    $(document).ready(function(){
     
        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"search_atten.php",
                method:"POST",
                data:{query:query},
                dataType:"json",
                success:function(data)
                {
                    $('#total_records').text(data.length);
                    var html = '';

                    if(data.length > 0)
                    {
                        for(var count = 0; count < data.length; count++)
                        {
                            html += '<tr>';
                            html += '<td>'+data[count].semester+'</td>';
                            html += '<td>'+data[count].class+'</td>';
                            html += '<td>'+data[count].roll_no+'</td>';
                            html += '<td>'+data[count].std_name+'</td>';
                            html += '<td>'+data[count].lec+'</td>';
                            html += '<td>'+data[count].status+'</td>';
                            html += '<td>'+data[count].a_date+'</td></tr>';
                        }
                    }
                    else
                    {
                        html = '<tr><td colspan="5">No Data Found</td></tr>';
                    }

                    $('tbody').html(html);
                }
            })
        }

        $('#search').click(function(){
        var query = $('#tags').val();
        load_data(query);
        });
    });
</script> -->