<?php
try {
    $sql = 'UPDATE `posts` SET `Title` =:title, `Comment` =:comment, `File` =:file WHERE Id =:id';
    $image = rand(1, 1000000) . $_FILES['file']["name"];
    $statement = $base->prepare($sql);
    $statement->execute(array("title" => htmlspecialchars($_POST["title"]), "file" => $image, "comment" => htmlspecialchars($_POST["comment"]), 'id' => $_GET["id"]));
    $statement->closeCursor();
    var_dump($statement);
    header("Location: http://localhost/test-pdo/index.php");
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>