<?php

    class CrudApp{

        private $conn;

        public function __construct(){
            // Connect To DB
            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "crud-app");

            $this->conn = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            if(!$this->conn){
                die('Database Connection Failed'. mysqli_connect_error($this->conn));
            }
        }


        
    }

?>