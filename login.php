<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
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
                session_start();
                $username = $_POST["username"]; 
                $password = $_POST["password"];
                if($username == 'admin' and $password == 'admin'){
                    include 'tours-full.html';
                }
                else{
                    $sql = "SELECT * FROM registration WHERE username = '$username' and password = '$password'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $count = mysqli_num_rows($result);
                    if($count == 1){
                    #session_register("email");
                    $_SESSION['login_user'] = $username;
                    echo '<script type="text/javascript">
                        window.onload = function () { alert("Login Successfull"); } 
                    </script>';
                    include 'home2.html';
                    }
                    else{
                        echo '<script type="text/javascript">
                        window.onload = function () { alert("Invalid Credentials! Sign up if you have not!"); } 
                    </script>';
                        include 'login.html';
                }
                }
             
                
            }
        ?>
    </body>
</html>
