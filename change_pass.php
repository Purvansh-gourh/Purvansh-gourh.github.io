<?php
    session_start();
        if(($_SESSION['Username']=="admin")){
        header('location: error_login.php');
    }

    if(!isset($_SESSION['auth'])){
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
            <div class="menubar">
                <ul>
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
                                <li class="contacticon"><a href="mainpage.php#contact"><i
                                            class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </a></li>
                    <li class="avatar">
                        <a href="dashboard.php" ><img src="images/avatar.png" id="avatarimg"></a>
                    </li>
                </ul>
            </div>
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
                <a href="booknow.html">New Booking</a>
            </li>
            <li>
                <a href="mybooking.php">My Bookings</a>
            </li>
            <li>
                <a href="change_pass.php">Change Password</a>
            </li>
            <li>
                <a href="logout.php" style="color: white;">Logout</a>
            </li>
        </ul>
    </div>
        <div class="change_password">
            <?php
                $user=$_SESSION['Username'];
                $full_name=$_SESSION['FullName'];
                $pass=$_SESSION['Password'];
                $addr=$_SESSION['addr'];
                $phone=$_SESSION['Mobile'];
            ?>
            <h1> CHANGE PASSWORD </h1>
            <p align-content> <form method="post" action="change_pass2.php">
                <p> CURRENT PASSWORD : </p>
                <input type="password" name="curr_password" placeholder="Enter Current Password">
                <p>NEW PASSWORD : </p>
                <input type="password" name="new_password" placeholder="Enter New Password">
                <p>RETYPE PASSWORD : </p>
                <input type="password" name="retype_password" placeholder="Retype New Password">
                <?php
                    if(isset($_SESSION['passwd_change'])){
                        echo "<p style='color: red;'>" . $_SESSION['passwd_change'] . "</p>";
                        unset($_SESSION['passwd_change']);
                    }

                ?>
                <br>
                <br>
                <br> 
                <input type="submit" name="change_passwd" value="submit">
                <?php
                    if(isset($_SESSION['passwd_change_s'])){
                        echo "<p style='color: rgb(4, 158, 37); font-size:20px;'>" . $_SESSION['passwd_change_s'] . "</p>";
                        unset($_SESSION['passwd_change_s']);
                        // header("refresh:5;url= logout.php");
                    }

                ?>

            </form>
            </p>

</div>
<style>
    .change_password{
        position:fixed;
        left:50%; 
        top:50%;
        transform:translate(-50%,-50%);
    }
     input,select{
        width:300px;
        background :transparent;
        border :none;
        border-bottom:2px solid black;
        height:30px;
    }
    input[type="submit"] {
    border : 2px solid black;
    background : white;
    color:black;
    width:200px;
    margin-left:50px;
    border-radius: 20px 20px 20px 20px;
    /* width: 40%;   */
}
</style>
</body>
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