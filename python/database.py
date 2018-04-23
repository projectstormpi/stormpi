#!/usr/bin/python

#       Version 1.0.0
#       Storm Pi Scripts
#       Author:     Christian Perl

#       Script which stores data
#       in a database (MySQL)


import MySQLdb as mdb, logging, time, datetime, os


def store_in_database(temperature, windchill, humidity, spectrum, infrared, visible, pressure, altitude):
    try:
        connection = mdb.connect("localhost", 'root', '', 'StormPi')

        with connection:
            cur = connection.cursor()

            cur.execute("INSERT INTO measuring_result VALUES (NULL, CURRENT_TIMESTAMP, %s, %s, %s, %s, %s, %s, %s, %s)",
                        (temperature, windchill, humidity, spectrum, infrared, visible, pressure, altitude))
    except:

        timestamp = datetime.datetime.fromtimestamp(time.time()).strftime('%Y-%m-%d %H:%M:%S')

        logging.basicConfig(filename="data.log",
                            format='',
                            level=logging.NOTSET)
        logging.info(timestamp, temperature, windchill, humidity, spectrum, infrared, visible, pressure, altitude)


def check_failed_data_handling():
    try:

        with open(r"./data.log") as lines:
            lines = lines.readlines()

            for line in lines:
                values = line.split(';')[:-1]

                for i in range(len(values)):
                    if values[i] == "None":
                        values[i] = None

                try:
                    connection = mdb.connect("localhost", 'root', '', 'StormPi')

                    with connection:
                        cur = connection.cursor()

                        cur.execute("INSERT INTO measuring_result VALUES (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                                    values)


                except:
                    return

            os.remove(r"./data.log")

    except:
        pass
