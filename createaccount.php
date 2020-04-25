<?php
    session_start();
    unset($_SESSION['create_acc_message']);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST['name'];
$user = $_POST['uname'];
$a=$_POST['passwd'];
$pass = md5($a);
$email = $_POST['email'];
$addr = $_POST['addr'];
$mobile = $_POST['mobile'];
$b=$_POST['retype_passwd'];
$retype = md5($b);

    $_SESSION['FullName'] = $name;
    $_SESSION['Email'] = $email;
    $_SESSION['Password'] = $pass;
    $_SESSION['Username'] = $user;
    $_SESSION['Mobile'] = $mobile;
    $_SESSION['addr'] = $addr;
    $_SESSION['Retype'] = $retype;
    if(($retype!=$pass)){
        // $_SESSION['create_acc_message']=$pass;
        $_SESSION['create_acc_message']="Password does not match";
        header("location: createaccount_new.php");
    }
    else{

$conn=mysqli_connect("localhost","root","","hotel_management_project");
if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}

$length = strlen($mobile);
if($length != 10)
{
$_SESSION['create_acc_message'] = "Invalid Mobile Number !!!";
header("location: createaccount_new.php");
// header("location: error.php");
die();
}
else{
$sql2="SELECT * FROM user where `username`='$user'";
$result2=mysqli_query($conn,$sql2);
$num_rows=mysqli_num_rows($result2);
$_SESSION['dggg']=$num_rows;
if($num_rows==0){
$sql="INSERT INTO customer(customer_name,customer_username,customer_phone,customer_address,customer_email) VALUES ('$name','$user','$mobile','$addr','$email')";
$result=mysqli_query($conn,$sql);
// $num_rows=mysqli_num_rows($result);
$sql1="INSERT INTO user(username,pass) VALUES ('$user','$pass')";
$result1=mysqli_query($conn,$sql1);
    if($result){
            $_SESSION['Active'] = 0;
            $_SESSION['logged_in'] = true;

            $sql3 = "SELECT * FROM user WHERE username='$user'";
            $result3 = mysqli_query($conn, $sql3);
            $get_id = $result3->fetch_assoc();
            $_SESSION['id'] = $get_id['id'];
            
            $_SESSION['message1234'] =
                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";

            // $to      = $email;
            // $subject = "Hotel Grand Plazzo";
            // $message_body = "
            // Hello '.$user.',
            // Thank you for signing up! You are Successfully logged in!" ;

            // $check = mail( $to, $subject,$message_body);

            header("location: dashboard.php");
    }
    else{
        $_SESSION['create_acc_message'] = "Registration failed!";
        header("location: createaccount_new.php");
        // header("location: error.php");
    }
}
else{
     $_SESSION['create_acc_message'] = "User with this username already exists!";
     header("location: createaccount_new.php");
        //echo $_SESSION['message'];
        // header("location: error.php");
}
}
    }
}
?>
