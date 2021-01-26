<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    $output = '';

    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($ob->config(), $_POST["query"]);
        $query = "
        SELECT * FROM assign_class 
        WHERE ac_prog LIKE '%".$search."%'
        OR ac_batch LIKE '%".$search."%'
        OR ac_course LIKE '%".$search."%' 
        ";
    }
    else
    {
        $query = "
        SELECT * FROM assign_class ";
    }

    $result = mysqli_query($ob->config(),$query);
    if(mysqli_num_rows($result) > 0)
    {
        $output .= '
        <thead class="thead-dark">
            <tr>
                <th style="vertical-align: middle;">Course</th>
                <th style="vertical-align: middle;">Batch</th>
                <th style="vertical-align: middle;">Semester</th>
                <th style="vertical-align: middle;">Program</th>
                <th style="vertical-align: middle;">Action</th>
            </tr>
        </thead>
     ';
     while($row_all = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>
            <td style="vertical-align: middle; color: black;">'.$row_all['ac_course'].'</td>
            <td style="vertical-align: middle; color: black;">'.$row_all['ac_batch'].'</td>
            <td style="vertical-align: middle; color: black;">'.$row_all['ac_sem'].'</td>
            <td style="vertical-align: middle; color: black;">'.$row_all['ac_prog'].'</td>
            <td style="vertical-align: middle;">
                <button class="btn btn-info update_data" data-toggle="modal" data-target="#up_dept" id="update" data-id="'.$row_all['ac_id'].'"><i class="fas fa-pen"></i></button>

                <button class="btn btn-danger del_data" data-toggle="modal" data-target="#del_course" id="del_btn" data-id="'.$row_all['ac_id'].'"><i class="fas fa-trash"></i></button>
            </td>
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

?>