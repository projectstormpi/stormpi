#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script which stores data
#       in a database (MySQL)


import MySQLdb as mdb


def storeInDatabase(Temperature, Windchill, Humidity, Spectrum, Infrared, Visible, Pressure, Altitude):
    connection = mdb.connect("localhost", 'root', '', 'StormPi')

    with connection:
        cur = connection.cursor()

        cur.execute("INSERT INTO temperatures VALUES (NULL, CURRENT_TIMESTAMP, %s, %s, %s, %s, %s, %s, %s, %s)",
                    (Temperature, Windchill, Humidity, Spectrum, Infrared, Visible, Pressure, Altitude))


def getData():
    connection = mdb.connect("localhost", 'root', '', 'StormPi')
    data = []

    with connection:
        cur = connection.cursor()

        cur.execute("SELECT * FROM measuring_result")

        for row in cur.fetchall():
            data.append(row[0])

        return data
