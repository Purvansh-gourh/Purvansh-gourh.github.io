<?php
$conn=mysqli_connect("localhost","root","","hotel_management_project");
    if(!$conn){
        die("Connection Failed : " . mysqli_connect_error());
    }
    $sql="SELECT * FROM rooms WHERE room_availability=0";
    //$sql="SELECT room_no,room_type FROM rooms";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        echo "<script>alert('dfvdfsvj');</script>";
        while($row = mysqli_fetch_row($result)){
            $curr=date("Y-m-d");
            $dateTimestamp1 = strtotime($row[4]); 
            $dateTimestamp2 = strtotime($curr); 
            if($dateTimestamp1 < $dateTimestamp2 ){
                $sql1="UPDATE rooms SET `room_availability` = 1,`room_start_date`=NULL,`room_end_date`=NULL where room_no='$row[0]'";
                $result1=mysqli_query($conn,$sql1);

                $sql3="DELETE FROM bookings where room_no='$row[0]'";
                $result3=mysqli_query($conn,$sql3);
            }
            // echo "room no".$row["room_no"]."--- type ".$row["room_type"]."<br>";
        }
    }
    // header('location: mainpage.php');

?>