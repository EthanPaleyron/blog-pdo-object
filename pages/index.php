<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="../SCSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    <script src="https://kit.fontawesome.com/2621df78fc.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    session_start();
    ?>
    <header>
        <nav>
            <h1>MyBlog</h1>
            <ul>
                <li><a href="sign-in">S'inscrire</a></li>
                <li><a href="login">Connexion</a></li>
                <li><a href="../logout">Deconnexion</a></li>
            </ul>
        </nav>
    </header>
    <h2>Les Blogs</h2>

    <a href="insertion.php">Inserer un nouveau blog</a>

    <div class="articles">
        <?php
        include_once("../connexion-base.php");
        include_once("../objects/blog.class.php");
        $array = $blogManager->displayingBlogs();
        foreach ($array as $value) {
            $date = new DateTime($value->getDatetime());
            echo '<article>
            <h2>' . $value->getTitle() . '</h2>
            <time datetime="' . $date->format("d-m-Y H:i:s") . '">' . $date->format("d-m-Y H:i:s") . '</time>
            <img src="../files/' . $value->getFile() . '" alt="' . $value->getFile() . '">
            <p>' . $value->getComment() . '</p>';
            if (isset($_SESSION["id"])) {
                if ($_SESSION["id"] == $value->getLabelUser()) {
                    echo '<a href="../delete.php?id=' . $value->getId() . '&file=' . $value->getFile() . '">Supprimer</a>
                    <a href=change.php?id=' . $value->getId() . '&file=' . $value->getFile() . '">Modifier</a>';
                }
            }
            echo '</article>';
        }
        ?>
    </div>

    <script type="module" src="../JS/main.js"></script>
</body>

</html>