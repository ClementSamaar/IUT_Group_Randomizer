<?php

class PDOConnect
{
    private ?PDO $_pdo = null;

    private const SERVER = "localhost";
    private const DATABASE = "group_randomizer";
    private const DBUSERNAME = "root";
    private const DBPASS = null;

    public function connect()
    {
        if ($this->_pdo === null){
            try {
                $this->_pdo = new PDO(sprintf("mysql:host=%s;dbname=%s", self::SERVER, self::DATABASE), self::DBUSERNAME, self::DBPASS);
                $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * @return PDO|null
     */
    public function getPdo(): ?PDO { return $this->_pdo; }


}