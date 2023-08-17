<?php
$correo = $_POST["email"];
$contrasena = $_POST["contrasena"];
try {
    require_once("conection.php");

    $data = $mysqli->query("INSERT INTO users (email,psswrd) VALUES ('$correo','$contrasena');");
    var_dump($data);


    
}catch(mysqli_sql_exception $e) {
    echo "Error: " . $e;
}


?>