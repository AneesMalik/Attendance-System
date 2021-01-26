<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    
if(isset($_POST['save'])){
    
    $dept = $_POST['dept_name'];
    $code = $_POST['dept_code'];
    
    $sql = "INSERT INTO `depts`(`dept_name`, `dept_code`) VALUES ('$dept','$code')";

    $result=mysqli_query($ob->config(),$sql);
	if($result){
		header('location:add_dept.php');
	}
	else{
		echo "Error";
	}
}

// if(isset($_POST['update_dept'])){

//     $sql = "SELECT * FROM depts WHERE id='".$_POST['update_dept']."'";
//     $result = mysqli_query($ob->config(),$sql);
//     $row = mysqli_fetch_array($result);
//     echo json_encode($row);

// }

if(isset($_POST['save_update'])){

    $update = $_POST['update_dept'];
    //echo $update;
    $dept = $_POST['dept_name'];
    $code = $_POST['dept_code'];

    $sql="UPDATE `depts` SET `dept_code`='$code',`dept_name`='$dept' WHERE id='$update'";

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
    $del = $_POST['delete_dept'];
    //echo $del;
    $sql="DELETE FROM `depts` WHERE id='$del'";

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