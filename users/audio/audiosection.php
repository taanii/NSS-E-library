<?php
require '../../connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/findAudio.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Audiobooks</title>
</head>

<body>
    
    <div class=" jumbotron col-12 ">
        <h1>Audiobooks Section</h1>
    </div>
 
    <!-- code to search audiobook -->

        <form class="form-inline"  method="POST">

            <!-- education -->
            <div class="input-group col-lg-3 m-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for=" education">Education</label>
                </div>
                <select class="custom-select" id="education" name="education">

                    <option  value="nursery">Nursery</option>
                    <option  value="junior">Junior</option>
                    <option  value="senior">Senior</option>

                </select>
            </div>

            <!-- category -->
            <div class="input-group col-lg-3 m-2">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="category" name="category">Category</label>
                </div>
                <select class="custom-select" id="category" name="category" required>

                    <option  value="poems">Poems</option>
                    <option  value="short Stories">Short stories</option>

                </select>
            </div>

            <!-- language -->
            <div class="input-group col-lg-3 m-2">
                <div class="input-group-prepend ">
                    <label class="input-group-text" for="language">Language</label>
                </div>
                <select class="custom-select" id="language" name="language">

                    <option value="english">English</option>
                    <option  value="hindi">Hindi </option>
                    <option  value="marathi">Marathi </option>

                </select>
            </div>
            

            <button type="submit" value="submit" name="submit" class="input-group  col-lg-1 col-3 offset-4 offset-md-1 btn btn-light" >Search</button>

        </form>

    <div class="container inventory  mt-5" id="list">

        <?php
            // displaying searched Audiobooks
            if (isset($_POST['submit'])) {
                $education = mysqli_real_escape_string($connection, $_POST['education']);
                $category = mysqli_real_escape_string($connection, $_POST['category']);
                $language = mysqli_real_escape_string($connection, $_POST['language']);

                // checking values
                // echo ($education);
                // echo ($category);
                // echo ($language);

                $sql = "SELECT * FROM `audios` WHERE `category`='$category' and (`education` = '$education' and `language`='$language') ";
                $result = mysqli_query($connection, $sql);
                
                // if(!($result)){
                //     echo(" error in query implementation");
                // }

                if (mysqli_num_rows($result) === 0)
                {
        ?>

                    <h3>No results found</h3>

        <?php
                } //end of if statement  
        ?>
            <div class="row">
                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4  my-4 ">
                        <!-- card-block -->
                        <div class="card ">
                            <a href="<?php 
                            echo 'playAudio.php?name='.$row['name']; ?>". target="_blank"> 

                            <div class="card-img-top">
                                
                                <img src="../../img/thumbnail2.png" >
                            </div>
                            <h5  class="card-title">
                                <?php
                                    echo $row['name']
                                ?>
                            </h5>

                        </div>   <!-- end of card div -->
                        
                    </div>  
                <?php
                }   //end of while loop
                ?>
                <?php
            }   //end of if statement(isset(post))
                ?>

            </div> 
            <!-- end of row div -->
    </div> 
    <!-- end of container div -->

   
    



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    

    <!--  infinite scrolling -->
    <?php

    if(!(isset($_POST['submit']))) //if user have not pressed search button 
    {
    ?>
        <script>
            var load_flag =0;
            loadMore(load_flag);//displaying first 12 audios
            
            function loadMore(start)
            {
                jQuery.ajax({
                    type: "post",
                    url: "get.php",
                    data: "start="+start,
                    success: function (res) {
                        $(".inventory").append(res); //res query wil be displayed in inventory class
                        load_flag+=12;//next 12 audio
                    }
                });
            }

            jQuery(document).ready(function()
            {
                jQuery(window).scroll(function () { 
                    if(jQuery(window).scrollTop()>= jQuery(document).height()- jQuery(window).height()){
                        loadMore(load_flag); 
                        
                    }
                });
            });
        </script>
    <?php
    }
    ?>
    <!-- trivial code 
    incomplete-->
    <!-- <script>
        $(document).ready(function() {
            $('#tryit').click(function() {
                // $('html,body').animate({
                //         scrollTop: $('#bottom-content').offset.top
                //     },
                //     1000
                // )
                // $('#list').css("display", "block");

                $('#list').show(1000);
            })
        })
    </script> -->

</body>


</html>