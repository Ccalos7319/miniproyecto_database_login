<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["email"] !== "" && $_POST["contrasena"] !== "") {
    $correo = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    try {
        $hash = password_hash($contrasena,PASSWORD_DEFAULT);

        require_once("./conection.php");
        $data = $mysqli->query("INSERT INTO users (email,psswrd) VALUES ('$correo','$hash');");
        header("location: ../views/login.php");
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e;
    }
}else {
    echo "No hay datos ingresados,ingrese los datos";
};
