<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container-principal">
        <div class="logo">
            <img src="../imagen/devchallegues.png" alt="logo">
            <p>devchallenges</p>
        </div>
        <img src="" alt="">
        <div class="container-information">
            <p>Join thousands of learners from around the world</p>
            <p>Master web development by making real-life projects. There are multiple paths for you to choose</p>
        </div>

        <form class="container-form" action="../handle_db/registrer_db.php" method="post">
            <div class="container-Ingreso">
                <img src="../imagen/email.png" alt="email">
                <input type="email" name="email" placeholder="email">
            </div>
            <div class="container-Ingreso">
                <img src="../imagen/look.png" alt="">
                <input type="password" name="contrasena" placeholder="Password">
            </div>
            

            <button type="submit">Start coding now</button>

        </form>
        <footer class="contianer-footer">
            <p>or continue with these social profile</p>
            <div class="container-social">
                <div>
                    <img src="../imagen/google.png" alt="google">
                </div>
                <div>
                    <img src="../imagen/facebook.png" alt="facebook">
                </div>
                <div>
                    <img src="../imagen/twitter.png" alt="twitter">
                </div>
                <div>
                    <img src="../imagen/github.png" alt="github">
                </div>

            </div>
            <p>Adready a member? <a href="../views/login.php">Login</a> </p>
        </footer>
    </div>
    <footer class="containerFooter">
        <div class="footer">
            <p>created by CarlosValencia</p>
            <p>devChallenges.io</p>
        </div>

    </footer>

</body>

</html>