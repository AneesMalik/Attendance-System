<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    $output = '';

    if(isset($_POST["export"]))
    {
        $query = "SELECT * FROM attendance";
        $result = mysqli_query($ob->config(), $query);
        if(mysqli_num_rows($result) > 0)
        {
            $output .= '
            <table class="table" bordered="1">  
                <tr>  
                    <th>Semester</th>
                    <th>Class</th>
                    <th>Roll #</th>
                    <th>Student</th>
                    <th>Lecture</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            ';
            while($row_all = mysqli_fetch_array($result))
            {
                $output .= '
                <tr>  
                    <td style="vertical-align: middle; color: black;">'.$row_all["semester"].'</td>
                    <td style="vertical-align: middle; color: black;">'.$row_all["class"].'</td>
                    <td style="vertical-align: middle; color: black;">'.$row_all["roll_no"].'</td>
                    <td style="vertical-align: middle; color: black;">'.$row_all["std_name"].'</td>
                    <td style="vertical-align: middle; color: black;">'.$row_all["lec"].'</td>
                    <td style="vertical-align: middle; color: black;">'.$row_all["status"].'</td>
                    <td style="vertical-align: middle; color: black;">'.$row_all["a_date"].'</td>
                </tr>
                ';
            }

            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=attendance.xls');
            echo $output;
        }
    }

?>