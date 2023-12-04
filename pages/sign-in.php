<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../SCSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://kit.fontawesome.com/2621df78fc.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <h1>MyBlog</h1>
        </nav>
    </header>
    <h2>Inscription</h2>

    <form action="sign-in.php" method="post" enctype="multipart/form-data">
        <input type="text" name="user_name" placeholder="Nom d'utilisateur" autocomplete="off">
        <input id="password" type="password" name="password" placeholder="Mot de passe">
        <button id="eye" type="button"><i class="fa-solid fa-eye-slash"></i></button>
        <input type="submit" value="S'inscrire">
    </form>

    <?php
    session_start();
    if (isset($_POST["user_name"]) && isset($_POST["password"])) {
        try {
            include_once("../objects/user.class.php");
            include_once("../connexion-base.php");
            $user = new User();
            $user->setUsername(htmlspecialchars($_POST["user_name"]));
            $user->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
            $userManager->signIn($user);
        } catch (Exception $e) {
            if ($e->getCode() === "23000") {
                echo "<p class='error'>Ce nom d'utilisateur est déjà pris</p>";
            } else {
                throw new InvalidArgumentException($e->getMessage());
            }
        }
    }
    ?>
    <script type="module" src="../JS/main.js"></script>
</body>

</html>