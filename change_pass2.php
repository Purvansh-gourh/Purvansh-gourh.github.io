<?php
    session_start();
        if(($_SESSION['Username']=="admin")){
        header('location: error_login.php');
    }

    $conn=mysqli_connect("localhost","root","","hotel_management_project");
    if(!$conn){
        die("Connection Failed : " . mysqli_connect_error());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $user=$_SESSION['Username'];
                $full_name=$_SESSION['FullName'];
                $pass=($_SESSION['Password']);
                $addr=$_SESSION['addr'];
                $phone=$_SESSION['Mobile'];
                $currpass = md5($_POST['curr_password']);
                $newpass = md5($_POST['new_password']);
                $retypepass = md5($_POST['retype_password']);
                if(($currpass==$pass)){
                    if(($retypepass==$newpass )){
                        $sql1="UPDATE user SET `pass` = '$newpass' where username = '$user' ";
                        $result1=mysqli_query($conn,$sql1);
                        // $message="Password changed successfully";
                        // header("Location: dashboard.php");
                        $_SESSION['passwd_change_s']="Password Changed Successfully!! LOGIN AGAIN TO APPLY CHANGES..";
                        header("location: change_pass.php");
                    }
                    else{
                        // echo "alert('Password Does Not Match')";
                        // header("location: change_pass.php");
                        $_SESSION['passwd_change']="Password Does Not Match";
                        header("Location: change_pass.php");
                    }
                }
                else{
                        $_SESSION['passwd_change']="Invalid current Password Entered";
                        // $message="Password Does Not Match";
                        header("Location: change_pass.php");
                    // echo "alert('Invalid current Password Entered')";
                    // header("location: change_pass.php");
                }
            }

?>