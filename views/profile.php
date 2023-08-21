<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    echo "no estas logeado";
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
                <a href="">My Profile</a>
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


    <div class="titulo">
        <p>Personal info</p>
        <p>Basic info, like your name and photo</p>
    </div>
    <section class="section">
        <div class="containerInfo">

            <form class="containerSubTitulo" action="./edit.php">
                <div>
                    <p>Profile</p>
                    <p>Some info may be visible to other people</p>
                </div>
                <div>
                    <button type="submit">Edit</button>
                </div>
            </form>

            <div class="containerProfile">
                <div class="info">
                    <label for="photo">PHOTO</label>
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
                </div>
                <div class="info">
                    <label for="name">NAME</label>
                    <P><?php echo $_SESSION["user_data"]["nombre"]   ?></P>
                </div>
                <div class="info">
                    <label for="bio">BIO</label>
                    <P><?php echo $_SESSION["user_data"]["biografia"]   ?></P>
                </div>
                <div class="info">
                    <label for="phone">PHONE</label>
                    <P><?php echo $_SESSION["user_data"]["telefono"]   ?></P>
                </div>
                <div class="info">
                    <label for="email">EMAIL</label>
                    <p><?php echo $_SESSION["user_data"]["email"]   ?></p>
                </div>
                <div class="info">
                    <label for="password">PASSWORD</label>
                    <P>***********</P>
                </div>
            </div>
        </div>

    </section>
    <footer class="containerFooter">
        <div class="footer">
            <p>created by CarlosValencia</p>
            <p>devChallenges.io</p>
        </div>

    </footer>









</body>

</html>