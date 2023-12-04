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
        $sql = "INSERT INTO `articles` (TITLE_BLOG, DATETIME_BLOG, IMAGE_BLOG, DESCRIPTION_BLOG) VALUES (:title, :datetime, :file, :comment)";
        $statement = $this->base->prepare($sql);
        $statement->execute(array("title" => $blog->getTitle(), "datetime" => $blog->getDatetime(), "file" => $blog->getFile(), "comment" => $blog->getComment()));
        $statement->closeCursor();
        header("Location: http://localhost/blog-pdo-object/pages/index.php");
    }
    public function displayingBlogs()
    {
        $array = array();
        $sql = "SELECT * FROM `articles` ORDER BY DATETIME_BLOG";
        $result = $this->base->query($sql);
        while ($e = $result->fetch()) {
            $blog = new Blog();
            $blog->setTitle($e["TITLE_BLOG"]);
            $blog->setDatetime($e["DATETIME_BLOG"]);
            $blog->setFile($e["IMAGE_BLOG"]);
            $blog->setComment($e["DESCRIPTION_BLOG"]);
            array_push($array, $blog);
        }
        return $array;
    }
}
?>