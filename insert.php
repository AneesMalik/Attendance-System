
<?php
//insert.php

if(isset($_POST["name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
 $query = "
 INSERT INTO tbl_users (name, gender) 
 VALUES(:name, :gender)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':name'   => $_POST['name'],
   ':gender'  => $_POST['hidden_gender']
  )
 );

 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'done';
 }
}

?>