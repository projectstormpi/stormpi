#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the windchill temperature
#       by approaching the DS18B20 sensor


import subprocess, re


# returns [ temperature ] 
def take_measurements():
    try:

        command = 'cat /sys/bus/w1/devices/28-0317607fb3ff/w1_slave 2>/dev/null | tail -n 1'
        match = re.search('(?<=t=)-?\d+', str(subprocess.check_output(command, shell=True)))
        return float(match.group(0)) / 1000

    except Exception:
        return None
