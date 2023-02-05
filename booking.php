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
            $phone = $_POST["phone"]; 
            $adults_count = $_POST["adults_count"];
//            $child_count = $_POST["child_count"];
            $from_date = $_POST["from_date"];
            $to_date = $_POST["to_date"];
            $tour_package = $_POST["tour_package"];
            $comments = $_POST["comments"];
//            $sql = "Select * from booking where email='$email'";
//            $result = mysqli_query($conn, $sql);
//            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//           // $active = $row['active'];
//            $count = mysqli_num_rows($result);
//            if($count == 0){
                $sql = "INSERT INTO `booking` (name,email,phone,persons,tour_package,comments) VALUES ('$name','$email', '$phone','$adults_count','$tour_package','$comments')";
    
                $result = mysqli_query($conn, $sql);
              
               $sq = "SELECT * FROM package WHERE place = '$tour_package'";
               $res = mysqli_query($conn,$sq);
               $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
               
               $amount = $adults_count * $row['amount'];
                
//                include 'login.html';
//            else{
//                echo '<script type="text/javascript">
//                    window.onload = function () { alert("Email Already Exist"); } 
//                </script>'; 
//                include 'signup.html';
//            }
        }
     ?>
    </body>
    <br>\<!-- comment -->
    <h4> Booking successful for your tour to <?php echo $tour_package;?></h4><br><!-- comment -->
    <h5>The amount is <?php echo $amount;?></h5>
</html>
