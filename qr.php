<?php 
//include_once('secure.php');
include_once('host.php');
$ob=new db_config(); 

include('phpqrcode/qrlib.php');

	if(isset($_POST['qrcode'])){
		$qr=$_POST['qrcode'];
        //$text1=$_POST['Text1'];
       // $text2=$_POST['text2'];
		$day = date("l");
        date_default_timezone_set("Asia/Karachi");
        $date=date("d/m/Y");
       	//echo $date;
        $t=time();
        $time=date("G:i:s",$t);
        //echo $time;

        $folder="images/";
        $file_name="qr.png";
        $file_name=$folder.$file_name;
        $ecc = 'L'; 
		$pixel_Size = 20; 
		$frame_Size = 5; 
        QRcode::png($qr,$file_name,$ecc,$pixel_Size,$frame_Size);

		$sql="SELECT * FROM `lecture` WHERE '$time' BETWEEN lec_time_from AND lec_time_to AND lec_day = '$day'";
        $result=mysqli_query($ob->config(),$sql);
        while($row=mysqli_fetch_assoc($result))
        { 
        $qr = $row['lec_code'];
		//$text1='Anees';
		//$text2='Iqbal';
        //$text3 = $text1. " " . $text2; // concatenated from previous 2

         // used $text3 from the concatenated variables
        echo"<img src='images/qr.png'>";

    	}
    }
?>
