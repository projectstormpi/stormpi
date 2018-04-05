#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script for measuring the air pressure
#       by approaching the BMP180 sensor via I2C bus

import smbus, time

bus = smbus.SMBus(1)


def get_air_pressure():
    try:

        # Read data
        data = bus.read_i2c_block_data(0x77, 0xAA, 22)

        # Convert the data
        a_c1 = data[0] * 256 + data[1]
        if a_c1 > 32767:
            a_c1 -= 65535
        a_c2 = data[2] * 256 + data[3]
        if a_c2 > 32767:
            a_c2 -= 65535
        a_c3 = data[4] * 256 + data[5]
        if a_c3 > 32767:
            a_c3 -= 65535
        a_c4 = data[6] * 256 + data[7]
        a_c5 = data[8] * 256 + data[9]
        a_c6 = data[10] * 256 + data[11]
        b1 = data[12] * 256 + data[13]
        if b1 > 32767:
            b1 -= 65535
        b2 = data[14] * 256 + data[15]
        if b2 > 32767:
            b2 -= 65535
        m_b = data[16] * 256 + data[17]
        if m_b > 32767:
            m_b -= 65535
        m_c = data[18] * 256 + data[19]
        if m_c > 32767:
            m_c -= 65535
        m_d = data[20] * 256 + data[21]
        if m_d > 32767:
            m_d -= 65535

        time.sleep(0.5)

        # Enable temperature measurement
        bus.write_byte_data(0x77, 0xF4, 0x2E)

        time.sleep(0.5)

        # Read data
        data = bus.read_i2c_block_data(0x77, 0xF6, 2)

        # Convert data
        temp = data[0] * 256 + data[1]

        # Enable pressure measurement
        bus.write_byte_data(0x77, 0xF4, 0x74)

        time.sleep(0.5)

        # Read data
        data = bus.read_i2c_block_data(0x77, 0xF6, 3)

        # Convert the data
        pres = ((data[0] * 65536) + (data[1] * 256) + data[2]) / 128

        # Calibration
        x1 = (temp - a_c6) * a_c5 / 32768.0
        x2 = (m_c * 2048.0) / (x1 + m_d)
        b5 = x1 + x2
        b6 = b5 - 4000
        x1 = (b2 * (b6 * b6 / 4096.0)) / 2048.0
        x2 = a_c2 * b6 / 2048.0
        x3 = x1 + x2
        b3 = (((a_c1 * 4 + x3) * 2) + 2) / 4.0
        x1 = a_c3 * b6 / 8192.0
        x2 = (b1 * (b6 * b6 / 2048.0)) / 65536.0
        x3 = ((x1 + x2) + 2) / 4.0
        b4 = a_c4 * (x3 + 32768) / 32768.0
        b7 = ((pres - b3) * (25000.0))
        pressure = 0.0

        if b7 < 2147483648L:
            pressure = (b7 * 2) / b4
        else:
            pressure = (b7 / b4) * 2

        x1 = (pressure / 256.0) * (pressure / 256.0)
        x1 = (x1 * 3038.0) / 65536.0
        x2 = ((-7357) * pressure) / 65536.0
        pressure = (pressure + (x1 + x2 + 3791) / 16.0) / 100

        return pressure

    except Exception:
        return None
