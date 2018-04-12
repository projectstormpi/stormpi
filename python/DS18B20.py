#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the windchill temperature
#       by approaching the DS18B20 sensor


import subprocess


# returns [ temperature ] 
def take_measurements():
    try:

        command = 'cat /sys/bus/w1/devices/28-0317607fb3ff/w1_slave | tail -c 6'
        return float(subprocess.check_output(command, shell=True)) / 1000

    except Exception:
        return None


def get_windchill_temperature():
    try:

        temp = take_measurements()
        return temp

    except Exception:
        return None
