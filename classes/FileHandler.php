<?php

class FileHandler{
    public array $readData;

    public function getFile(){
        $usersData = file_get_contents('../users.json');
        $this->readData = json_decode($usersData, true) ?? [];
    }

    public function addToFile(array $dataToAdd){
        $this->readData[] = $dataToAdd;
        var_dump($this->readData);
        var_dump(json_encode($this->readData));
        try {
            file_put_contents("../users.json", json_encode($this->readData), 0);
        } catch (Exception $e) {
            var_dump($e);
        }
    }
}