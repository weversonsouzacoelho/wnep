<?php
    class Connection{
        private $server;
        private $user;
        private $pass;
        private $database;

        public function __construct(){
            $this->server = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->database = 'crud';
        }

        public function getConection(){
            try {
                
                $con = new PDO(
                    'mysql:host='.$this->server.';dbname='.$this->database,
                    $this->user,
                    $this->pass
                );
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $con;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }        
    }
?>