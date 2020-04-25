<?php
    session_start();
    if(($_SESSION['Username']!="admin")){
        header('location: error_login.php');
    }
    

    if(isset($_SESSION["auth"])){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $room_no=$_POST['room_no'];
            $room=$_POST['room'];
            $room_availability=$_POST['room_availability'];
            $price=$_POST['price'];
            
        }
        $conn=mysqli_connect("localhost","root","","hotel_management_project");
        if(!$conn){
            die("Connection Failed : " . mysqli_connect_error());
        }
        $sql="UPDATE rooms SET room_type='$room',room_availability='$room_availability' where room_no='$room_no'" ;
        $result=mysqli_query($conn,$sql);
        $sql2="UPDATE rooms_price SET room_price='$price' where room_type='$room'";
        $result2=mysqli_query($conn,$sql2);
        // if($num_rows > 0 || $num_rows2 > 0){
            $_SESSION['admin_message']="SUCCESSFULLY UPDATED";
            // $_SESSION['why']="kdhgkdfhg";
       
        header("location:admin.php");
    }
    
?>