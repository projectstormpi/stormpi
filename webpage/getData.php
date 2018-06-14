<?php

$options = array
(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $db = new PDO('mysql:dbname=StormPi;host=127.0.0.1', 'stormpi', 'anubis3!', $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Error: " . $exception;
    exit();
}


$data = Array();
$mode = $_GET['mode'];

if ($mode == 'tem') {
    $query = 'SELECT Temperature FROM measuring_result;';
    $mode = 'Temperature';
} elseif ($mode == 'hum') {
    $query = 'SELECT Humidity FROM measuring_result;';
    $mode = 'Humidity';
}


try {
    foreach ($db->query($query) as $row) {
        array_push($data, $row[$mode]);
    }
} catch (PDOException $exception) {
    echo "Error: " . $exception;
    exit();
}

echo json_encode($data);