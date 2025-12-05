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

    public function createSession(array $userSessionData) {
        session_start();
        $userSessionValue = implode(':', $userSessionData); 
        $_SESSION['userName'] = $userSessionData['userName'];   
        $_SESSION['user'] = md5($userSessionValue);
    }

    public function rememberUser(array $rememberMeData) {
        $rememberUserValue = implode(':', $rememberMeData);    
        setcookie('userCookie', md5($rememberUserValue), time()+180); // La durée de vie est de 3 minutes.
    }

    public function getUsers(): array {
        $this->fileHandler->getFile();
        return $this->fileHandler->readData ?? [];
    }

    public function deleteUser(?int $userId) {
        $this->fileHandler->getFile();
        $userList = $this->fileHandler->readData ?? [];
        $this->fileHandler->readData = array_filter($userList, function ($value) use ($userId) {
            return $value['id'] != $userId;
        });
        return $this->fileHandler->rewriteFile() ? true : false;
    }
    


}