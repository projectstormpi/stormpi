#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the temperature
#       by approaching the DHT22 sensor
#       and measuring the windchill temperature
#       by approaching the DS18B20 sensor

import subprocess, Adafruit_DHT


def get_windchill_temperature():
    return int(subprocess.check_output('cat ~/update-manager.log | tail -c 6', shell=True)) / 1000


def get_temperature():
    humidity, temperature = Adafruit_DHT.read_retry(Adafruit_DHT.DHT22, 4)
    return temperature
