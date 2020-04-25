<?php
    session_start();
       if(($_SESSION['Username']=="admin")){
        header('location: error_login.php');
    }
    if(isset($_SESSION['auth'])){
        header('location: dashboard.php');
    }
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
</head>
<body>
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
            <div id="loginboxcover"></div>
    
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
    <div id="createaccount">
            <a href="mainpage.php"><i class="fa fa-times fa-2x" id="closecreateaccount"></i></a>
            <form action="createaccount.php" method="post">
                Name :<input type="text" name="name" id="ca_name" pattern="[a-zA-Z]+" placeholder="Enter your name here"
                    required>
                Username :<input type="text" name="uname" id="ca_username" placeholder="choose a username" required>
                Password :<input type="password" name="passwd" id="ca_pwd" placeholder="choose a password" required>
                Retype Password :<input type="password" name="retype_passwd" id="ca_repwd" placeholder="password must match"
                    required >
                Email-Id :<input type="email" name="email" id="ca_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    placeholder="enter valid email id" required>
                Address :<input type="text" name="addr" id="ca_addr" placeholder="enter full address" required>
                Phone :<input type="tel" name="mobile" id="ca_no" pattern="[0-9]{10}"
                    placeholder="enter 10 digit mobile number" required>
                <?php
                    if(isset($_SESSION['create_acc_message'])){
                        echo "<p style='color: red;'>".$_SESSION['create_acc_message']."</p>";
                        unset($_SESSION['create_acc_message']);
                    }
                    else{
                        echo "</br></br></br>";
                    }
                ?>
                
                <input type="submit">
            </form>
        </div>

        <style>
            #createaccount{
                display:block;
                z-index:9999;
            }
            #loginboxcover{
                display:block;
                top:0;
                left:0;
                z-index:999;
            }

            </style>
            <script>
                document.getElementById("navBar").style.background = "none";
                </script>

    </div>
</body>
</html>