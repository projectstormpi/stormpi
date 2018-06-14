#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the luminosity
#       by approaching the TSL2561 sensor via I2C bus


import smbus, time


bus = smbus.SMBus(1)


# returns [ Full Spectrum, Infrared Value, Visible Value ]
def take_measurements():
    try:

        bus.write_byte_data(0x39, 0x00 | 0x80, 0x03)
        bus.write_byte_data(0x39, 0x01 | 0x80, 0x02)

        time.sleep(0.5)

        data = bus.read_i2c_block_data(0x39, 0x0C | 0x80, 2)
        data1 = bus.read_i2c_block_data(0x39, 0x0E | 0x80, 2)

        # Convert data
        full = data[1] * 256 + data[0]
        ir = data1[1] * 256 + data1[0]
        vi = full - ir

        return recalculation(ir, vi)

    except Exception:
        return None, None, None


# Light loss calculation
def recalculation(visible, infrared):

    # Conversion

    full = visible + infrared

    return [full, infrared, visible]