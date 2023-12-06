<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="../SCSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
    <script src="https://kit.fontawesome.com/2621df78fc.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <h1>MyBlog</h1>
        </nav>
    </header>
    <h2>Insertion</h2>

    <form action="../insert.php" method="post" enctype="multipart/form-data">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title">
        <label for="file">Image :</label>
        <input type="file" name="file" id="file">
        <label for="comment">Description :</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>

    <script type="module" src="../JS/main.js"></script>
</body>

</html>