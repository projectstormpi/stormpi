#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script which collects data from every sensor
#       and return them formatted


import DHT22, BMP180, TSL2561, DS18B20, database, logging


def format_measurement(num):
    if num is None:
        return None
    else:
        return round(float(num), 2)


database.check_failed_data_handling()


try:

    # Measuring temperature and humidity
    temperature, humidity = DHT22.take_measurements()
    windchill_temperature = DS18B20.take_measurements()

    # Measuring luminosity
    full_spectrum, infrared, visible = TSL2561.take_measurements()

    # Measuring air pressure and altitude
    pressure, altitude = BMP180.take_measurements()

    database.store_in_database(format_measurement(temperature),
                               format_measurement(windchill_temperature),
                               format_measurement(humidity),
                               format_measurement(full_spectrum),
                               format_measurement(infrared), format_measurement(visible),
                               format_measurement(pressure),
                               format_measurement(altitude))

except Exception:

    logging.basicConfig(filename="error.log", level=logging.DEBUG)
    logging.exception("message")
