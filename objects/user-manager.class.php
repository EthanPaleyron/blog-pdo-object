<?php
class User_manager
{
    private $base;
    public function __construct($base)
    {
        $this->base = $base;
    }

    public function signIn($base)
    {
        $sql = "INSERT INTO `utilisateurs` (NOM_UTILISATEUR, MDP_UTILISATEUR) VALUES (:user_name, :password)";
        if (!preg_match("/[ \[\]\(\)#~`\\£\$€µ<>%§]/", $base->getUsername()) && strlen($base->getUsername()) > 1 && strlen($base->getPassword()) >= 8) {
            $statement = $this->base->prepare($sql);
            $statement->execute(array("user_name" => $base->getUsername(), "password" => $base->getPassword()));
            $id = $this->base->lastInsertId();
            $statement->closeCursor();
            $_SESSION["id"] = $id;
            $_SESSION["user_name"] = $base->getUsername();
            header("Location: http://localhost/blog-pdo-object/pages/index.php");
        } else if (preg_match("/[ \[\]\(\)#~`\\£\$€µ<>%§]/", $base->getUsername()) || strlen($base->getUsername()) < 1) {
            echo "<p class='error'>Votre nom d'utilisateur ne doit pas contenir des caractere speciaux</p>";
        } else if (strlen($base->getPassword()) <= 8) {
            echo "<p class='error'>Votre mots de passe doit contenir minimum 8</p>";
        }
    }
    public function login($base)
    {
        $sql = "SELECT * FROM utilisateurs WHERE NOM_UTILISATEUR = :user_name";
        $resultat = $this->base->prepare($sql);
        $resultat->execute(array("user_name" => $base->getUsername()));
        if ($donnee = $resultat->fetch()) {
            if (password_verify($base->getPassword(), $donnee["MDP_UTILISATEUR"])) {
                $_SESSION["id"] = $donnee["ID_UTILISATEUR"];
                $_SESSION["user_name"] = $base->getUsername();
                header("Location: http://localhost/blog-pdo-object/pages/index.php");
            } else {
                echo "<p class='error'>Nom d'utilisateur incorect!</p>";
            }
        } else {
            echo "<p class='error'>Mots de passe incorect!</p>";
        }
        $resultat->closeCursor();
    }
    public function logout()
    {
        session_start();
        session_unset();
        header("Location: http://localhost/blog-pdo-object/pages/index.php");
    }
}
?>