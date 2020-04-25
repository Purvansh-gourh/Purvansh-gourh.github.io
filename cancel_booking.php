<?php
    session_start();
        if(($_SESSION['Username']=="admin")){
        header('location: error_login.php');
    }

    if(!isset($_SESSION['auth'])){
        header('location: error_login.php');
    }
    $conn=mysqli_connect("localhost","root","","hotel_management_project");
    $booking_id = $_GET['booking_id'];
    $sql1="UPDATE rooms SET `room_availability` = 1,`room_start_date`=NULL,`room_end_date`=NULL where room_no in(Select room_no from bookings where booking_id='$booking_id')";
    $result1=mysqli_query($conn,$sql1);
    // $num_rows1=mysqli_num_rows($result1);
    // echo $num_rows1;
    
    $sql3="DELETE FROM bookings where booking_id='$booking_id'";
    $result3=mysqli_query($conn,$sql3);
    header("location: mybooking.php");
    // echo "$booking_id";

?>

