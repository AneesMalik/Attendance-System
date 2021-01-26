<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;


    if(isset($_POST['programm'])){

        $program = $_POST['programm'];
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

    if(isset($_POST['programm2'])){

        $program = $_POST['programm2'];

        $sqli = "SELECT * FROM `class` WHERE class_name = '$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        //print_r($found);
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Batch</option>';
        while($row = mysqli_fetch_array($found))  
            {  
                echo '<option value="'.$row["class_batch"].'">'.$row["class_batch"].'</option>';  
            } 
            //echo $output;
    }

    if(isset($_POST['semster'])){

        $semester = $_POST['semster'];
        
        $sqli = "SELECT * FROM `semester` WHERE sem_name = '$semester'";
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

    if(isset($_POST['batch'])){

        $batch = $_POST['batch'];
        $sqli = "SELECT * FROM `course`,`class` WHERE  class_batch='$batch'";
         //echo $sqli;
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

    if(isset($_POST['batch2'])){

        $semester = $_POST['semster2'];
        $batch = $_POST['batch2'];

        $sqlc = "SELECT COUNT(course_name) AS total FROM `course`,`class` WHERE class_batch = '$batch' AND course_semester='$semester'";
        $resultc=mysqli_query($ob->config(),$sqlc);
        $rowc=mysqli_fetch_assoc($resultc);

        $count = $rowc['total'];
        echo '<input type="hidden" name="count" value="'.$rowc["total"].'">';
        //echo $count;

        $sqli = "SELECT * FROM `course`,`class` WHERE class_batch = '$batch' AND course_semester='$semester'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        //echo '<input type="checkbox">';
        while($row = mysqli_fetch_array($found))  
        {  
            echo '<input type="checkbox" name="course_list[]" id="course_list" checked value="'.$row["course_name"].'" style="margin-left:20px;"><label style="margin-left:20px; color:black;">'.$row["course_name"].'</label><br>'; 

                 
        }
    }

if(isset($_POST['save'])){
    
    $program = $_POST['program'];
    $batch = $_POST['class_batch'];
    $semester = $_POST['semester'];
    // $courses = $_POST['course_list'];

    $number = $_POST['count'];
    //echo $number;
    for($i=0; $i<$number; $i++){

        $sql = "INSERT INTO `assign_class`(`ac_prog`, `ac_batch`, `ac_sem`, `ac_course`) VALUES ('$program','$batch','$semester','".$_POST['course_list'][$i]."')";
        //print_r($sql);
        $result = mysqli_query($ob->config(),$sql);
        //print_r($result);
        if(isset($result)){
            header('location:view_assign_class.php');
            // echo "<script type='text/javascript'>
            //      alert('Data inserted successfully');
            //      history.back();
            //  </script>";
        }
        else{
            echo "<script type='text/javascript'>
                 alert('Unable to insert data!');
                 history.back();
             </script>";
        } 

    }

}

?>