<?php
class Blog_manager
{
    private $base;
    public function __construct($base)
    {
        $this->base = $base;
    }

    public function insert($blog)
    {
        $sql = "INSERT INTO `articles` (LABEL_UTILISATEUR, TITLE_BLOG, DATETIME_BLOG, IMAGE_BLOG, DESCRIPTION_BLOG) VALUES (:label_user, :title, :datetime, :file, :comment)";
        $statement = $this->base->prepare($sql);
        $statement->execute(array("label_user" => $blog->getLabelUser(), "title" => $blog->getTitle(), "datetime" => $blog->getDatetime(), "file" => $blog->getFile(), "comment" => $blog->getComment()));
        $statement->closeCursor();
        header("Location: http://localhost/blog-pdo-object/pages/index.php");
    }
    public function delete($blog)
    {
        $sql = "DELETE FROM `articles` WHERE ID_BLOG = :id AND LABEL_UTILISATEUR LIKE :user_id";
        $resultat = $this->base->prepare($sql);
        $resultat->execute(array("id" => $blog->getId(), "user_id" => $_SESSION["id"]));
        $resultat->closeCursor();

    }
    public function displayingBlogs()
    {
        $array = array();
        $sql = "SELECT * FROM `articles` ORDER BY DATETIME_BLOG";
        $result = $this->base->query($sql);
        while ($e = $result->fetch()) {
            $blog = new Blog();
            $blog->setId($e["ID_BLOG"]);
            $blog->setLabelUser($e["LABEL_UTILISATEUR"]);
            $blog->setTitle($e["TITLE_BLOG"]);
            $blog->setDatetime($e["DATETIME_BLOG"]);
            $blog->setFile($e["IMAGE_BLOG"]);
            $blog->setComment($e["DESCRIPTION_BLOG"]);
            array_push($array, $blog);
        }
        return $array;
    }
    public function valuesChange($blog)
    {
        $sql = "SELECT * FROM `articles` WHERE ID_BLOG = :id_blog";
        $result = $this->base->prepare($sql);
        $result->execute(array("id_blog" => $blog->getId()));
        $e = $result->fetch();
        $blog->setTitle($e["TITLE_BLOG"]);
        $blog->setFile($e["IMAGE_BLOG"]);
        $blog->setComment($e["DESCRIPTION_BLOG"]);
        $result->closeCursor();
    }
}
?>