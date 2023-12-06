<?php
session_start();
try {
    include_once("objects/user.class.php");
    include_once("connexion-base.php");
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
?>