<?php

require './connect.php';

if(isset($_POST['submit'])){

    $file=$_FILES['file'];
    // $filename=$file['name'];
    $filename=mysqli_real_escape_string($connection,$_POST['bookname']).".pdf";
    $path="files/books/".$filename;

    $category=mysqli_real_escape_string($connection,$_POST['category']);
    $type=mysqli_real_escape_string($connection,$_POST['type']);
    $lang=mysqli_real_escape_string($connection,$_POST['language']);

    // echo "file name is : $path";

    if(file_exists($path))
    {
        echo "<script>
            alert('File already exist. Try changing name of file');
            window.location.href='./addBook.php';
            </script>";
    }
    else if(move_uploaded_file($file["tmp_name"],$path))
    {

        $sql="INSERT INTO `books`( `name`, `category`, `type`, `language`) VALUES ('$filename','$category','$type','$lang')";

        $result=mysqli_query($connection,$sql);

        if(mysqli_affected_rows($connection))
        {
            echo "<script>
            alert('Book Uploaded Successfully');
            window.location.href='./addBook.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Failed to upload. Retry !!!');
            window.location.href='./addBook.php';
            </script>";
        }

    }
    else
    {
        echo "<script>
        alert('Failed to upload. Retry !!!');
        window.location.href='./addBook.php';
        </script>";
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Upload Books</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/addBook.css">
        <style>
            label{
                font-size: 1.3rem;
            }
        </style>
    </head>
    <body>
       
       <div class="container mt-4 col-10">
        
        <div class="row">
        <h2 class="m-2">
            Add Books 
            <small class="text-muted">(in PDF format)</small>
        </h2>
        </div>

        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <div class="form-group col-md-8">
                <input type="text" maxlength="250" class="form-control mt-2 mb-2" id="bookname" name="bookname" placeholder="Enter Book name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control" required>
                    <optgroup label="Pre-Primary">
                        <option name="nursery" value="nursery" selected>Nursery</option>
                        <option name="junior" value="junior">Junior</option>
                        <option name="senior" value="senior">Senior</option>
                    </optgroup>
                    <optgroup label="Primary">
                        <option name="first" value="first">First</option>
                        <option name="second" value="second">Second</option>
                        <option name="third" value="third">Third</option>
                        <option name="fourth" value="fourth">Fourth</option>
                        <option name="fifth" value="fifth">Fifth</option>
                    </optgroup>
                    <optgroup label="Secondary">
                        <option name="sixth" value="sixth">Sixth</option>
                        <option name="seventh" value="seventh">Seventh</option>
                        <option name="eighth" value="eighth">Eighth</option>
                        <option name="nineth" value="nineth">Nineth</option>
                        <option name="tenth" value="tenth">Tenth</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="type">Type of Book </label>
                <select id="type" name="type" class="form-control" required>
                    <option name="storybook" value="storybook" selected>Story Book</option>
                    <option name="picturebook" value="picturebook">Picture book</option>
                    <option name="shortstories" value="shortstories">Short stories</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="language">Language </label>
                <select id="language" name="language" class="form-control" required>
                    <option name="english" value="english" selected>English</option>
                    <option name="hindi" value="hindi">Hindi</option>
                    <option name="marathi" value="marathi">Marathi</option>
                </select>
            </div>
           

            <div class="input-group mb-3 col-md-3">
                <input type="file" name="file" accept="application/pdf">
                
            </div>

            <button type="submit" value="submit" name="submit" class="btn btn-danger mt-2 mb-4">Upload to Database</button>

        </form>
       </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>