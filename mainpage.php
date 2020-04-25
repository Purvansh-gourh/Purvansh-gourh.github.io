<?php
    session_start();
    // if(!isset($_SESSION['auth'])){
    //     $_SESSION['auth']="False";
    // }
    // if(unset($_SESSION['auth'])){
    //     header('location: error_login.php');
    // // }
    
    //  include "login.php"
    $conn=mysqli_connect("localhost","root","","hotel_management_project");
    if(!$conn){
        die("Connection Failed : " . mysqli_connect_error());
    }
    $sql="SELECT * FROM rooms WHERE room_availability=0";
    //$sql="SELECT room_no,room_type FROM rooms";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        
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


<!doctype html>
<html>
<head>
    <title>hotel</title>
    <link rel="icon" href="images/images.png" type="image/x-icon">
    <meta name="author" content="Purvansh" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/mainstyle1.css">
    <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap&effect=3d" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap&effect=fire-animation|3d-float"
        rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/anim_back.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        window.onload = function () {
            window.scrollTo(0, 0);
        }
    </script>

</head>

<body>

    <!-- .............navigation and menu bar.....................  -->


    <div class="se-pre-con"></div>
    <div class="wrapper">
        <ul class="cb-slideshow">
            <li><img src="images/1.jpg"></li>
            <li><img src="images/2.jpg"></li>
            <li><img src="images/3.jpg"></li>
            <li><img src="images/4.jpg"></li>
        </ul>
        <div class="navbar" id="navBar">
            <nav>
                <a href="mainpage.php"><img src="images/logo.png"></a>
                <div class="menubar">
                    <ul>
                        <li class="active"><a href="mainpage.php">Home</a></li>
                        <li><a>Gallery
                                <ul class="ulist">
                                    <li><a href="#cardcontainer">Rooms</a></li>
                                    <li><a href="playimg.html" target="_blank">Garden</a></li>
                                    <li><a href="restraimg.html" target="_blank">Restaurant</a></li>
                                </ul>
                            </a></li>
                        <li onclick="on()"><a>About Us</a></li>
                        <li><a>Pricing
                                <ul class="ulist">
                                    <li><a href="#cardcontainer">Rooms</a></li>
                                    <li onclick="onprice()"><a>Restaurant</a></li>
                                </ul>
                            </a></li>
                        <li><a>Contact
                                <ul class="ulist">
                                    <li class="contacticon"><a href="https://www.facebook.com/" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li class="contacticon"><a href="https://www.instagram.com" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li class="contacticon"><a href="#contact"><i class="fa fa-whatsapp"></i></a></li>
                                </ul>
                            </a></li>
                        <li class="avatar">
                            <img src="images/avatar.png" id="avatarimg" onclick="showlogin()"></<img>
                            <?php
                            if(!isset($_SESSION["auth"])){
                                // echo $_SESSION["auth"];
                                echo "<script>
                                function showlogin() {
                                    document.getElementById('loginbox').style.display = 'block';
                                    document.getElementById('loginboxcover').style.display = 'block';

                                }</script>";
                            }
                            else{
                                echo "<script>
                                function showlogin() {
                                    location.href = 'dashboard.php';
                                }</script>";
                            }
                            ?>

                            <script>
                                // function showlogin() {
                                //     document.getElementById("loginbox").style.display = "block";
                                //     document.getElementById("loginboxcover").style.display = "block";

                                // }
                                function offloginform() {
                                    document.getElementById("loginboxcover").style.display = "none";
                                    document.getElementById("loginbox").style.display = "none";
                                }
                                // function createaccount() {
                                //     document.getElementById("loginbox").style.display = "none";
                                //     document.getElementById("createaccount").style.display = "block";
                                // }
                                // function createaccountclose() {
                                //     document.getElementById("loginboxcover").style.display = "none";
                                //     document.getElementById("createaccount").style.display = "none";

                                // }
                            </script>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>


        <!-- ...........login box popup .................... -->



        <div id="loginboxcover"></div>
        <div id="loginbox">
            <i class="fa fa-times fa-2x" id="closeloginform" onclick="offloginform()"></i>
            <form action="login.php" method="post">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username" value="">
                <p>Password</p>
                <input type="password" name="pass" placeholder="Enter password" value="">
                <input type="submit" name="" value="Login">
                <!-- <a href="#">Forgot Password ?</a><br> -->
                <a href="createaccount_new.php" style="cursor:pointer;color:darkblue;font-size: 15px;">Create Account</a><br>
            </form>
        </div>

        <!-- ..............check Availability.................... -->


        <table class="forms" style="border-collapse: separate; border-spacing: 12px">
        <form name="check_availability_form" onsubmit="return validate()" action="check_availability.php" method="POST">
            <tr>
                <td>
                <i class="fa fa-calendar"><span style="font-size:18px ;margin-left: 10px;">Check-in</span>
                    <input type="date" name="dateinput" class="checkIn" id="dateinput" required /></i>
                </td>
                <td>
                    <i class="fa fa-calendar"><span style="font-size:18px;margin-left: 10px;">Check-Out</span>
                    <input type="date" name="dateoutinput" class="checkOut" id="dateoutinput" required /></i>
                </td>
                <td>
                    <i class="fa fa-male"><span style="font-size:18px ;margin-left: 10px;">Adult</span>
                        <input type="number" name="adultinput" class="adult" value="1" min="1" max="4" id="adultinput" />

                    </i>
                </td>
                <td>
                    <i class="fa fa-bed"><span style="font-size:18px ;margin-left: 10px;">Room type</span>
                        <!-- <input type="number" class="roo" value="0" min="0" max="4" id="childinput" /> -->
                        <select name="roominput" class="roomselect" id="roominput">
                            <option name="ac" value="AC" selected>AC</option>
                            <option name="deluxe" value="Deluxe">Deluxe</option>
                            <option name="non-ac" value="Non-AC">Non-AC</option>
                        </select>
                    </i>
                </td>
                <td>
                    <input type="submit" value="Check Availability">
                </td>
            </tr>
            </form>
        </table>

        <!-- ..................script to validate input................... -->

        <script>
            function validate() {
                var d = document.getElementById('dateinput').value;
                var din = Date.parse(d);
                d = document.getElementById('dateoutinput').value;
                var dout = Date.parse(d);
                var dcurr = new Date();
                dcurr = Date.parse(dcurr);
                if (dcurr > din) {
                    alert('Invalid Check In Date');
                    return false;
                }
                if (dcurr > dout) {
                    alert('Invalid Check Out Date');
                    return false;
                }
                if (din > dout) {
                    alert('Invalid Dates');
                    return false;
                }
            }
        </script>


        <!-- ..............About Us popup.................... -->


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


        <!-- ...............restaurant price popup................. -->



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
    </div>
    <!-- --------------------end of first page------------------- -->


    <!-- ...................room booking cards................... -->


    <div class="rooms" id="cardcontainer" name="cardcontainer">
        <div class="card-container" id="card-container">
            <div class="card" id="c1">
                <img src="images/bedcard.jpg" alt="Denim Jeans" style="width:100%">
                <h1>AC Rooms</h1>
                <p class="price">Rs. 2500</p>
                
                <a onclick="booknow()">
                    <p><button>Book Now</button></p>
                </a>
            </div>
            <div class=" card" id="c2">
                <img src="images/doublebedcard.jpg" alt="Denim Jeans" style="width:100%">
                <h1>Deluxe Rooms</h1>
                <p class="price">Rs. 4000</p>
                
                <a onclick="booknow()">
                    <p><button>Book Now</button></p>
                </a>
            </div>
            <div class="card" id="c3">
                <img src="images/singlecard.jpg" alt="Denim Jeans" style="width:100%">
                <h1>Non AC Rooms</h1>
                <p class="price">Rs. 1500</p>
                <a onclick="booknow()">
                    <p><button>Book Now</button></p>
                </a>
            </div>
        </div>

        <!-- ............... scroll to top .......................... -->

        <div class="gotop" title="scroll to top" id="mybtn" onclick="topFunction()">
            <i class="fa fa-chevron-up fa-2x"></i>
        </div>
        <img src="images/wave.png" class="wavy">
    </div>


    <!-- ......................features description ............. -->

    <div class="feature">
        <div class="restrafeat">
            <img src="images/rest.png" alt="" id="f1">
            <p>Best Quality food available at unbelieveable prices</p>
        </div>
        <div class="roomfeat" id="f2">
            <img src="images/room.png">
            <p>Make your stay comfortable at our best quality rooms available in different variants</p>
        </div>
        <div class="playfeat" id="f3">
            <img src="images/play.png">
            <p>Let your children spend fun time at our playground and garden</p>
        </div>
    </div>


    <!-- ..............end container ........................... -->

    <div class="end">
        <span class="s1"></span>
        <span class="s2"></span>
        <div class="logoend">
            <img src="images/logo.png">
        </div>
        <div class="address">
        </div>
        <div class="contact" id="contact" name="contact">
        </div>
        <div class="font-effect-fire-animation">
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- <script src="js/jquery-sakura.min.js"></!--> -->

    
</body>

