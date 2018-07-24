<?php
require_once("database.php");// require database connection

//show and count resolutions which have 20 or more records in db
$query = mysqli_query($conn, "SELECT resolution AS res FROM smartphones WHERE NOT ISNULL(resolution) GROUP BY resolution HAVING COUNT(resolution) > 20 ORDER BY resolution");

//if is any row in query, create json
if(mysqli_num_rows($query) > 0){
    while($output = mysqli_fetch_assoc($query)){
        $json[] = $output;
    } 
    echo(json_encode($json));
}
?>
