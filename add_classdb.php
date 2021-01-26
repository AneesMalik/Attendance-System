<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    
if(isset($_POST['save'])){
    
    $class = $_POST['program'];
    $batch = $_POST['class_code'];
    $session = $_POST['session'];
    //$session_end = $_POST['session_end'];
    $dept = $_POST['department'];
    
    $sql = "INSERT INTO `class`(`class_name`, `class_batch`, `session`, `dept`) VALUES ('$class','$batch', '$session', '$dept')";

    $result=mysqli_query($ob->config(),$sql);
	if($result){
		header('location:add_class.php');
	}
	else{
		echo "Error";
	}
}

if(isset($_POST['save_update'])){

    $update = $_POST['update_dept'];
    //echo $update;
    $class = $_POST['program'];
    $batch = $_POST['class_code'];
    $session = $_POST['session'];
    //$session_end = $_POST['session_end'];
    $dept = $_POST['department'];

    $sql="UPDATE `class` SET `class_name`='$class',`class_batch`='$batch',`session`='$session',`dept`='$dept' WHERE id='$update'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:add_class.php');
    }
    else{
        echo "<script type='text/javascript'>
               alert('Data is not Verified');
               history.back();
           </script>";
    }

}

if(isset($_POST['delete'])){
    $del = $_POST['delete_class'];
    //echo $del;
    $sql="DELETE FROM `class` WHERE id='$del'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:add_class.php');
    }
    else{
        echo "<script type='text/javascript'>
                alert('Data is not Verified');
                history.back();
            </script>";
    }
}

?>