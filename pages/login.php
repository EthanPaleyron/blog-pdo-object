<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../SCSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://kit.fontawesome.com/2621df78fc.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <h1>MyBlog</h1>
        </nav>
    </header>
    <h2>Connexion</h2>

    <form action="login.php" method="post" enctype="multipart/form-data">
        <input type="text" name="user_name" placeholder="Ton nom d'utilisateur" autocomplete="off">
        <input id="password" type="password" name="password" placeholder="Ton mot de passe">
        <button id="eye" type="button"><i class="fa-solid fa-eye-slash"></i></button>
        <input type="submit" value="Connexion">
    </form>
    <?php
    session_start();
    var_dump($_SESSION);
    if (isset($_POST["user_name"]) && isset($_POST["password"])) {
        try {
            include_once("../objects/user.class.php");
            include_once("../connexion-base.php");
            $user = new User();
            $user->setUsername(htmlspecialchars($_POST["user_name"]));
            $user->setPassword($_POST["password"]);
            $userManager->login($user);
        } catch (Exception $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }
    ?>

    <script type="module" src="../JS/main.js"></script>
</body>

</html>