<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    
if(isset($_POST['save'])){
    
    $room = $_POST['room_no'];
    $class = $_POST['class'];
    $block = $_POST['room_block'];

    $check = "SELECT * FROM room WHERE room='$room' OR room_class='$class' AND room_block='$block'";
    echo $check;
    
    //$verify = mysqli_query($ob->config(),$check);
    $result=mysqli_query($ob->config(),$check);
    print_r($result);
    echo $result;
    // while($row=mysqli_fetch_array($verify)){
    //     $db=$row['room_block'];
    // }
    
    // if (mysqli_num_rows($verify)>0){ 
    // // if($block == $db){

    //     echo "<script type='text/javascript'>
    //            alert('This data is already exists');
    //            history.back();
    //        </script>";
    // }
    // else{

    //     $sql = "INSERT INTO `room`(`room`, `room_class`, `room_block`) VALUES ('$room', '$class', '$block')";
    
    //     $result = mysqli_query($ob->config(),$sql);

    //     if($result){
    //         header('location:add_room.php');
    //     }
    //     else{
    //         echo "Error";
    //     }
    // }

}

if(isset($_POST['save_update'])){

    $update = $_POST['update_room'];
    //echo $update;
    $room = $_POST['room_no'];
    $block = $_POST['room_block'];

    $check = "SELECT * FROM room WHERE room='$room' AND room_block='$block'";
    
    $verify = mysqli_query($ob->config(),$check);
  
    if (mysqli_num_rows($verify)>0){ 

        echo "<script type='text/javascript'>
               alert('This data is already exists');
               history.back();
           </script>";
    }
    else{

        $sql="UPDATE `room` SET `room`='$room',`room_block`='$block' WHERE room_id='$update'";

        $result=mysqli_query($ob->config(),$sql);
        if($result){
            header('location:add_room.php');
        }
        else{
            echo "<script type='text/javascript'>
                   alert('Unable to Update Data');
                   history.back();
               </script>";
        }
    }

}

if(isset($_POST['delete'])){
    $del = $_POST['delete_room'];
    //echo $del;
    $sql="DELETE FROM `room` WHERE room_id='$del'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:add_room.php');
    }
    else{
        echo "<script type='text/javascript'>
                alert('Unable to delete data');
                history.back();
            </script>";
    }
}

?>