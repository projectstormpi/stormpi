<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Storm Pi</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="css/grid.css">
    <!--<![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/layout/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="css/layout/side-menu.css">
    <!--<![endif]-->
    <link rel="stylesheet" type="text/css" href="css/css1.css">

    <link rel="stylesheet"
          href="https://unpkg.com/purecss-components@0.0.12/dist/pure-components.css"
          integrity="sha384-3vxDvOU9lXU+bcgTkQNhnflfhRt/EFEGLtd3jQn8vQRGGQlpBX9VOq4oIufzLOO9"
          crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

</head>

<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">Storm Pi</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item">
                    <a href="#readings" class="pure-menu-link">Readings</a>
                </li>
                <li class="pure-menu-item menu-item-divided">
                    <a href="#sensorstatus" class="pure-menu-link">Sensor Status</a>
                </li>
                <li class="pure-menu-item">
                    <a href="#about" class="pure-menu-link">About</a>
                </li>
                <li class="pure-menu-item">
                    <a href="#contact" class="pure-menu-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>Storm Pi</h1>
            <h2>An all in One weather solution</h2>
        </div>
        <hr hidden id="readings">
        <div class="content">
            <h1 class="content-subhead">Readings</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db_name = "StormPi";

            //create connection
            $connection = mysqli_connect($host, $user, $pass, $db_name);

            //test if connection failed
            if (mysqli_connect_errno()) {
                die("connection failed: "
                    . mysqli_connect_error()
                    . " (" . mysqli_connect_errno()
                    . ")");
            }

            //get results from database
            $result = mysqli_query($connection, "SELECT Humidity, Temperature, Pressure from measuring_result ORDER BY DateTime DESC LIMIT 1;");
            $all_property = array();  //declare an array for saving property

            $row = mysqli_fetch_array($result);
            $humidity = $row['Humidity'];
            $temp = $row['Temperature'];
            $press = $row['Pressure'];
            //showing property
            ?>
            <div class="pure-g">
                <div class="pure-u-1 pure-u-md-1-3">
                    <h2 class="content-subhead"> Humidity </h2>
                    <span class="displaynumber"> <?php echo $humidity; ?> </span>
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <h2 class="content-subhead"> Temperature </h2>
                    <span class="displaynumber"> <?php echo $temp; ?> </span>
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <h2 class="content-subhead"> Pressure </h2>
                    <span class="displaynumber"> <?php echo $press; ?> </span>
                </div>
            </div>
        </div>
        <hr id="sensorstatus">
        <div class="content">
            <h1 class="content-subhead">Status</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h2 class="content-subhead">DHT-22</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h2 class="content-subhead">Pressure-Sensor</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <hr id="about">
        <div class="content">
            <h1 class="content-subhead">About</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h2 class="content-subhead">The Project</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h2 class="content-subhead">Documentation</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <hr id="contact">
        <div class="content">
            <h1 class="content-subhead">Team</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h2 class="content-subhead">Christian Perl</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h2 class="content-subhead">Pascal Skupa</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="content">
            <div class="footer">
                <div class="legal pure-g">
                    <div class="pure-u-1 u-sm-1-2">
                        <p class="legal-license">
                            This site is built with &lt;3 using Pure v1.0.0<br>
                            All code on this site is licensed under the <a
                                    href="https://github.com/pure-css/pure-site/blob/master/LICENSE.md">Yahoo BSD
                                License</a> unless otherwise stated.
                        </p>
                    </div>

                    <div class="pure-u-1 u-sm-1-2">
                        <ul class="legal-links">
                            <li><a href="https://github.com/pure-css/pure/">GitHub Project</a></li>
                            <li><a href="https://hackerone.com/yahoo/">Security Contact Info</a></li>
                        </ul>

                        <p class="legal-copyright">
                            &copy; 2014 - Present Yahoo! Inc. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script src="js/ui.js"></script>

</body>

</html>
