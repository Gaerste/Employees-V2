<?php 
include("conection.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["last_name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$city = $_POST["city"];
$streetaddress = $_POST["street_address"];
$state = $_POST["state"];
$age = $_POST["age"];
$postalcode = $_POST["postal_code"];
$phonenumber = $_POST["phone_number"];

$insertar = "INSERT INTO employees(nombre,last_name,email,gender,city,street_address,state,age,postal_code,phone_number)VALUES('$nombre','$apellido',
'$email',
'$gender',
'$city',
'$streetaddress',
'$state',
'$age',
'$postalcode',
'$phonenumber')";

$resultado = mysqli_query($conexion, $insertar);
if ($resultado){
    echo "<script> alert ('Se ha registrado el usuario con éxito');
    window.location='/Employees-V2'";
} else {
        echo"<script> alert('No se pudo registrar');
        window.history.go(-1);
        </script>";
    }
