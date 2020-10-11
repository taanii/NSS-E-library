<?php

require './connect.php';

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/addBook.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            .jumbotron{
                background-color: rgba(255,155,0,0.5);
            }
            
            label{
                font-size: 1.3rem;
            }
        
        </style>
    </head>
    <body>
        <div class="jumbotron col-12">
            <h1>Books Section</h1>
        </div>
        <div class="container col-10">
            <form method="post" action="./displayBook.php">
                
                
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
                

                <button type="submit" value="submit" name="submit" class="form-group col-2 col-md-1 offset-4 offset-md-1 btn btn-dark">Go</button>

            </form>
        </div>
   

        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>