<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () { scrollFunction() };

    
            function booknow(){
                <?php
                    if(isset($_SESSION['auth'])){
                        ?> window.location.href="booknow.html";<?php
                    }
                    else{
                        ?>  showlogin();
                        <?php
                    }
                ?>
            }

        var check = function() {
            if (document.getElementById('ca_pwd').value ==
                document.getElementById('retype_passwd').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }

    // .........on scroll menubar change background and scroll
    //  ........to top button appears ........................

    function scrollFunction() {
        if (document.body.scrollTop > 130 || document.documentElement.scrollTop > 130) {
            document.getElementById("mybtn").style.display = "block";
        } else {
            document.getElementById("mybtn").style.display = "none";
        }
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            document.getElementById("navBar").style.background = "rgb(0, 0, 0, 0.7)";
            var b = document.getElementsByClassName('ulist');
            var i;
            for (i = 0; i < b.length; i++) {
                var c = b[i].children;
                var j;
                for (j = 0; j < c.length; j++) {
                    c[j].style.background = "rgb(0, 0, 0, 0.4)";
                }
            }
        } else {
            document.getElementById("navBar").style.background = "none";
            var b = document.getElementsByClassName('ulist');
            var i;
            for (i = 0; i < b.length; i++) {
                var c = b[i].children;
                var j;
                for (j = 0; j < c.length; j++) {
                    c[j].style.background = "transparent";
                }
            }
        }
    }


    // ................When the user clicks on the button,..........
    // ................scroll to the top of the document............
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }



    // ............... function to display about us popup...........
    function on() {

        document.getElementById("aboutusoverlay").style.display = "block";
        document.getElementById("aboutusoverlay").style.animationName = "dropfromtop";

        document.getElementById("aboutusoverlay").style.animationDuration = "1.3s";
    }

    // ..................function to hide about us popup..........
    function off() {
        document.getElementById("aboutusoverlay").style.display = "none";
    }


    // ...........script to change restaurant price images..........
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



    // ..............function to display restaurant price popup.....
    function onprice() {

        document.getElementById("restraprice").style.display = "block";
        document.getElementById("restrapricecover").style.display = "block";
        document.getElementById("restraprice").style.animationName = "dropfromtop";
        document.getElementById("restraprice").style.animationDuration = "1.3s";
    }

    //...............function to hide restaurant price popup........
    function offprice() {

        document.getElementById("restraprice").style.display = "none";
        document.getElementById("restrapricecover").style.display = "none";
    }
    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);
    
    document.getElementById('dateinput').valueAsDate = tomorrow;
    document.getElementById('dateoutinput').valueAsDate = tomorrow;

    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>




