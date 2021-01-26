<?php
include_once('std_secure.php');
include_once('../host.php');
$ob=new db_config;


    $std_id=$_SESSION['sec_id'];
    $std_name = $_SESSION['sec_name'];
    $sql="SELECT * FROM `attendance` WHERE std_name='$std_name'";
    $result=mysqli_query($ob->config(),$sql);
    $row=mysqli_fetch_array($result);
    $lec=$row['lec'];
    $output = '';

    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($ob->config(), $_POST["query"]);
        $query = "
        SELECT * FROM attendance, assign_course 
        WHERE c_inst LIKE '%".$search."%' 
        OR lec LIKE '%".$search."%' 
        OR a_date LIKE '%".$search."%'
        OR status LIKE '%".$search."%'
        ";
    }
    else
    {
        $query = "
        SELECT * FROM attendance, assign_course WHERE c_name='$lec' AND std_name='$std_name' ORDER BY a_date";
    }

    $result = mysqli_query($ob->config(),$query);
    if(mysqli_num_rows($result) > 0)
    {
        $output .= '
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Status</th>
                <th>Course</th>
                <th>Teacher</th>
            </tr>
        </thead>
     ';
     while($row_all = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>
            <td style="vertical-align: middle; color: black;">'.$row_all["a_date"].'</td>
            <td style="vertical-align: middle; color: black;">'.$row_all["status"].'</td>
            <td style="vertical-align: middle; color: black;">'.$row_all["lec"].'</td>
            <td style="vertical-align: middle; color: black;">'.$row_all["c_inst"].'</td>
       </tr>
      ';
     }
     echo $output;
    }
    else
    {
     echo '<i class="fas fa-exclamation-triangle" style="color:red; font-size: 20px;"> No Data regarding this search</i>';
    }

    // if(isset($_POST['search'])){

    //     $search = $_POST['search'];
    //     // echo $lecture;

    //     //$sqli = "SELECT * FROM `attendance` WHERE std_name LIKE %'$search'% OR lec = '$search' OR roll_no = '$search' OR class = '$search' OR semester = '$search' OR a_date = '$search' OR status = '$search'";
    //     $sqli = "SELECT * FROM `attendance` WHERE std_name LIKE %'$search'% OR lec = '$search' OR roll_no = '$search' OR class = '$search' OR semester = '$search' OR a_date = '$search' OR status = '$search'";
    //     // echo $sqli;
    //     echo '
    //         <thead class="thead-dark">
    //             <tr>
    //                 <th>Semester</th>
    //                 <th>Class</th>
    //                 <th>Roll #</th>
    //                 <th>Student</th>
    //                 <th>Lecture</th>
    //                 <th>Status</th>
    //                 <th>Date</th>
    //             </tr>
    //         </thead>';
    //     $found=mysqli_query($ob->config(),$sqli);
    //     while ($row_all=mysqli_fetch_array($found)) {
    //         //echo '<i class="fas fa-check" style="color:green;"></i>'." Program Verified";
    //        // echo "";
    //         echo '
    //         <tr>
    //                 <td style="vertical-align: middle; color: black;">'.$row_all["semester"].'</td>
    //                 <td style="vertical-align: middle; color: black;">'.$row_all["class"].'</td>
    //                 <td style="vertical-align: middle; color: black;">'.$row_all["roll_no"].'</td>
    //                 <td style="vertical-align: middle; color: black;">'.$row_all["std_name"].'</td>
    //                 <td style="vertical-align: middle; color: black;">'.$row_all["lec"].'</td>
    //                 <td style="vertical-align: middle; color: black;">'.$row_all["status"].'</td>
    //                 <td style="vertical-align: middle; color: black;">'.$row_all["a_date"].'</td>
                                                    
    //         </tr>';
    //     }
    //     // else{
    //     //     //echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Program not verified";
    //     //     echo "";
    //     // }
    // }

    // $query = '';

    // if(isset($_POST["query"]))
    // {
    //     $search = str_replace(",", "|", $_POST["query"]);
    //     $query = "
    //     SELECT * FROM attendance 
    //     WHERE class REGEXP '".$search."' 
    //     OR lec REGEXP '".$search."' 
    //     OR std_name REGEXP '".$search."' 
    //     OR roll_no REGEXP '".$search."' 
    //     OR a_date REGEXP '".$search."'
    //     OR status REGEXP '".$search."'
    //     OR semester REGEXP '".$search."'
    //     ";
    // }
    // else
    // {
    //     $query = "
    //     SELECT * FROM attendance
    //     ";
    // }

    // // $statement = $connect->prepare($query);
    // // $statement->execute();

    // $result = mysqli_query($ob->config(),$query);

    // while($row = mysqli_fetch_array($result))
    // {
    //     $data[] = $row;
    // }

    // echo json_encode($data);

?>