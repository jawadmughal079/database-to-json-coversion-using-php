<?php

include 'database.php';

$query = "SELECT * FROM insertstudent";


// first step to fetch all the data from the data base

$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo "<br><pre><br>";
// print_r($rows);
// echo "<br></pre><br>";

// store the data json data into output 
$output = json_encode($rows, JSON_PRETTY_PRINT);

// set the file name 
$fileName = 'newjson.json';
// get the all the data from the json file 
$fileData = file_get_contents($fileName);
// echo $fileData;


// now concaternate the all the data 
$fileData .= $output;
echo $fileData;




if (file_put_contents('newjson.json', $fileData)) {
    echo 'file ma data save hu gaya ha ';
} else {
    echo 'data is not creadted';
}
