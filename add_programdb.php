<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    
if(isset($_POST['save'])){
    
    $program = $_POST['prog_name'];
    $level = $_POST['prog_level'];
    $dept = $_POST['department'];
    
    $sql = "INSERT INTO `program`(`prog_name`, `level`, `department`) VALUES ('$program','$level', '$dept')";

    $result=mysqli_query($ob->config(),$sql);
	if($result){
		header('location:add_program.php');
	}
	else{
		echo "Error";
	}
}

if(isset($_POST['save_update'])){

    $update = $_POST['update_prog'];
    //echo $update;
    $program = $_POST['prog_name'];
    $level = $_POST['prog_level'];
    $dept = $_POST['department'];

    $sql="UPDATE `program` SET `prog_name`='$code',`level`='$dept',`department`='$dept' WHERE id='$update'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:add_dept.php');
    }
    else{
        echo "<script type='text/javascript'>
               alert('Data is not Verified');
               history.back();
           </script>";
    }

}

if(isset($_POST['delete'])){
    $del = $_POST['delete_prog'];
    //echo $del;
    $sql="DELETE FROM `program` WHERE id='$del'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:add_dept.php');
    }
    else{
        echo "<script type='text/javascript'>
                alert('Data is not Verified');
                history.back();
            </script>";
    }
}
?>