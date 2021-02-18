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
        <link rel="stylesheet" href="../../css/nav.css">
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
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-print" id="navbar">

<a class="navbar-brand" id="logo_n_brandname" href="#"><img src="../../img/new_logo.png"
        id="logo" />ज्ञानभंडार</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mar">
            <a class="nav-link" href="../../users/landing_page/index.php">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown mar">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Library Section
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../audio/audiosection.php">Audio Stories</a></li>
                <li><a class="dropdown-item" href="../books/bookSection.php">Books</a></li>

                <li class="nav-link dropdown">
                    <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">
                        Books
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Educational Books</a></li>
                        <li><a class="dropdown-item" href="#">Story books</a></li>
                        <li><a class="dropdown-item" href="#">Picture books</a></li>

                    </ul>
                </li>
                
                <li><a class="dropdown-item" href="#">Poems</a></li>
            </ul>
        </li>
        <li class="nav-item mar">
            <a class="nav-link" href="../../admin/landing_page/login.php">Log In</a>
        </li>
        <li class="nav-item  mar">
            <a class="nav-link" href="#">About us</a>
        </li>
        </li>
    </ul>
</div>

</nav>

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
        <script src="https://cdn.jsdelivr.net/gh/kmlpandey77/bootnavbar/js/bootnavbar.js"></script>
        <script>
          $('navbar').bootnavbar();
      
          $(document).ready(function() {
               $('#myTable').DataTable();
          });
        </script>
    </body>
</html>