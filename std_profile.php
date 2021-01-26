<?php 
include_once('host.php');
$ob=new db_config(); 


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

    if(isset($_POST['program2'])){

        $program = $_POST['program2'];

        $sqli = "SELECT * FROM `class` WHERE class_name = '$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        echo '<option value="">Select Class batch</option>';
        while ($row=mysqli_fetch_array($found)) {
            echo '<option value="'.$row["class_batch"].'">'.$row["class_batch"].'</option>'; 
        }
    }

    if(isset($_POST['clas'])){

        $class = $_POST['clas'];
        // echo $lecture;
        $sqli = "SELECT * FROM `class` WHERE class_batch = '$class'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        if (mysqli_num_rows($found)>0) {
            //echo '<i class="fas fa-check" style="color:green;"></i>'." Instructor Verified";
            echo "";
        }
        else{
            // echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Instructor not verified";
            echo "";
        }
    }

    if(isset($_POST['std_name'])){

		$student = $_POST['std_name'];
		//echo $student;
		$class = $_POST['clas2'];

		$sql = "SELECT * FROM `student` WHERE std_name = '$student' AND std_batch = '$class'";

		$found=mysqli_query($ob->config(),$sql);
		if (mysqli_num_rows($found)>0) {
			echo '<i class="fas fa-check" style="color:green;"> Name Verified</i>';
		}
		else{
			echo '<i class="fas fa-exclamation-triangle" style="color:red;"> Name not found in selected class</i>';
		}
	}

	if(isset($_POST['std_name2'])){

		$student = $_POST['std_name2'];
		//echo $student;
		$class = $_POST['clas2'];

		$sql = "SELECT * FROM `student` WHERE std_name = '$student' AND std_batch = '$class'";

		$found=mysqli_query($ob->config(),$sql);
		if (mysqli_num_rows($found)>0) {
			echo '<i class="fas fa-check" style="color:green;"> Name Verified</i>';
		}
		else{
			echo '<i class="fas fa-exclamation-triangle" style="color:red;"> Name not found in selected class</i>';
		}
	}

	if(isset($_POST['nic'])){

		$cnic = $_POST['nic'];
		$student = $_POST['std_name3'];
		//echo $student;
		$class = $_POST['clas3'];

		$sql = "SELECT * FROM `student` WHERE std_cnic = '$cnic' AND std_batch = '$class' AND std_name = '$student' ";

		$found=mysqli_query($ob->config(),$sql);
		if (mysqli_num_rows($found)>0) {
			echo '<i class="fas fa-check" style="color:green;"> CNIC Verified</i>';
		}
		else{
			echo '<i class="fas fa-exclamation-triangle" style="color:red;"> CNIC not Verified</i>';
		}
	}

	if(isset($_POST['mail2'])){

		$mail = $_POST['mail2'];
		//echo $phone;
		$cnic = $_POST['nic3'];

		$sqli = "SELECT * FROM `student` WHERE std_email = '$mail' AND std_cnic = '$cnic'";
		// echo $sqli;
		$found=mysqli_query($ob->config(),$sqli);
		if (mysqli_num_rows($found)>0) {
			echo '<i class="fas fa-check" style="color:green;"> Email Verified</i>';
		}
		else{
			echo '<i class="fas fa-exclamation-triangle" style="color:red;"> Email not Verified</i>';
		}
	}

	if(isset($_POST['cell'])){

		$phone = $_POST['cell'];
		//echo $phone;
		$cnic = $_POST['nic2'];

		$sqli = "SELECT * FROM `student` WHERE std_phone_no = '$phone' AND std_cnic = '$cnic'";
		// echo $sqli;
		$found=mysqli_query($ob->config(),$sqli);
		if (mysqli_num_rows($found)>0) {
			echo '<i class="fas fa-check" style="color:green;"> Phone# Verified</i>';
		}
		else{
			echo '<i class="fas fa-exclamation-triangle" style="color:red;"> Phone# not Verified</i>';
		}
	}


	if(isset($_POST['save'])){
    
    $dept = $_POST['depts'];
    $program = $_POST['program'];
    $class = $_POST['class_batch'];
    $name = $_POST['username'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $phone = $_POST['cell_no'];

    $photo = $_FILES['profile_img']['name'];
	$target = "inst_profilephoto/".basename($photo);
	move_uploaded_file($_FILES['profile_img']['tmp_name'], $target);

	//echo $email;

	$sqli = "SELECT * FROM `student` WHERE std_cnic = '$cnic' AND std_batch = '$class' AND std_name = '$name' AND std_cnic = '$cnic'";
	$found=mysqli_query($ob->config(),$sqli);

	if (mysqli_num_rows($found)>0) {
    
    	$sql = "INSERT INTO `std_profile`(`pro_dept`, `pro_prog`, `pro_batch`, `pro_name`, `pro_cnic`, `pro_email`, `pro_pass`, `pro_phone`, `pro_photo`) VALUES ('$dept', '$program', '$class', '$name', '$cnic',  '$email', '$pass', '$phone', '$photo')";

	    $result=mysqli_query($ob->config(),$sql);
		if($result){
			//echo "ok";
			echo "<script type='text/javascript'>
				alert('Data Inserted Successfully');
				history.back();
			</script>";
			header('location:login.php');
		}
		else{
			echo "<script type='text/javascript'>
				alert('Unable to Insert Data!');
				history.back();
			</script>";
			//echo "error";
		}
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data is not Verified');
				history.back();
			</script>";
		//echo "not verified";
	}
}
?>