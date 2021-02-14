<?php

require '../../connect.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Books Library</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="../../css/addBook.css"> -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            a{
                color: black;
            }
        
            td{
                /* font-size: 1.1rem; */
            }
        
        </style>
    </head>
    <body>
    

        <div class="container col-md-10 mt-4">
        <?php

            if(isset($_POST['submit']))
            {
                $category=mysqli_real_escape_string($connection,$_POST['category']);
                $type=mysqli_real_escape_string($connection,$_POST['type']);
                $lang=mysqli_real_escape_string($connection,$_POST['language']);

                $sql="SELECT * FROM `books` WHERE `category`='$category' and `type` = '$type'";

                $result=mysqli_query($connection,$sql);
                $count=1;
                
        ?>
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Book Name <i>(Click on name to open)</i></th>
                        </tr>
                    </thead>
                    <tbody>
        <?php

                if(mysqli_num_rows($result)==0)
                {
        ?>
                    <tr>
                    <th scope="row">&nbsp;</th>
                    <td>No books found</td>
                    </tr>


        <?php
                }
                while($row=mysqli_fetch_assoc($result))
                {
        ?>
                        <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><a href="./readBook.php?name=<?php echo $row['name']; ?>" target="_blank"><?php echo $row['name']; ?> </a></td>
                        </tr>
        <?php
                    $count+=1;
                }
        ?>
                </tbody>
                </table>
            </div>
        <?php


            }


        ?>

        <button type="button" class="btn btn-dark mb-2" onclick=" window.location.href='./bookSection.php';">Back</button>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
          $(document).ready(function() {
               $('#myTable').DataTable();
          });
        </script>
    </body>
</html>