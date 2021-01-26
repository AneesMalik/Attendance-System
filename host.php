<?php
	class db_config{
		private $con;
		public function config(){
			$this->con = mysqli_connect("localhost","root","","digital_attendance_system");
			return $this->con;
		}
	}
?>

