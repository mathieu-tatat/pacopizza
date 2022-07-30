<?php

 class Db {

    public $db;

    public function __construct(){

/////////connection a la base de données////////
    try {
        $this->db = new PDO(
            'mysql:host=localhost:3306;dbname=mathieu-tatat_paco ;charset=UTF-8', 'pacoPizz', 'pacoPizza',
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
