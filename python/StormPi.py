#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script which collects data from every sensor
#       and return them formatted


import DHT22, BMP180, TSL2561, DS18B20


# Measuring temperature and humidity
temperature, humidity = DHT22.take_measurements()
windchill_temperature = DS18B20.get_windchill_temperature()

# Measuring luminosity
full_spectrum, infrared, visible = TSL2561.take_measurements()

# Measuring air pressure and altitude
pressure, altitude = BMP180.take_measurements()

print('Temperature: {}\n'
      'Windchill temperature: {}\n'
      'Luminosity: {}\n'
      'Humidity: {}\n'
      'Air pressure: {}\n'
      'Altitude: {}'.format(temperature, windchill_temperature, visible, humidity, pressure, altitude))
