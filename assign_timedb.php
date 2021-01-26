<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;


    if(isset($_POST['depts'])){

        $dept = $_POST['depts'];
        // echo $lecture;
        $sqli = "SELECT dept_name FROM `depts` WHERE dept_name = '$dept'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        if (mysqli_num_rows($found)>0) {
            // echo '<i class="fas fa-check" style="color:green;"></i>'." Instructor Verified";
            echo "";
        }
        else{
            // echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Instructor not verified";
            echo "";
        }
    }

    if(isset($_POST['depts2'])){

        $dept = $_POST['depts2'];

        $sqli = "SELECT * FROM `program` WHERE department = '$dept'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select program</option>';
        while ($row=mysqli_fetch_array($found)) {
            echo '<option value="'.$row["prog_name"].'">'.$row["prog_name"].'</option>'; 
        }
    }

    if(isset($_POST['program'])){

        $program = $_POST['program'];
        // echo $lecture;

        $sqli = "SELECT prog_name FROM `program` WHERE prog_name = '$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        if (mysqli_num_rows($found)>0) {
            // echo '<i class="fas fa-check" style="color:green;"></i>'." Instructor Verified";
            echo "";
        }
        else{
            // echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Instructor not verified";
            echo "";
        }
    }

    if(isset($_POST['depts3'])){

        $dept = $_POST['depts3'];

        $sqli = "SELECT * FROM `instructor` WHERE inst_dept = '$dept'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Instructor</option>';
        while ($row=mysqli_fetch_array($found)) {
            echo '<option value="'.$row["inst_name"].'">'.$row["inst_name"].'</option>'; 
        }
    }

    if(isset($_POST['instructor2'])){

        $instructor = $_POST['instructor2'];
        $program = $_POST['program2'];

        $sqli = "SELECT * FROM `assign_course` WHERE c_inst = '$instructor' AND c_prog='$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Course</option>';
        while($row = mysqli_fetch_array($found))  
            {  
                echo '<option value="'.$row["c_name"].'">'.$row["c_name"].'</option>';  
            } 
    }

    if(isset($_POST['corse'])){

        $course = $_POST['corse'];

        $sqli = "SELECT * FROM `assign_class` WHERE ac_course = '$course'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Class</option>';
        while ($row=mysqli_fetch_array($found)) {
            echo '<option value="'.$row["ac_batch"].'">'.$row["ac_batch"].'</option>'; 
        }
    }

    if(isset($_POST['clas'])){

        $class = $_POST['clas'];

        $sqli = "SELECT * FROM `room` WHERE room_class = '$class'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Room</option>';
        while ($row=mysqli_fetch_array($found)) {
            echo '<option value="'.$row["room_no"].' ('.$row["room_block"].' Block)">'.$row["room_no"].' ('.$row["room_block"].' Block)</option>'; 
        }
    }


if(isset($_POST['save'])){
    
    $dept = $_POST['dept'];
    $program = $_POST['prog'];
    $instructor = $_POST['inst_name'];
    $course = $_POST['course_name'];
    $class = $_POST['class_batch'];
    $room = $_POST['room'];
    $day = $_POST['day'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];

    $check_corse = "SELECT tcourse_name,day,lec_time_from,lec_time_to FROM assign_time WHERE tcourse_name = '$course' AND (lec_time_from = '$time_from' OR lec_time_to = 'time_to') AND day = '$day'";
        //echo $check_corse;
    $verify_corse = mysqli_query($ob->config(),$check_corse);
        //print_r($verify_corse);
    if(mysqli_num_rows($verify_corse)>0){

        echo "<script type='text/javascript'>
                 alert('Data already exists');
                 history.back();
             </script>";
    }
    else{

        $sql = "INSERT INTO `assign_time`(`t_dept`, `t_program`, `tcourse_inst`, `tcourse_name`, `tclass_batch`, `room`, `day`, `lec_time_from`, `lec_time_to`) VALUES ('$dept','$program','$instructor','$course','$class','$room','$day','$time_from','$time_to')";

        $result = mysqli_query($ob->config(),$sql);

        if($result){
            //echo "ok";
            //header('location:view_assign_course.php');
            echo"<script type='text/javascript'>
                 alert('Data inserted successfully');
                 history.back();
            </script>";
        }
        else{
            //echo "error";
            echo"<script type='text/javascript'>
                 alert('Unable to insert data!');
                 history.back();
            </script>";
        }
            //echo "ok";
    }
}

?>