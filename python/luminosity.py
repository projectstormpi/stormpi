#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the luminosity
#       by approaching the TSL2561 sensor via I2C bus

import smbus, time


bus = smbus.SMBus(1)


def get_luminosity():
    try:

        bus.write_byte_data(0x39, 0x00 | 0x80, 0x03)
        bus.write_byte_data(0x39, 0x01 | 0x80, 0x02)

        time.sleep(0.5)

        data = bus.read_i2c_block_data(0x39, 0x0C | 0x80, 2)
        data1 = bus.read_i2c_block_data(0x39, 0x0E | 0x80, 2)

        # Convert data
        ch0 = data[1] * 256 + data[0]
        ch1 = data1[1] * 256 + data1[0]

        return [ch0, ch1, (ch0 - ch1)]

    except Exception:
        return None
