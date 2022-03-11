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


        // Add Function
        public function addInformation($data){
            $form_data = $data;

            $std_name = $form_data['std_name'];
            $std_rool = $form_data['std_rool'];
            $std_photo_name = $_FILES['std_photo']['name'];
            $std_photo_tmp = $_FILES['std_photo']['tmp_name'];

            $query = "INSERT INTO `student_data`(`name`, `rool`, `img`) VALUES ('$std_name',$std_rool,'$std_photo_name')";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($std_photo_tmp, 'upload/'.$std_photo_name);

                return 'Information Added Successfully';
            }
        }


        
    }

?>