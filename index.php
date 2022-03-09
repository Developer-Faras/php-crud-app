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

        <div class="form-wraper"> 
            <form action="" method="post" enctype="multipart/form-data">

                <div class="input-group mb-3"> 
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name">
                </div>
                
                <div class="input-group mb-3"> 
                    <input class="form-control" type="text" name="roll" id="roll" placeholder="Enter Roll">
                </div>

                <div class="input-group flex-column mb-4"> 
                    <label for="photo" class="label mb-1">Upload Your Photo</label>
                    <input type="file" name="photo" id="photo" >
                </div>

                <div class="input-group"> 
                    <input type="submit" value="Add Information" class="bg-success text-light form-control submit-btn">
                </div>
            </form>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>