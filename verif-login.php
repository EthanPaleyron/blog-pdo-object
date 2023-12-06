<?php
session_start();
try {
    include_once("objects/user.class.php");
    include_once("connexion-base.php");
    $user = new User();
    $user->setUsername(htmlspecialchars($_POST["user_name"]));
    $user->setPassword($_POST["password"]);
    $userManager->login($user);
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>