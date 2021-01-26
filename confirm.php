<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<p>Hello! this is done!</p>

</body>
</html>


<?php

 
include_once('inst_secure.php');
include_once('host.php');
$ob=new db_config(); 


	if(isset($_POST['insert'])){

		$lectures=$_POST['course'];
		$class=$_POST['batch'];
		$semester=$_POST['semester'];
		$numbers=$_POST['count'];

		$day = date("l");
        date_default_timezone_set("Asia/Karachi");
        $date=date('Y-m-d');
        //echo $date;
        $t=time();
        $time=date("G:i:s",$t);

        $check = "SELECT * FROM attendance WHERE (a_date='$date' AND lec = '$lectures') AND class = '$class' ";
        $verify = mysqli_query($ob->config(),$check);

        if(mysqli_num_rows($verify)>0){

        	echo"<script type='text/javascript'>
                alert('Data already exists');
                history.back();
            </script>";

        }
        else{

        	for($i=0; $i<$numbers; $i++){


			$sql="INSERT INTO `attendance`(`roll_no`, `std_name`, `lec`, `class`, `semester`, `a_date`, `status`) VALUES('".$_POST['roll_no'][$i]."','".$_POST['std_name'][$i]."','$lectures','$class','$semester','$date','".$_POST['attendance_status'][$i]."')";

			$result = mysqli_query($ob->config(),$sql);

	            // if(isset($result)){
	            //     echo "<script type='text/javascript'>
             //     		alert('Attendance Submitted Successfully');
             //     		history.back();
             // 		</script>";
	            // }
	            // else{
	            //     echo "Error";
	            // }

        	}

        	if(isset($result)){
	            echo "<script type='text/javascript'>
                 	alert('Attendance Submitted Successfully');
                 	history.back();
             		</script>";
	        }
	        else{
	            echo "Error";
	        }

		}
	}

	// if(isset($_POST['submit'])){
	// 	echo 'style="display: none;"';
	// }

?>