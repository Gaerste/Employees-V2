<?php

$con = mysqli_connect('localhost', 'root','','employees');

$filename = "employees.json";

$data = file_get_contents($filename);

$array = json_decode($data,true);

echo "<pre>";
print_r($array);
echo "<pre>";

foreach($array as $value){
    $query = "INSERT INTO `emplo` (`name`, 'age`, `lastName`) VALUES (`".$value['name']."`,`".$value['age']."`,`".$value['lastName']."`)";
    mysqli_query($con,$query);
}