#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the temperature
#       by approaching the DHT22 sensor
#       and measuring the windchill temperature
#       by approaching the DS18B20 sensor

# 	    This script is using the
# 	    Adafruit Python DHT Sensor Library
# 	    For further information check out their GitHub
# 	    https://github.com/adafruit

import subprocess, Adafruit_DHT


def get_windchill_temperature():
    try:

        command = 'cat /sys/bus/w1/devices/28-0317607fb3ff/w1_slave | tail -c 6'
        return float(subprocess.check_output(command, shell=True)) / 1000

    except Exception:
        return None


def get_temperature():
    try:

        humidity, temperature = Adafruit_DHT.read_retry(Adafruit_DHT.DHT22, 4)
        return temperature

    except Exception:
        return None
