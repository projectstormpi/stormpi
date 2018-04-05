#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the humidity
#       by approaching the DHT22 sensor via I2C bus

import Adafruit_DHT


def get_humidity():
    humidity, temperature = Adafruit_DHT.read_retry(Adafruit_DHT.DHT22, 4)
    return humidity
