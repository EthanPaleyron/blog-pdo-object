<?php
try {
    include_once("connexion-base.php");
    include_once("objects/blog.class.php");
    $blog = new Blog();
    $blog->setId($_POST["id_blog"]);
    $blog->setTitle(htmlspecialchars($_POST["title"]));
    $file = $_GET["file"];
    if (strlen($_FILES["file"]["name"])) {
        unlink("files/" . $_GET["file"]);
        $file = rand(0, 100000000000) . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $file);
    }
    $blog->setFile($file);
    $blog->setComment(htmlspecialchars($_POST["comment"]));
    $blogManager->update($blog);
    header("Location: http://localhost/blog-pdo-object/pages/index.php");
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>