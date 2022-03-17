<?php

    class CrudApp{

        private $conn;

        public function __construct(){
            // Connect To DB
            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "crud-app");

            // $this->conn = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
            $this->conn = new mysqli(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
            

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
              }
        }


        // Add Student Function
        public function addInformation($data){
            $form_data = $data;

            $std_name = $form_data['std_name'];
            $std_rool = $form_data['std_rool'];
            $std_photo = $_FILES['std_photo'];
            $std_photo_name = $_FILES['std_photo']['name'];
            $std_photo_tmp = $_FILES['std_photo']['tmp_name'];

            $sql = "INSERT INTO `student_data`(`name`, `rool`, `img`) VALUES ('$std_name',$std_rool,'$std_photo_name')";

            if ($this->conn->query($sql) === TRUE) {
                move_uploaded_file($std_photo_tmp, 'upload/'.$std_photo_name);

                return 'Information Added Successfully';
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }

        }

        // Select Student Data
        public function selectInformation(){
            $sql = "SELECT * FROM student_data";
            $result = $this->conn->query($sql);

            if($result){
                return $result;
            }
        }


        // Delete Student Information
        public function deleteInformation($id){
            $sql = "DELETE FROM student_data WHERE id='$id'";
            $result = $this->conn->query($sql);

            if($result){
                return "Data Deleted Successfully";
            }else{
                return "Data Not Deleted";
            }
        }
    }

?>