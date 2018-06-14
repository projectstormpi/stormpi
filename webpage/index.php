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

    <link rel="stylesheet"
          href="https://unpkg.com/purecss-components@0.0.12/dist/pure-components.css"
          integrity="sha384-3vxDvOU9lXU+bcgTkQNhnflfhRt/EFEGLtd3jQn8vQRGGQlpBX9VOq4oIufzLOO9"
          crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/css1.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>

    <script src="//code.simplesvg.com/1/1.0.0-beta5/simple-svg.min.js"></script>

    <script src="js/js1.js"></script>


</head>

<body class="animatebody fadeIn">

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu" id="menuheading">
            <a class="pure-menu-heading" href="#layout">
                <!--<img src="img/logo.png" height="100" width="100">-->
                <h3 style="">Storm Pi</h3>
            </a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item">
                    <a href="#welcome-slide" class="pure-menu-link">Readings</a>
                </li>
                <li class="pure-menu-item menu-item-divided">
                    <a href="#sensorstatus" class="pure-menu-link">Sensoric</a>
                </li>
            </ul>
        </div>
    </div>
    <?php
    $host = "localhost";
    $user = "stormpi";
    $pass = "anubis3!";
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
    $result = mysqli_query($connection, "SELECT ID, Humidity, Temperature, Windchill, Pressure, DateTime, Altitude, Spectrum  from measuring_result ORDER BY DateTime DESC LIMIT 1;");
    $all_property = array();  //declare an array for saving property

    $row = mysqli_fetch_array($result);
    $humidity = $row['Humidity'];
    $temp = $row['Temperature'];
    $press = $row['Pressure'];
    $id = $row['ID'];
    $windchill = $row['Windchill'];
    $time = $row['DateTime'];
    $alt = $row['Altitude'];
    $spec = $row['Spectrum']
    //showing property
    ?>


    <div id="main">
        <div class="header">
            <div id="headertext">
                <h1>STORM PI</h1>
                <h2>An All-in-One weather solution</h2>
            </div>
        </div>

        <div class="pure-g weathercard" id="welcome-slide">

            <div class="pure-u-1 weatherbox1">
                <div class="row animate fadeIn" id="locationrow">
                    <h3 id="location">Location</h3>
                    <!--                    <span class="simple-svg icon:raphael-location icon-inline:false">::before</span>-->
                </div>
                <hr>
            </div>
            <div class="pure-u-md-2-3 pure-u-1 weatherbox2">
                <div class="row temp">
                    <h1 id="temp"><?php echo $temp . " "; ?></h1>
                    <span class="simple-svg icon:wi-celsius icon-inline:false">::before</span>
                    <span class="simple-svg icon:wi-thermometer icon-inline:false">::before</span>
                </div>
                <div class="row">
                    <h5 class="chill"><?php echo "feels like " . $windchill . " "; ?></h5>
                    <span class="simple-svg icon:wi-celsius icon-inline:false" id="smaller">::before</span>
                </div>
            </div>

            <div class="pure-u-md-1-3 pure-u-1 weatherbox3">
                <div class="row flex-start animate fadeIn">
                    <p id="weather-type">Weather type</p>
                    <div id='weather-icon'></div>
                </div>

                <div class="pure-u-1 rowcombo weatherbox4">
                    <div class="row flex-start">
                        <p id="humidity"><?php echo $humidity . " "; ?></p>
                        <span class="simple-svg icon:wi-humidity icon-inline:false">::before</span>
                    </div>
                    <div class="row flex-start">
                        <p id="pressure"><?php echo $press . " "; ?></p>
                        <span class="simple-svg icon:wi-barometer icon-inline:false">::before</span>
                    </div>
                </div>
                <div class="pure-u-1 rowcombo weatherbox5">
                    <div class="row flex-start">
                        <p id="pressure"><?php echo $alt . " m"; ?></p>
                        <span class="simple-svg icon:si-glyph:mountain icon-inline:false"></span>
                    </div>
                    <div class="row flex-start">
                        <p id="pressure"><?php echo $spec . " LUX"; ?></p>
                        <span class="simple-svg icon:mdi-track-light icon-inline:false"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <button class="tablink default">Temperature</button>
            <button class="tablink">Humidity</button>

            <div id="Temperature" class="tabcontent">
                <div class="container">
                    <br />
                    <div class="row1">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <!--       Chart.js Canvas Tag -->
                            <canvas id="day"></canvas>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>

            <div id="Humidity" class="tabcontent">
                <div class="container">
                    <br />
                    <div class="row1">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <!--       Chart.js Canvas Tag -->
                            <canvas id="day2"></canvas>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>

        </div>

        <hr id="sensorstatus">
        <div class="content">
            <h1 class="content-subhead">Sensoric</h1>
            <p>
                Build in Sensors
            </p>
            <h2 class="content-subhead">DHT-22</h2>
            <div class="pure-g">
                <div class="status pure-u-1-8"></div>
                <div class="pure-u-1-6">ACTIVE</div>
            </div>
            <p>
                DHT22 output calibrated digital signal. It utilizes exclusive digital-signal-collecting-technique
                and
                humidity
                sensing technology, assuring its reliability and stability.Its sensing elements is connected with
                8-bit
                single-chip
                computer.
                Every sensor of this model is temperature compensated and calibrated in accurate calibration chamber
                and
                the
                calibration-coefficient is saved in type of programme in OTP memory, when the sensor is detecting,
                it
                will cite
                coefficient from memory.
                Small size & low consumption & long transmission distance(20m) enable DHT22 to be suited in all
                kinds of
                harsh application occasions.
                Single-row packaged with four pins, making the connection very convenient
            </p>
            <h2 class="content-subhead">TSL2561</h2>
            <div class="pure-g">
                <div class="status pure-u-1-8"></div>
                <div class="pure-u-1-6">ACTIVE</div>
            </div>
            <p>
                The TSL2561 luminosity sensor is an advanced digital light sensor, ideal for use in a wide range of
                light situations. Compared to low cost CdS cells, this sensor is more precise, allowing for exact
                lux
                calculations and can be configured for different gain/timing ranges to detect light ranges from up
                to
                0.1 - 40,000+ Lux on the fly. The best part of this sensor is that it contains both infrared and
                full
                spectrum diodes! That means you can separately measure infrared, full-spectrum or human-visible
                light.
                Most sensors can only detect one or the other, which does not accurately represent what human eyes
                see
                (since we cannot perceive the IR light that is detected by most photo diodes)
            </p>
            <h2 class="content-subhead">BMP180</h2>
            <div class="pure-g">
                <div class="status pure-u-1-8"></div>
                <div class="pure-u-1-6">ACTIVE</div>
            </div>
            <p>
                This precision sensor from Bosch is the best low-cost sensing solution for measuring barometric
                pressure
                and temperature. Because pressure changes with altitude you can also use it as an altimeter! The
                sensor
                is soldered onto a PCB with a 3.3V regulator, I2C level shifter and pull-up resistors on the I2C
                pins.

                The BMP180 is the next-generation of sensors from Bosch, and replaces the BMP085. The good news is
                that
                it is completely identical to the BMP085 in terms of firmware/software - you can use our BMP085
                tutorial
                and any example code/libraries as a drop-in replacement. The XCLR pin is not physically present on
                the
                BMP180 so if you need to know that data is ready you will need to query the I2C bus.
            </p>
            <h2 class="content-subhead">DS18B20</h2>
            <div class="pure-g">
                <div class="status pure-u-1-8"></div>
                <div class="pure-u-1-6">ACTIVE</div>
            </div>
            <p>
                This is the latest DS18B20 1-Wire digital temperature sensor from Maxim IC. Reports degrees C with 9
                to
                12-bit precision, -55C to 125C (+/-0.5C). Each sensor has a unique 64-Bit'serial number etched into
                it -
                allows for a huge number of sensors to be used on one data bus. This is a wonderful part that is the
                corner stone of many data-logging and temperature control projects.
            </p>
        </div>
        <hr>
        <div class="content">
            <div class="footer">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-2">
                        <a href="https://github.com/projectstormpi" class="button footerbutton githubButton">Github</a>
                    </div>
                    <div class="pure-u-1 pure-u-md-1-2">
                        <a href="#" class="button footerbutton emailButton">Contact</a>
                    </div>
                    <div class="pure-u-1">
                        <p class="legal-copyright">
                            © 2018 - Present Project Storm Pi All rights reserved.
                        </p>
                        <a href="impressum.php" style="color:inherit">Legal</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="js/ui.js"></script>
</body>

</html>
