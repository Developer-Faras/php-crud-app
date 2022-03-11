<?php
    include_once('./functions.php');

    $app = new CrudApp();

    // Add Information
    if(isset($_POST['add_info'])){
       $return_massage = $app->addInformation($_POST);
    }

?>  


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="./css/style.css">


    <title>CRUD App With PHP Mysql</title>

  </head>
  <body>
    <div class="container py-3 px-4 shadow my-4 mb-5"> 
        <h2 class="title text-center mb-3">Student App CRUD With PHP OOP</h2>

        <h5 class="return_massage">
            <?php 
                if(isset($return_massage)){
                    echo($return_massage);
                }
            ?>
        </h5>

        <div class="form-wraper"> 
            <form action="" method="post" enctype="multipart/form-data">

                <div class="input-group mb-3"> 
                    <input class="form-control" type="text" name="std_name" id="name" placeholder="Enter Name">
                </div>
                
                <div class="input-group mb-3"> 
                    <input class="form-control" type="text" name="std_rool" id="roll" placeholder="Enter Roll">
                </div>

                <div class="input-group flex-column mb-4"> 
                    <label for="" class="label mb-1">Upload Your Photo</label>
                    <input type="file" class="form-control w-100" name="std_photo" id="photo" >
                </div>

                <div class="input-group"> 
                    <input name="add_info" type="submit" value="Add Information" class="bg-success text-light form-control submit-btn bold">
                </div>
            </form>
        </div>

    </div>

    <div class="container py-3 px-4 shadow"> 
        <table class="table table-responsive"> 

            <thead> 
                <th class="">Id</th>
                <th class="">Name</th>
                <th class="">Roll</th>
                <th class="">Image</th>
                <th class="">Actions</th>
            </thead>

            <tbody> 
                <tr> 
                    <td class="bold">1</td>
                    <td class="bold">Md Faras</td>
                    <td class="bold">001</td>
                    <td><img class="student-image" src="./image/test.jpg" alt="Md Faras Uddin"></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning bold text-light">EDIT</a>
                        <a href="#" class="btn btn-sm btn-danger bold text-light">DELETE</a>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>