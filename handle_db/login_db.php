<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["email"] !== "" && $_POST["contrasena"] !== "") {

    $correo = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    try {

        require_once("./conection.php");
        $statament = $mysqli->query("SELECT * FROM users WHERE email='$correo';");
   

        if ($statament->num_rows === 1) {
          $data = $statament->fetch_assoc();//me devuelve un objeto con clave valor
    
          $hash = $data["psswrd"];
    
          $verify = password_verify($contrasena,$hash);
          if($verify) {
              session_start();
            $_SESSION["user_data"] = $data;
            
            header("location: ../views/profile.php");
    
          } else {
            echo "las credenciales no coinciden";
          }
    
        }else {
          echo "No existe un usuario ...";
        }
    

    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e;
    }
} else {
    echo "No hay datos ingresados,ingrese los datos";
};
