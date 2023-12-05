<?php
class Blog
{
    private int $id;
    private int $labelUser;
    private string $title;
    private $datetime;
    private string $file;
    private string $comment;

    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setLabelUser($labelUser): void
    {
        $this->labelUser = $labelUser;
    }
    public function getLabelUser(): int
    {
        return $this->labelUser;
    }
    public function setTitle($title): void
    {
        $this->title = strtoupper($title);
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setDatetime($datetime): void
    {
        $this->datetime = $datetime;
    }
    public function getDatetime()
    {
        return $this->datetime;
    }
    public function setFile($file): void
    {
        $this->file = $file;
    }
    public function getFile(): string
    {
        return $this->file;
    }
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }
    public function getComment(): string
    {
        return $this->comment;
    }
}
?>