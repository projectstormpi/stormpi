#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the temperature
#       and the humidity by approaching the DHT22 sensor

# 	This script is using the
# 	Adafruit Python DHT Sensor Library
# 	For further information check out their GitHub
# 	https://github.com/adafruit


import Adafruit_DHT


# returns [ humidity, temperature ]
def take_measurements():
    try:

        humidity, temperature = Adafruit_DHT.read_retry(Adafruit_DHT.DHT22, 4)
        return humidity, temperature

    except Exception:
        return None, None
