<?php 
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
    <title>Student Portal Registration</title>

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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content" style="border-radius: 50px;  box-shadow: 0 0 10px 10px lightgrey;">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo2.png" alt="CoolAdmin">
                            </a>
                        </div>

                        <div>
                            <h4 class="page-title" style="font-weight: 600;font-size: 24px;text-align: center;box-shadow: 0 0 5px 5px lightgrey; border-radius: 10px; background-color: gainsboro;">Student Portal Registration&nbsp;</h4><br>
                        </div>

                        <div class="login-form">
                            <form class="form-horizontal" action="std_profile.php" method="post" enctype="multipart/form-data" id="form">
                                <div class="form-group">
                                    <label class="col-sm-2"><b>Department</b></label>
                                    <div class="col-sm-12">          
                                        <select class="form-control" name="depts" id="dept" style="border-radius: 10px;">
                                            <option>Select Department</option>
                                        <?php

                                            $sql="SELECT * FROM depts";
                                            $result=mysqli_query($ob->config(),$sql);
                                            while ($row=mysqli_fetch_assoc($result)) 
                                            {
                                                
                                        ?>
                                            <option value="<?php echo $row['dept_name']; ?>"><?php echo $row['dept_name']; ?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div><br>

                                    <label class="col-sm-2"><b>Program</b></label>
                                    <div class="col-sm-12">          
                                        <select class="form-control" name="program" id="prog" style="border-radius: 10px;">
                                            <option>Select Program</option>
                                        </select>
                                    </div><br>

                                    <label class="col-sm-2"><b>Class</b></label>
                                    <div class="col-sm-12">          
                                        <select class="form-control" name="class_batch" id="batch" style="border-radius: 10px;">
                                            <option>Select Class Btach</option>
                                        </select>
                                        <div id="class_status"></div>
                                    </div><br>

                                    <label class="col-sm-2"><b>User</b></label>
                                    <div class="col-sm-12">          
                                        <input class="form-control" type="text" name="username" id="std_name" placeholder="Your Name" required="required" style="border-radius: 10px;">
                                        <div id="name_status"></div>
                                    </div><br>

                                    <label class="col-sm-2"><b>CNIC</b></label>
                                    <div class="col-sm-12">          
                                        <input type="text" class="form-control" id="nic" name="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}"  placeholder="xxxxx-xxxxxxx-x" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required="required" style="border-radius: 10px;">
                                        <div id="nic_status"></div>
                                    </div><br>

                                    <label class="col-sm-2"><b>Email</b></label>
                                    <div class="col-sm-12">          
                                        <input class="form-control" type="email" name="email" id="mail" required="required" placeholder="Email address" style="border-radius: 10px;">
                                        <div id="email_status"></div>
                                    </div><br>

                                    <label class="col-sm-2"><b>Password</b></label>
                                    <div class="col-sm-12">          
                                        <input class="form-control" type="password" name="password" required="required" placeholder="Password" style="border-radius: 10px;">
                                    </div><br>

                                    <label class="col-sm-2"><b>Cell #</b></label>
                                    <div class="col-sm-12">          
                                    <input class="form-control" type="tel" id="phone" name="cell_no" pattern="[+][0-9]{2}-[0-9]{3}-[0-9]{7}" placeholder="+92-321-1234567" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required="required" style="border-radius: 10px;">
                                    <div id="number"></div>
                                    </div><br>

                                    <label class="col-sm-2"><b>Photo</b></label>
                                    <div class="col-sm-12">          
                                    <input type="file" class="form-control" id="profile_photo" name="profile_img" required="required" style="border-radius: 10px;">
                                    </div><br>

                                    <div class="col-sm-12">
                                        <button class="btn btn-rounded btn btn-primary" name="save" style="border-radius: 10px;">Register</button>
                                    </div>
                                </div>  
                                <!--div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div-->
                                <!--div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

</body>

</html>
<!-- end document-->

<script>
    
    var depts = '';
    var program = '';
    var clas = '';
    var std_name = ''
    var nic = '';
    var mail = '';
    
</script>

<script>
    $('#dept').change(function(){
        depts = $('#dept').val();

        //alert(depts);
        $.ajax({
            method: 'POST',
            url: 'std_profile.php',
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
        //alert(depts);
        $.ajax({
            method: 'POST',
            url: 'std_profile.php',
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
    $('#prog').change(function(){
        program = $('#prog').val();
        //alert(depts);
        $.ajax({
            method: 'POST',
            url: 'std_profile.php',
            data: {program2:program},
            success: function(data)
            {
                //alert(data);
                $('#batch').html(data);
            }
        });
    });
</script>

<script>
    $('#batch').change(function(){
        clas = $('#batch').val();
        //alert(depts);
        $.ajax({
            method: 'POST',
            url: 'std_profile.php',
            data: {clas:clas},
            success: function(data)
            {
                //alert(data);
                $('#class_status').html(data);
            }
        });
    });
</script>

<script>
    $('#std_name').change(function(){
        std_name = $('#std_name').val();
        //alert(std_name);

            $.ajax({
                method: 'POST',
                url: 'std_profile.php',
                data: {std_name2:std_name,
                        clas2:clas},
                success: function(data)
                {
                    //alert(data);
                    $('#name_status').html(data);
                }
            });
    });
</script>

<script>
    $('#nic').keyup(function(){
        nic = $('#nic').val();
        //alert(nic);

        $.ajax({
            method: 'POST',
            url: 'std_profile.php',
            data: {nic:nic,
                    std_name3:std_name,
                    clas3:clas},
            success: function(data)
            {
                //alert(data);
                $('#nic_status').html(data);
            }
        });
    });

</script>

<script>
    $('#mail').keyup(function(){
        mail = $('#mail').val();
        //alert(mail);

        $.ajax({
            method: 'POST',
            url: 'std_profile.php',
            data: {mail2:mail,
                nic3:nic},
            success: function(data)
            {
                //alert(data);
                $('#email_status').html(data);
            }
        });
    });

</script>

<script>
    $('#phone').keyup(function(){
        var cell_var = $('#phone').val();
        //alert(cell_var);
        
        $.ajax({
            method: 'POST',
            url: 'std_profile.php',
            data: {cell:cell_var,
                    nic2:nic},
            success: function(data)
            {
                //alert(data);
                $('#number').html(data);
            }
        });
    });
</script>
