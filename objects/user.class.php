<?php
class User
{
    private string $userName;
    private string $password;

    public function setUsername($userName): void
    {
        $this->userName = $userName;
    }
    public function getUsername(): string
    {
        return $this->userName;
    }
    public function setPassword($password): void
    {
        $this->password = $password;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
}
?>