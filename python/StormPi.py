#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script which collects data from every sensor
#       and return them formatted


import sys, temperature, luminosity, humidity, air_pressure

# Measuring temperature
temp = temperature.get_temperature()
temp_feel = temperature.get_windchill_temperature()

# Measuring luminosity
lum = luminosity.get_luminosity()

# Measuring humidity
hum = humidity.get_humidity()

# Measuring air pressure
air = air_pressure.get_air_pressure()

print(
    'Temperature: {}\nWindchill temperature: {}\nLuminosity: {}\nHumidity: {}\nAir pressure: {}'.format(temp, temp_feel,
                                                                                                        lum, hum, air))
