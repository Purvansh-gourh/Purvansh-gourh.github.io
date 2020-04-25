<?php
    session_start();
 $conn=mysqli_connect("localhost","root","","hotel_management_project");
    if(($_SESSION['Username']!="admin")){
        header('location: error_login.php');
    }
?>
 <!doctype html>
<html>

<head>
    <title>dashboard</title>
    <meta name="author" content="Purvansh" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!-- <link rel="stylesheet" href="css/mainstyle.css"> -->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="wrapper">
    <div class="navbar" id="navBar">
        <nav>
            <img src="images/logo.png"></<img>
            <!-- <div class="menubar">
                <ul>
                    <div style="display:none">
                    <li class="active"><a href="mainpage.php">Home</a></li>
                    <li><a>Gallery
                            <ul class="ulist">
                                <li><a href="mainpage.php#c1">Rooms</a></li>
                                <li><a href="playimg.html" target="_blank">Garden</a></li>
                                <li><a href="restraimg.html" target="_blank">Restaurant</a></li>
                            </ul>
                        </a></li>
                    <li onclick="on()"><a>About Us</a></li>
                    <li><a>Pricing
                            <ul class="ulist">
                                <li><a href="mainpage.php#cardcontainer">Rooms</a></li>
                                <li onclick="onprice()"><a>Restaurant</a></li>
                            </ul>
                        </a></li>
                    <li><a>Contact
                            <ul class="ulist">
                                <li class="contacticon"><a href="https://www.facebook.com/" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li class="contacticon"><a href="https://www.instagram.com" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li class="contacticon"><a href="mainpage.html#contact" target="blank"><i
                                            class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </a></li>
</div>
                    <li class="avatar">-->
                        <h1 class=admin>ADMIN PAGE</h1>
                
                        <a href="admin.php"><img src="images/avatar.png" id="avatarimg"></a>
                    <!-- </li>
                </ul>
            </div> -->
        </nav>
    </div>
    
    <div id="aboutusoverlay" class="overlayclass">
        <i class="fa fa-times fa-3x" id="closeoverlay" onclick="off()"></i>
        <h3><a>Hotel Grand Palazzo</a></h3>
        <p class="font-effect-3d-float">Established in 2005 with aim of providing world
            class facilities to customer
            and bringing tasty food from all across India at single place.
            We aim to offer you comfortable surroundings, great food and excellent service to make your stay truly
            enjoyable.

            Please take a look through our web site where you will find most of the information you need. Call us to
            discuss your
            hotel reservation, dining plans or function requirements.

            <br> We look forward to welcoming you soon.
        </p>
    </div>
    <div id="restrapricecover"></div>
    <div id="restraprice" class="restraprice">
        <i class="fa fa-times fa-3x" id="closeprice" onclick="offprice()"></i>
        <div class="priceimg">
            <div class="numbertext">1 / 3</div>
            <img src="images/juicedup(1).png" style="width:100%">
        </div>

        <div class="priceimg">
            <div class="numbertext">2 / 3</div>
            <img src="images/juicedup.png" style="width:100%">
        </div>

        <div class="priceimg">
            <div class="numbertext">3 / 3</div>
            <img src="images/juicedup(2).png" style="width:100%">>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="sidenav">
        <ul class="sidenavlist">
            <li>
                <a href="admin.php">MANAGE ROOM</a>
            </li>
            <li>
                <a href="viewbooking.php">VIEW BOOKINGS</a>
            </li>
            <li>
                <a href="viewcustomers.php">VIEW CUSTOMERS</a>
            </li>
            <li>
                <a href="logout.php" style="color: white;">Logout</a>
            </li>
        </ul>
    </div>
        <div class="user_detail">
            <?php
                $sql2="SELECT * FROM customer";
                $result1=mysqli_query($conn,$sql2);
                echo "<table border = 1>
                <tr>
                    
                    <th>Customer id</th>
                    <th>Customer Name</th>
                    <th>Customer Username</th>
                    <th>Customer Phone No</th>
                    <th>Permanent Address</th>
                    <th>Customer Email</th>
                </tr>";
                    while($row = mysqli_fetch_row($result1)) {
                        echo "<tr>";
                        echo "<td>" . $row[0]. " </td>";
                        echo "<td>" . $row[1]. " </td>";
                        // echo "<td>" . $get_id1['customer_name']. " </td>";
                        echo "<td>" . $row[2]. " </td>";
                        echo "<td>" . $row[3].  "</td>";
                        echo "<td>" . $row[4]. "</td>";
                        echo "<td>" . $row[5]. "</td>";
                        // echo "<td>" . $row[6]. "</td>";
                        // echo "<td>" . $get_id['room_price']. "</td>";
                        // echo"<td><a href='cancel_booking.php?booking_id=" . $row[0] . " class='confirmation''>Cancel</a></td>";
                        echo "</tr>";
                }
                
                echo "</table>";   
            ?>
        </div>
    </div>
</body>
<style>
    .user_detail{
        position:fixed;
        left:50%; 
        top:50%;
        transform:translate(-50%,-50%);
    }
    #avatarimg{
        border-radius:50%;  
        width:80px;
        height:60px;
        /* right:30px; */
    }
    .admin{
        color :white;
        /* transform:translate(-500px); */
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
	
        font-size:40px;
    }
    tr,td{
        padding:15px;
    }
    </style>
<script>
    
    function on() {

        document.getElementById("aboutusoverlay").style.display = "block";
        document.getElementById("aboutusoverlay").style.animationName = "dropfromtop";

        document.getElementById("aboutusoverlay").style.animationDuration = "1.3s";
    }

    function off() {
        document.getElementById("aboutusoverlay").style.display = "none";
    }
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("priceimg");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
    function onprice() {

        document.getElementById("restraprice").style.display = "block";
        document.getElementById("restrapricecover").style.display = "block";

        document.getElementById("restraprice").style.animationName = "dropfromtop";

        document.getElementById("restraprice").style.animationDuration = "1.3s";
        //
    }
    function offprice() {

        document.getElementById("restraprice").style.display = "none";
        document.getElementById("restrapricecover").style.display = "none";

    }
</script>

</html>