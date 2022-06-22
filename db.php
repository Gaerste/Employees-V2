<?php

$con = mysqli_connect('localhost', 'root','','jsoninsert');

$filename = "db.json";

$data = file_get_contents($filename);

$array = json_decode($data,true);

echo "<pre>";
print_r($array);
echo "<pre>";

foreach($array as $value){
    $query = "INSERT INTO `employees` (`name`, 'email`, `photo`) VALUES (`".$value['name']."`,`".$value['email']."`,`".$value['photo']."`)";
    mysqli_query($con,$query);
}