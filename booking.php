<?php
    // include "login.php"
    session_start();
    // // include "login.php";
    // if(unset($_SESSION['auth'])){
    //     header('location: error_login.php');
    // }
    if(($_SESSION['Username']=="admin")){
        header('location: error_login.php');
    }

if(isset($_SESSION["auth"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $check_in = $_POST['checkin'];
        $check_out = $_POST['checkout'];
        $addr = $_POST['addr'];
        $adult = $_POST['adult'];
        $room_type = $_POST['room'];
    }
    $conn=mysqli_connect("localhost","root","","hotel_management_project");
    if(!$conn){
        die("Connection Failed : " . mysqli_connect_error());
    }
    // echo $_SESSION['Password'];
    // print_r($_SESSION);
    $username=$_SESSION['Username'];
    $sql="select * from customer where customer_username='$username'";
    $result=mysqli_query($conn,$sql);
    $num_rows=mysqli_num_rows($result);
    if($num_rows==1){
        $get_id=$result->fetch_assoc();
        $_SESSION['id'] = $get_id['customer_id'];
        $sql2="SELECT * FROM rooms where room_availability=1 and room_type='$room_type'";
        $result2=mysqli_query($conn,$sql2);
        $num_rows2=mysqli_num_rows($result2);
        if($num_rows2>0){
        $row=mysqli_fetch_row($result2);
        $_SESSION['room_no']=$row[0];
        $curr=date("Y-m-d");
        $id=$get_id['customer_id'];
        $first=$row[0];
        $sql1="INSERT INTO bookings(`customer_id`,`room_no`,`st_date`,`end_date`,`adults`,`date_of_booking`) VALUES ('$id','$first','$check_in','$check_out','$adult','$curr')";
        $result1=mysqli_query($conn,$sql1);
        $sql2="UPDATE rooms SET room_availability=0,room_start_date='$check_in' , room_end_date='$check_out' where room_no=$first";
        $result2=mysqli_query($conn,$sql2);
        header("location: mybooking.php");
        }
        else{
            header("location:check_availability_main_page_negative.php");
        }
    }
    else{
         header("location:check_availability_main_page_negative.php");
    }
    // $sql="";
    // $result=mysqli_query($conn,$sql);

}
?>