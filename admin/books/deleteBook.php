<?php

require '../../connect.php';

if(isset($_POST['deletebtn']))
{
    $filename=mysqli_real_escape_string($connection,$_POST['bookname']).".pdf";
    $path="../../files/books/".$filename;

    if(file_exists($path))
    {
        $sql="DELETE FROM `books` WHERE `name`='$filename'";
        
        $result=mysqli_query($connection,$sql);

        if(mysqli_affected_rows($connection) && unlink($path) )
        {
            
            echo "<script>
            alert('Book deleted Successfully');
            window.location.href='./deleteBook.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Failed to delete. Retry !!!');
            window.location.href='./deleteBook.php';
            </script>";
        }
        
    }
    else
    {
        echo "<script>
            alert('No such file exist');
            window.location.href='./deleteBook.php';
            </script>";
    }

}



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <!-- <div class="jumbotron"> -->
        

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>

            <div class="container">
                <!-- <p>Name of the book</p> -->
                <label for="basic-url">DELETE BOOK</label>
                
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Name of book</span>
                    </div>
                    <input type="text" name="bookname" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <button type="button" class="btn btn-primary">Back</button>
                    <button type="submit" name="deletebtn" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>
                </form>
                
            </div>
        <!-- </div> -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>
            $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
        </script>
    </body>
</html>