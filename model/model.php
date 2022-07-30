<?php

 class Db {

    public $db;

    public function __construct(){

/////////connection a la base de données////////
    try {
        $this->db = new PDO(
            'mysql:host=localhost;dbname=paco', 'root', 'root',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

    } catch (PDOException $e) {
        $e->getMessage();
    }
    }
}
?>