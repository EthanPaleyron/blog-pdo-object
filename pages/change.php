<?php
session_start();
if ($_SESSION["id"] != $_GET["id"]) {
    header("Location: http://localhost/blog-pdo-object/pages/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../SCSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <script src="https://kit.fontawesome.com/2621df78fc.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    try {
        include_once("../objects/blog.class.php");
        include_once("../connexion-base.php");
        $blog = new Blog();
        $blog->setId($_GET["id"]);
        $blogManager->valuesChange($blog);
        echo '<form action="../update.php?file=' . $_GET["file"] . '" method="post" enctype="multipart/form-data">
            <label for="title">Titre:</label>
            <input type="hidden" name="id_blog" value="' . $blog->getId() . '">
            <input type="text" name="title" id="title" value="' . $blog->getTitle() . '">
            <label for="comment">Commentaire:</label>
            <textarea name="comment" id="comment" cols="30" rows="10">' . $blog->getComment() . '</textarea>
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
            <label for="file">Choisissez une photo avec uen taille inférieure à 2 Mo.</label>
            <input type="file" name="file" id="file">
            <img src="../files/' . $blog->getFile() . '" alt="' . $blog->getFile() . '">
            <input type="submit" value="Modifier">
        </form>';
    } catch (Exception $e) {
        throw new InvalidArgumentException($e->getMessage());
    }
    ?>

</body>

</html>