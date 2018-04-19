#       Version 1.0.0
#       Storm Pi Database
#       Author:     Christian Perl

#       This is the database for Project Storm Pi
#       It contains all needed information
#       for creating charts

# Drops
DROP DATABASE IF EXISTS StormPi;
DROP TABLE IF EXISTS measuring_result;


# Database
CREATE DATABASE IF NOT EXISTS StormPi;
USE StormPi;



# Tables
CREATE TABLE IF NOT EXISTS measuring_result
(
  ID              INTEGER AUTO_INCREMENT,
  DateTime        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Temperature     FLOAT,
  Windchill       FLOAT,
  Humidity        FLOAT,
  Spectrum        FLOAT,
  Infrared        FLOAT,
  Visible         FLOAT,
  Pressure        FLOAT,
  Altitude        FLOAT,
  PRIMARY KEY (ID)
);

# Selects
SELECT * FROM measuring_result;
