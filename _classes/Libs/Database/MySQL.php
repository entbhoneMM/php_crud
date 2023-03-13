<?php

namespace Libs\Database;

use PDO;
use PDOException;

class MySQL
{
    private $db;
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    public function __construct(
        $dbhost = "localhost",
        $dbuser = "root",
        $dbpass = "root123",
        $dbname = "fairway",
    ) {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
    }
    public function connect()
    {
        try {
            $this->db = new PDO(
                "mysql:dbhost=$this->dbhost;dbname=$this->dbname",
                $this->dbuser,
                $this->dbpass,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
            return $this->db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
