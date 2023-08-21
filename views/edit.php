<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    echo "no estas logeado";
    die();
}
$data = $_SESSION["user_data"];
var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>

    <section class="container-Principal-edit">
        <div class="back">
            <p>
                << /p>
                    <a href="./profile.php">Back</a>
        </div>


        <div class="sub-container">

            <div class="info-edit">
                <p>Change Info</p>
                <p>Changes will be reflected to every services</p>

            </div>
            <form action="../handle_db/update_db.php" class="container-form" method="post">

                <div class="container-img">
                    <img src="" alt="">
                    <a href="">CHANGE PHOTO</a>
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