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
    public function login(string $username, string $password) {
        $this->fileHandler->getFile();
        $userlist = $this->fileHandler->readData;
        foreach ($userlist as $user) {
            if ($user['username'] == $username && $user['passwordHash'] == md5($password)) {
                return true;
            }
        }
        return false;
    }
}