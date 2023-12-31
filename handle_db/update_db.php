<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("conection.php");

    session_start();
    $idUsers = intval($_SESSION["user_data"]["id_user"]);
    var_dump($idUsers);

    if (isset($_POST["name"]) && $_POST["name"] !== "") {
        $name = $_POST["name"];
        $mysqli->query("UPDATE users SET nombre = '$name' Where id_user = $idUsers ");
    }

    if (isset($_POST["bio"]) && $_POST["bio"] !== "") {
        $bio = $_POST["bio"];
        $mysqli->query("UPDATE users SET biografia = '$bio' Where id_user = $idUsers ");
    }
    if (isset($_POST["phone"]) && $_POST["phone"] !== "") {
        $telefono = $_POST["phone"];
        $mysqli->query("UPDATE users SET telefono = '$telefono' Where id_user = $idUsers");
    }

    if (isset($_FILES["image"]) && $_FILES["image"] !== "") {
        $image = $_FILES["image"];
        $type = $_FILES["image"]["type"];

        $typeString = substr($type, 0, 5);

        session_start();
        if ($typeString !== "image") {
            $_SESSION["error_type"] = "solo puedes subir imagenes.";
            header("location: ../views/edit.php");
        }
        if ($image["size"] > 10000000) {
            $_SESSION["error_size"] = "El archivo es muy grande";
            header("location: ../views/edit.php");
        }
        if ($typeString === "image" && $image["size"] < 10000000) {

            $dataImg = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

            require_once("conection.php");

            $mysqli->query("UPDATE users SET imagenblob = '$dataImg' Where id_user = $idUsers");
            $_SESSION["error_success"] = "Imagen subida correctamente :)";
            header("location: ../views/edit.php");
        };
    }

    $stmt = $mysqli->query("SELECT * FROM users Where id_user = $idUsers");
    if ($stmt->num_rows === 1) {
        $_SESSION["user_data"] = $stmt->fetch_assoc();
        header("location: ../views/profile.php");
    }
} else {
    echo " No esta accediendo desde post";
}
