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
    session_start();
    try {
        echo '<form action="..update.php?id=' . $_GET["id"] . '" method="post" enctype="multipart/form-data">';
        include_once("../objects/blog.class.php");
        include_once("../connexion-base.php");
        $blog = new Blog();
        $blog->setId($_GET["id"]);
        $blogManager->valuesChange($blog);
        echo ('<label for="title">Titre:</label>
                    <input type="text" name="title" id="title" value="' . $blog->getTitle() . '">
                    <label for="comment">Commentaire:</label>
                    <textarea name="comment" id="comment" cols="30" rows="10">' . $blog->getFile() . '</textarea>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                    <label for="file">Choisissez une photo avec uen taille inférieure à 2 Mo.</label>
                    <input type="file" name="file" id="file">
                    <img src="files/' . $blog->getComment() . '" alt="img">
                ');
    } catch (Exception $e) {
        throw new InvalidArgumentException($e->getMessage());
    }
    ?>

</body>

</html>