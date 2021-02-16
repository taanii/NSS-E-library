<?php

require '../../connect.php';

if (isset($_POST['submit'])) {

    $file = $_FILES['file'];
    $filename = mysqli_real_escape_string($connection, $_POST['audioname']);
    $path = "../../files/audios/" . $filename;


    $education = mysqli_real_escape_string($connection, $_POST['education']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $language = mysqli_real_escape_string($connection, $_POST['language']);

    if (file_exists($path)) {
        echo "<script>
        alert('This file already exists. Try to change name of the file');
        window.location.href='./addAudio.php';
        </script>";
    } 
    else if (move_uploaded_file($file["tmp_name"], $path)) 
    {
        $sql = "INSERT INTO `audios` ( `name`, `education`, `category`, `language`) VALUES ('$filename','$education','$category','$language')";

        $result = mysqli_query($connection, $sql);

        if (!$result) {
            echo "<script>
                alert('error in query implementation ');
                window.location.href='./addAudio.php';
            </script>";
        }

        if (mysqli_affected_rows($connection)) {
            echo "
            <script>
                alert('Audio book has been uploaded sucessfully');
                window.location.href='./addAudio.php';
            </script>
            ";
        
        } 
        else {
            echo "
            <script>
                alert('something went wrong.');
                window.location.href='./addAudio.php';
            </script>
            ";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Audiofile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/findAudio.css">

    <style>
        label {
            font-size: 1.5rem;
        }
    </style>

</head>


<body>
    <div class="container mt-4 col-10">
        <div class="row">
            <h2 class="m-4 ">
                Add Audiofiles
            </h2>
        </div>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">



            <div class="form-group col-md-8">
                <input type="text" maxlength="250" class="form-control mt-2 mb-2" id="audioname" name="audioname" placeholder="Enter  name of the file" required>
            </div>

            <div class="form-group col-md-4">
                <label for="education">education</label>
                <select id="education" name="education" class="form-control" required>

                    <option name="nursery" value="nursery" selected>Nursery</option>
                    <option name="junior" value="junior">Junior</option>
                    <option name="senior" value="senior">Senior</option>


                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="category">category</label>
                <select id="category" name="category" class="form-control" required>

                    <option name="poems" value="poems" selected>Poems</option>
                    <option name="short Stories" value="short Stories">short Stories</option>



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
                <label for="file">File:</label>
                <input type="file" name="file" accept="audio/*" title="click here to upload audio file">

            </div>



            <button type="submit" value="submit" name="submit" class=" btn btn-danger mt-2 mb-4 ">Upload </button>


        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>

</html>