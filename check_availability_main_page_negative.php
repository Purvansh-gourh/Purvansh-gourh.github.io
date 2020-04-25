
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
        </div>
        <div id="restrapricecover"></div>
        <div id=checkcover>
            <a href="mainpage.php"><i class="fa fa-times fa-2x" id="closecheck"></i></a>
            <i class="fa fa-frown-o fa-5x" aria-hidden="true"></i>
            <p>Room Not Available</p>
            <a href="mainpage.php">back to home page</a>
        </div>

        <style>
            #restrapricecover{
                display:block;
                background:rgb(255,255,255,0.2);
                z-index:999;
            }
            #checkcover{
                border: 1px solid black;
                position:absolute;
                left: 50%;
                top: 50%;
                font-size:20px;
                transform: translate(-50%,-50%);
                background:rgb(255,255,255,0.75);
                color :black !important;
                height:300px;
                width:400px;
                z-index:9999;
                padding:15px;
                text-align:center;
            }
            #checkcover p{
                font-size:35px;
            }
            #checkcover a{
                font-size:15px;
            }
            #closecheck{
                top:2%;
                right:2%;
                position:absolute;
            }

            </style>

    </div>
</body>
</html>