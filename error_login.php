<?php
    session_start();
    
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


    <!-- <div class="se-pre-con"></div> -->
    <div class="wrapper">
        <ul class="cb-slideshow">
            <li><img src="images/1.jpg"></li>
            <li><img src="images/2.jpg"></li>
            <li><img src="images/3.jpg"></li>
            <li><img src="images/4.jpg"></li>
        </ul>
        <div class="navbar" id="navBar">
            <nav>
                <a href="login.html" target="_blank"><img src="images/logo.png"></a>
                <div class="menubar">
                    <ul>
                        <li class="active"><a href="mainpage.php">Home</a></li>
                        <li><a>Gallery
                                <ul class="ulist">
                                    <li><a>Rooms</a></li>
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
                            <img src="images/avatar.png" id="avatarimg" onclick="showlogin()">
                        </li>
                    </ul>

                </div>
            </nav>
        </div>


        <!-- ...........login box popup .................... -->



        <div id="loginboxcover"></div>
        <div id="loginbox">
           <a href="mainpage.php"> <i class="fa fa-times fa-2x" id="closeloginform" onclick="offloginform()"></i></a>
            <form action="login.php" method="post">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="pass" placeholder="Enter password">
                <?php
                    if(isset($_SESSION['message'])){
                ?>
                <span style="color: red; font-size: 15px">Invalid credentials given</span><br><br>
                <?php
                    unset($_SESSION['message']);
                    }
                ?>
                <input type="submit" name="" value="Login">
                
                <!-- <a href="#">Forgot Password ?</a><br> -->
                <a href="createaccount_new.php" style="cursor:pointer;font-size: 15px;">Create Account</a><br>
            </form>
        </div>
                    <table class="forms" style="border-collapse: separate; border-spacing: 12px">
        <form name="check_availability_form" action="check_availability.php" method="POST">
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
                    <input type="submit" value="Check Availability" onclick="validate()">
                </td>
            </tr>
            </form>
        </table>

    <!-- --------------------end of first page------------------- -->

</body>
<style>
    #loginbox{
        display: block;
    }
    #loginboxcover{
        display:block;
    }

</html>
