<?php
    require_once("database.php");// require database connection
    // min/max value of phone display size
    $query_size_min = mysqli_query($conn, "SELECT MIN(size) AS min FROM smartphones");
    $query_size_max = mysqli_query($conn, "SELECT MAX(size) AS max FROM smartphones");

    // min/max value of phone ram size
    $query_ram_min = mysqli_query($conn, "SELECT MIN(ram) AS min FROM smartphones");
    $query_ram_max = mysqli_query($conn, "SELECT MAX(ram) AS max FROM smartphones");

    // min/max value of phone memory size
    $query_memory_min = mysqli_query($conn, "SELECT MIN(memory) AS min FROM smartphones");
    $query_memory_max = mysqli_query($conn, "SELECT MAX(memory) AS max FROM smartphones");

    // min/max value of phone battery size
    $query_battery_min = mysqli_query($conn, "SELECT MIN(battery) AS min FROM smartphones");
    $query_battery_max = mysqli_query($conn, "SELECT MAX(battery) AS max FROM smartphones");

//creating variables min/max from db
//display size
$sizeMin = mysqli_fetch_assoc($query_size_min);
$sizeMin = round($sizeMin["min"], 1 );
$sizeMax = mysqli_fetch_assoc($query_size_max);
$sizeMax = round($sizeMax["max"], 1 );

//ram size
$ramMin = mysqli_fetch_assoc($query_ram_min);
$ramMin = round($ramMin["min"], 1 );
$ramMax = mysqli_fetch_assoc($query_ram_max);
$ramMax = round($ramMax["max"], 1 );

//memory size
$memoryMin = mysqli_fetch_assoc($query_memory_min);
$memoryMin = round($memoryMin["min"], 1 );
$memoryMax = mysqli_fetch_assoc($query_memory_max);
$memoryMax = round($memoryMax["max"], 1 );

//memory size
$batteryMin = mysqli_fetch_assoc($query_battery_min);
$batteryMin = round($batteryMin["min"], 1 );
$batteryMax = mysqli_fetch_assoc($query_battery_max);
$batteryMax = round($batteryMax["max"], 1 );

//creating array from variables
$json_arr = array(
    array(
        "sizeMinimum" => $sizeMin,
        "sizeMaximum" => $sizeMax
    ),
    array(
        "ramMinimum" => $ramMin,
        "ramMaximum" => $ramMax
    ),
        array(
        "memoryMinimum" => $memoryMin,
        "memoryMaximum" => $memoryMax
    ),
        array(
        "batteryMinimum" => $batteryMin,
        "batteryMaximum" => $batteryMax
    )
);
// creating json object from array
echo(json_encode($json_arr));
?>
