<?php
session_start();
try {
    include_once("objects/user.class.php");
    include_once("connexion-base.php");
    include_once("objects/blog.class.php");
    $blog = new Blog();
    $blog->setId($_GET["id"]);
    $blog->setFile($_GET["file"]);
    if (file_exists("files/" . $blog->getFile())) {
        unlink("files/" . $blog->getFile());
    }
    $blogManager->delete($blog);
    header("Location: http://localhost/blog-pdo-object/pages/index.php");
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>