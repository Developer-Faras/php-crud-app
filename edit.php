<?php
    include_once('./functions.php');

    $app = new CrudApp();

    // Get Information
    if(isset($_GET['edit_id'])){
        $edit_id = $_GET['edit_id'];

        $data = $app->GetInformationById($edit_id);
    }else{
        $data = ['name'=> '', 'rool'=> '', 'id'=> ''];
    }

    // Update Information
    if(isset($_POST['update_info'])){
        $return_massage = $app->updateInformation($_POST);
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

        <h5 class="return_massage mb-3">
            <?php 
                if(isset($return_massage)){
                    echo($return_massage);

                    $page = './index.php';
                    $sec = "2";
                    header("Refresh: $sec; url=$page");
                }
            ?>
        </h5>

        <div class="form-wraper"> 
            <form action="" id="stdForm" method="post" enctype="multipart/form-data">

                <div class="input-group mb-3"> 
                    <input class="form-control" value="<?php echo $data['name'];?>" type="text" name="std_name" id="name" placeholder="Enter Name">
                </div>
                
                <div class="input-group mb-3"> 
                    <input class="form-control" value="<?php echo $data['rool'];?>" type="text" name="std_rool" id="roll" placeholder="Enter Roll">
                </div>

                <div class="input-group flex-column mb-4"> 
                    <label for="" class="label mb-1">Upload Your Photo</label>
                    <input type="file" class="form-control w-100" name="std_photo" id="photo" >
                </div>

                <input type="hidden" name="std_id"  value="<?php echo $data['id'];?>">
                
                <div class="input-group"> 
                    <input name="update_info" type="submit" value="Update Information" class="bg-warning text-light form-control submit-btn bold">
                </div>
            </form>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            const form = $('#stdForm');
    
            let name = $(form).find('#name');
            let roll = $(form).find('#roll');
            let photo = $(form).find('#photo');

            const massageHolder = $('.return_massage');

            $(form).submit(function(){
                if($(name).val() == ''){
                    $(massageHolder).html('Name Is Empty');
                    return false;
                }else if($(roll).val() == ''){
                    $(massageHolder).html('Roll Is Empty');
                    return false;
                }else{
                    $(massageHolder).html('');
                    return;
                }
            });

        });
    </script>

  </body>
</html>

<!-- Simple Changes -->