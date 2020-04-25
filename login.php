<?php
session_start();
    if(($_SESSION['Username']=="admin")){
        header('location: admin.php');
    }
    if(isset($_SESSION['auth'])){
        header('location: dashboard.php');
    }

$flag=0;
$user=$_POST["username"];
$pass=md5($_POST["pass"]);
$user1="admin";
$conn=mysqli_connect("localhost","root","","hotel_management_project");
if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}
if($user==$user1){
        $sql7="SELECT * FROM administrator where admin_uname='$user' and admin_pass='$pass'";
        $result7=mysqli_query($conn,$sql7);
        $num_rows7=mysqli_num_rows($result7);
        if($num_rows7==1){
            $_SESSION['Password'] = $pass;
            $_SESSION['Username'] = $user;
            $_SESSION['FullName'] = "HAP";
            $_SESSION['addr'] = "Hostel 8, MNIT, JAIPUR";
            $_SESSION['Email'] = "2017ucp1032@mnit.ac.in";
            $_SESSION['Mobile'] = "9079324850";
            $_SESSION['auth']="true";
            $_SESSION['asd']="in";
            header("location: admin.php");
        }
        else{
            $_SESSION['message']="INVALID USER CREDENTIALS !";
            header("location: error_login.php");
        }
}
else{
$sql="SELECT * FROM user where username='$user' ";
$result=mysqli_query($conn,$sql);
$num_rows=mysqli_num_rows($result);

if($num_rows==0){
    $_SESSION['message']="PLEASE REGISTER TO LOGIN !";
    // $_SESSION['Username'] = "asd";
    header("location: error_login.php");
    // $flag=1;
}
else{
    
    $sql1="SELECT * FROM user where username='$user' and pass='$pass'";
    $result=mysqli_query($conn,$sql1);
    $num_rows1=mysqli_num_rows($result);
     if ($num_rows1 == 1)
        {
            $sql2="SELECT * FROM customer where customer_username='$user'";
            $result1=mysqli_query($conn,$sql2);
            $get_id=$result1->fetch_assoc();
            $_SESSION['Password'] = $pass;
            $_SESSION['Username'] = $user;
            $_SESSION['FullName'] = $get_id['customer_name'];
            $_SESSION['addr'] = $get_id['customer_address'];
            $_SESSION['Email'] = $get_id['customer_email'];
            $_SESSION['Mobile'] = $get_id['customer_phone'];
            //echo $_SESSION['Email']."  ".$_SESSION['Name'];
            $_SESSION["auth"]="true";
            // $_SESSION['message']="SUCCESSFULL LOGIN";
            header("location: dashboard.php");

        }
        else{
            // $_SESSION['message']="INVALID USER CREDENTIALS !";
            $_SESSION['message']=$pass;
            header("location: error_login.php");
            // $flag=1;
        }
    }  
}
?>