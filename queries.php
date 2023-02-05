<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $showAlert = false; 
        $showError = false; 
        $exists=false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include 'dbconnect.php';
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST["email"];
            $mobile = $_POST["mobile"]; 
            $message = $_POST["message"];
            $sql = "INSERT INTO `queries` (first_name,last_name,email,mobile,message) VALUES ('$fname','$lname','$email', '$mobile','$message')";
            $result = mysqli_query($conn, $sql);
            include 'home.html';
        }
     ?>
    </body>
</html>