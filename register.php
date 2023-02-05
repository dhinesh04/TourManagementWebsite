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
            $name = $_POST['name'];
            $email = $_POST["email"]; 
            $username = $_POST["username"]; 
            $phone = $_POST["phone"]; 
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            $sql = "Select * from registration where email='$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           // $active = $row['active'];
            $count = mysqli_num_rows($result);
            if($count == 0){
                $sql = "INSERT INTO `registration` (name,username,email,phone_number,password,confirm_password) VALUES ('$name', '$username','$email',
                            '$phone','$password','$confirm_password')";
    
                $result = mysqli_query($conn, $sql);
                echo '<script type="text/javascript">
                    window.onload = function () { alert("Successfully Registered"); } 
                </script>';
                include 'login.html';
            }
            else{
                echo '<script type="text/javascript">
                    window.onload = function () { alert("Email Already Exist"); } 
                </script>'; 
                include 'signup.html';
            }
        }
     ?>
    </body>
</html>