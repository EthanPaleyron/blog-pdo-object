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
}
?>