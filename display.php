<?php
    $conn = mysqli_connect("localhost","root","","project");
    $output = array();
    $query = "SELECT * FROM smartphones";
    $result = mysqli_query($conn, $query);
    
if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
        {
        $output[] = $row;
    }
}
echo(json_encode($output));
?>