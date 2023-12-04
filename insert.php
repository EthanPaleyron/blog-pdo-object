<?php
try {
    include_once("connexion-base.php");
    include_once("objects/blog.class.php");
    $blog = new Blog();
    $blog->setTitle(htmlspecialchars($_POST["title"]));
    $blog->setDatetime(date("Y-m-d H:i:s"));
    $file = rand(1, 1000000) . $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $file);
    $blog->setFile($file);
    $blog->setComment(htmlspecialchars($_POST["comment"]));
    $blogManager->insert($blog);
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>