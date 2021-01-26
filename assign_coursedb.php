<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;


    if(isset($_POST['program'])){

        $program = $_POST['program'];
        // echo $lecture;

        $sqli = "SELECT prog_name FROM `program` WHERE prog_name = '$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        if (mysqli_num_rows($found)>0) {
            //echo '<i class="fas fa-check" style="color:green;"></i>'." Program Verified";
            echo "";
        }
        else{
            //echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Program not verified";
            echo "";
        }
    }

    if(isset($_POST['semester2'])){

        $semester = $_POST['semester2'];
        //$program = $_POST['program2'];
        //echo $semester;
        //echo $lecture;

        $sqli = "SELECT * FROM `semester` WHERE sem_name = '$semester'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        //print_r($found);
        if (mysqli_num_rows($found)>0) {
            //echo '<i class="fas fa-check" style="color:green;"></i>'." Semester Matched";
            echo "";
        }
        else{
            //echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Semester Matched";
            echo "";
        }
    }

    if(isset($_POST['semester3'])){

        $semester = $_POST['semester3'];
        $program = $_POST['program3'];

        $sqli = "SELECT * FROM `course` WHERE course_semester = '$semester' AND course_program='$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Course</option>';
        while($row = mysqli_fetch_array($found))  
            {  
                echo '<option value="'.$row["course_name"].'">'.$row["course_name"].'</option>';  
            } 
            //echo $output;
    }

    if(isset($_POST['dept'])){

        $department = $_POST['dept'];

        $sqli = "SELECT * FROM `depts` WHERE dept_name = '$department'";
        $found=mysqli_query($ob->config(),$sqli);
        if (mysqli_num_rows($found)>0) {
            //echo '<i class="fas fa-check" style="color:green;"></i>'." Semester Matched";
            echo "";
        }
        else{
            //echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Semester Matched";
            echo "";
        }
    }

    if(isset($_POST['dept2'])){

        $department = $_POST['dept2'];

        $sqli = "SELECT * FROM `instructor` WHERE inst_dept = '$department'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Instructor</option>';
        while($row = mysqli_fetch_array($found))  
            {  
                echo '<option value="'.$row["inst_name"].'">'.$row["inst_name"].'</option>';  
            } 
            //echo $output;
    }

    
if(isset($_POST['save'])){
    
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $course = $_POST['course_name'];
    $dept = $_POST['department'];
    $instructor = $_POST['inst_name'];

    $check = "SELECT * FROM `assign_course` WHERE c_name='$course'";
        //echo $check;
    $verify = mysqli_query($ob->config(),$check);

    // $match = "SELECT * FROM `assign_course` WHERE c_name='$course' AND c_inst='$instructor'";
    // $found = mysqli_query($ob->config(),$match);
    
    //if (mysqli_num_rows($found)>0){
        if (mysqli_num_rows($verify)>0) {

            echo "<script type='text/javascript'>
                 alert('Data already exists');
                 history.back();
             </script>";
        }
        else{

            $sql = "INSERT INTO `assign_course`(`c_prog`, `c_sem`, `c_name`, `c_dept`, `c_inst`) VALUES ('$program','$semester','$course','$dept','$instructor')";

            $result = mysqli_query($ob->config(),$sql);

            if($result){
                //header('location:view_assign_course.php');
                echo "<script type='text/javascript'>
                 alert('Data inserted successfully');
                 history.back();
             </script>";
            }
            else{
                echo "<script type='text/javascript'>
                 alert('Unable to insert data!');
                 history.back();
             </script>";
            }
            //echo "ok";
        }
    //}
    // else{
    //     echo "<script type='text/javascript'>
    //             alert('Data is not Verified');
    //             history.back();
    //         </script>";
    // }

}

?>