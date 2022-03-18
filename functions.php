<?php

    class CrudApp{

        private $conn;

        public function __construct(){
            // Connect To DB
            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "crud-app");

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
                return "Error: " . $sql . "<br>" . $this->conn->error;
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
            // Get Image Name
            $img_name_sql = "SELECT * FROM student_data WHERE id='$id'";
            $img_name_result = $this->conn->query($img_name_sql);

            if($img_name_result){
                $row = $img_name_result->fetch_assoc();

                $img_name = $row['img'];
            }

            // Delete Information
            $sql = "DELETE FROM student_data WHERE id='$id'";
            $result = $this->conn->query($sql);

            if($result){
                unlink('./upload/' . $img_name);

                return "Data Deleted Successfully";
            }else{
                return "Data Not Deleted";
            }
        }

        // Select Information By Id
        public function GetInformationById($id){
            $sql = "SELECT * FROM student_data WHERE id='$id'";
            $result = $this->conn->query($sql);
            $student_data = $result->fetch_assoc();

            if($result){
                return $student_data;
            }else{
                return "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }

        // Update Student Information
        public function updateInformation($data){
            $std_id = $data['std_id'];
            $std_name = $data['std_name'];
            $std_rool = $data['std_rool'];
            $std_photo = $_FILES['std_photo'];
            $std_photo_name = $std_photo['name'];
            $std_photo_tmp = $std_photo['tmp_name'];

            if(file_exists($_FILES["std_photo"]["tmp_name"])){
                // File Input Valid

                // Get Current Image Name
                $id_info = $this->GetInformationById($std_id);
                $current_photo_name = $id_info['img'];

                // Update Data With Image
                $sql = "UPDATE student_data SET name = '$std_name', rool = '$std_rool', img = '$std_photo_name' WHERE id = $std_id";
                $result = $this->conn->query($sql);

                if($result){
                    move_uploaded_file($std_photo_tmp, './upload/'.$std_photo_name);
                    unlink('./upload/' . $current_photo_name);

                    return 'Student Data Updated';
                }
            }else{
                // File Input Un Valid
                $sql = "UPDATE student_data SET name = '$std_name', rool = '$std_rool' WHERE id = $std_id";
                $result = $this->conn->query($sql);

                if($result){
                    return 'Student Data Updated';
                }

            }

        }
    }

?>