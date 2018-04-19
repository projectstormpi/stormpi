#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script which collects data from every sensor
#       and return them formatted


import DHT22, BMP180, TSL2561, DS18B20, logging

try:

    # Measuring temperature and humidity
    temperature, humidity = DHT22.take_measurements()
    windchill_temperature = DS18B20.take_measurements()

    # Measuring luminosity
    full_spectrum, infrared, visible = TSL2561.take_measurements()

    # Measuring air pressure and altitude
    pressure, altitude = BMP180.take_measurements()

    print(
        't={};w={};h={};f={};i={};v={};p={};a={};'.format(round(float(temperature), 2),
                                                          round(float(windchill_temperature), 2),
                                                          round(float(humidity), 2),
                                                          round(float(full_spectrum), 2),
                                                          round(float(infrared), 2), round(float(visible), 2),
                                                          round(float(pressure), 2),
                                                          round(float(altitude), 2)))

except Exception:

    logging.basicConfig(filename="error.log", level=logging.DEBUG)
    logging.exception("message")
