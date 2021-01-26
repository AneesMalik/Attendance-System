<?php 
include_once('std_secure.php');
include_once('host.php');
$ob=new db_config(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
            <?php
                $sec_id=$_SESSION['sec_id'];
                $sql="SELECT * FROM `std_profile`";
                $result=mysqli_query($ob->config(),$sql);
                $row=mysqli_fetch_assoc($result);
            ?>
	        <aside class="menu-sidebar2" style="background-color: honeydew;">
            <div class="logo"  style="background: none;">
                <a href="index.php">
                    <img src="images/icon/logo2.png" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?php echo('std_profilephoto/').$row['pro_photo']; ?>"/>
                    </div>
                    <h4 class="name" style="text-align: center;"><?php echo $row['pro_name']; ?></h4>
                    <a href="logout.php">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                <!--span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span-->
                            </a>
                            <a class="js-arrow" href="timetable.php">
                                <i class="fas fa-clock"></i>Time_Table
                                <!--span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span-->
                            </a>
                            <a class="js-arrow" href="std_attendance_records.php">
                                <i class="fas fa-user"></i>Attendance Record
                                <!--span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span-->
                            </a>
                            <!--ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index4.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                </li>
                            </ul-->
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
</body>
</html>