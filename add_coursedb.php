<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    
if(isset($_POST['save'])){
    
    $course = $_POST['course_name'];
    $code = $_POST['course_code'];
    $c_hours = $_POST['credit_hours'];
    // $semester = $_POST['semester'];
    // $program = $_POST['program'];
    // $dept = $_POST['department'];
    
    $sql = "INSERT INTO `course`(`course_name`, `course_code`,`credit_hours`) VALUES ('$course', '$code', '$c_hours')";

    $result=mysqli_query($ob->config(),$sql);
	if($result){
		header('location:add_course.php');
	}
	else{
		echo "Error";
	}
}

if(isset($_POST['save_update'])){

    $update = $_POST['update_course'];
    //echo $update;
    $course = $_POST['course_name'];
    $code = $_POST['course_code'];
    $c_hours = $_POST['credit_hours'];
    // $semester = $_POST['semester'];
    // $program = $_POST['program'];
    // $dept = $_POST['department'];

    $sql="UPDATE `course` SET `course_name`='$course',`course_code`='$code',`credit_hours`='$c_hours' WHERE course_id='$update'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:view_courses.php');
    }
    else{
        echo "<script type='text/javascript'>
                alert('Data is not Verified');
                history.back();
            </script>";
    }

}

if(isset($_POST['delete'])){
    $del = $_POST['delete_course'];
    $sql="DELETE FROM `course` WHERE course_id='$del'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:view_courses.php');
    }
    else{
        echo "<script type='text/javascript'>
                alert('Data is not Verified');
                history.back();
            </script>";
    }
}

?>