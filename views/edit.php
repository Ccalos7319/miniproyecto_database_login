<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    echo "no estas logeado";
    die();
}
$data = $_SESSION["user_data"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="./profile.css">
    <script src="../java.js" defer></script>
</head>

<body>

    <head>
        <div class="container-head">
            <div class="logo">
                <img src="../imagen/devchallegues.png" alt="logo">
                <p>devchallenges</p>
            </div>
            <div class="container-menu">
                <?php
                require_once("../handle_db/conection.php");
                $idUsers = intval($_SESSION["user_data"]["id_user"]);
                $stmt = $mysqli->query("SELECT id_user,imagenblob FROM users Where id_user = $idUsers ;");

                while ($row = $stmt->fetch_assoc()) {
                    if (isset($row["imagenblob"])) {
                        $dataImg = base64_encode($row["imagenblob"]);
                        echo "
                <img src='data:image/jpg;base64, $dataImg'>
            ";
                    } else {
                        echo "No has subido una imagen ";
                    }
                }
                ?>
                <p><?php echo $_SESSION["user_data"]["nombre"]   ?></p>
                <img id="despliegue" src="../imagen/vector.png" alt="">



            </div>


        </div>
        <div id="menu">
            <div class="cajamenu">
                <img src="../imagen/account.png" alt="myProfile">
                <a href="../views/profile.php">My Profile</a>
            </div>
            <div class="cajamenu">
                <img src="../imagen/group.png" alt="chat">
                <a href="">Group Chat</a>
            </div>
            <div class="line"></div>
            <div class="exit">
                <img src="../imagen/exit.png" alt="logout">
                <a href="">Logout</a>
            </div>
        </div>
    </head>
    <section class="container-Principal-edit">
        <div class="back">
            <p>
            <p>
            <p>
                <p><</p>
                    <a href="./profile.php">Back</a>
        </div>


        <div class="sub-container">

            <div class="info-edit">
                <p>Change Info</p>
                <p>Changes will be reflected to every services</p>

            </div>
            <form action="../handle_db/update_db.php" enctype="multipart/form-data" class="container-form" method="post">

                <div class="container-img">


                    <?php
                    require_once("../handle_db/conection.php");
                    $idUsers = intval($_SESSION["user_data"]["id_user"]);
                    $stmt = $mysqli->query("SELECT id_user,imagenblob FROM users Where id_user = $idUsers ;");

                    while ($row = $stmt->fetch_assoc()) {
                        if (isset($row["imagenblob"])) {
                            $dataImg = base64_encode($row["imagenblob"]);
                            echo "
                <img src='data:image/jpg;base64, $dataImg'>
            ";
                        } else {
                            echo "No has subido una imagen ";
                        }
                    }
                    ?>




                    <label for="file-input">CHANGE PHOTO</label>
                    <input type="file" id="file-input" name="image"></input>
                </div>
                <div class="container-input">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php isset($data['nombre']) ? print($data['nombre']) : print('')    ?>">
                </div>
                <div class="contaier-input-bio">
                    <label for="bio">Bio</label>
                    <input type="text" id="bio" name="bio" value="<?php isset($data['biografia']) ? print($data['biografia']) : print('')    ?>">
                </div>

                <div class="container-input">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php isset($data['telefono']) ? print($data['telefono']) : print('')    ?>">
                </div>


                <div class="container-input">
                    <label for="email">Email</label>
                    <input type="email" id="email">
                </div>
                <div class="container-input">

                    <label for="password">Password</label>
                    <input type="password" id="password">
                </div>
                <button type="submit">Save</button>
            </form>


        </div>

    </section>
</body>

</html>