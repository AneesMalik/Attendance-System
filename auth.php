<?php
include("firebase/db.php");

    
if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $user = $_POST['username'];

    // echo $user;
    // echo $pass;
    // echo $email;

    $data = [
        'email' => $email,
        'password' => $pass,
        'username' => $user
    ];

    $ref = "instructor_registration";
    $pushdata = $database->getReference($ref)->push($data);

    echo "It's done";
}

?>