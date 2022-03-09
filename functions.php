<?php

    class CrudApp{

        private $conn;

        public function __construct(){
            // Connect To DB
            $db_host = '127.0.0.1';
            $db_user = 'root';
            $db_pass = '';
            $db_name = 'crud-app';

            $this->conn = mysqli_connect($db_host, $db_user, $db_pass< $db_name);

            if(!$this->conn){
                die('Database Connection Failed'. mysqli_connect_error($this->conn));
            }

        }
    }

?>