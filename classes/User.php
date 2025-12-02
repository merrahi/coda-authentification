<?php
require_once "FileHandler.php";


class User{
    public string $username;
    public string $password;
    public int $id;
    public FileHandler $fileHandler;

    public function __construct(){
        $this->fileHandler = new FileHandler();
    }

    public function register(string $username, string $password):bool{
        $newUser = [
                    "id"=> rand(1,3000),
                    "username"=> $username,
                    "passwordHash"=> md5($password)
                   ];
        $this->fileHandler->getFile();
        $this->fileHandler->addToFile($newUser);
        return true;
    }
}