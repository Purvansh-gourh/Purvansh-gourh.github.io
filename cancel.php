<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","hotel_management_project");
    // $booking_id = $_GET['booking_id'];
    // $sql3="DELETE * FROM bookings where booking_id='$booking_id'";
    // $result3=mysqli_query($conn,$sql3);
    // header("location: mybooking.php");


?>

                <!-- <script>
                    function myFunction() {
                    var txt;
                    var r = confirm("Do you want to Cancel");
                    if (r == true) {
                        <?php 
                        $sql3="DELETE * FROM bookings where booking_id='$id'";
                        $result3=mysqli_query($conn,$sql3);
                        // $num_rows=mysqli_num_rows($result3);
                        echo 'alert("Booking Cancelled Successfully")';
                        header("location: mybooking.php");
                        ?>
                    } 
                    else {
                        
                    }
                    document.getElementById("demo").innerHTML = txt;
                    }
                    </script> -->

    