<?php

    $servername="localhost";
    $username="root";
    $password="";
    $db_name="hotel_management_project";
    $connection=new mysqli($servername,$username,$password,$db_name) or die("Connection Failed" . $connection->connect_error);
    
    
    $dateinput=$_POST['dateinput'];
    $dateoutinput=$_POST['dateoutinput'];
    $adultinput=$_POST['adultinput'];
    $roominput=$_POST['roominput'];
    echo $roominput;
    $sql="SELECT room_no,room_type FROM rooms WHERE room_type='$roominput' AND room_availability=1";
    //$sql="SELECT room_no,room_type FROM rooms";
    $result=mysqli_query($connection,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            // echo "room no".$row["room_no"]."--- type ".$row["room_type"]."<br>";
            header("Location: check_availability_main_page.php");
        }
    }
    else{
        header("Location: check_availability_main_page_negative.php");
    }
?>
    