<?php
    require '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'connect.php';          // file with DB connection credentials

    $table_list_q = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE '".DB_NAME."';";   // query for listing table
    $table_list = mysqli_query($connection, $table_list_q);

    if( isset($_POST['row-action']) && $_POST['row-action'] == 'Delete' ){
        function delete_row($table_name, $row_id){
            $file_path = "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."files".DIRECTORY_SEPARATOR.$_POST['table-name'].DIRECTORY_SEPARATOR.$_POST['file-name'];
            $file_pointer = fopen($file_path, "w+");
            if( ! unlink($file_pointer) ){
                $delete_q = 'DELETE FROM "'.$table_name.'" WHERE id='.$row_id.';';
                $result = mysqli_query($connection, $delete_q);

                if( mysqli_affected_rows($connection) ){
                    echo '<script type="text/javascript">
                            window.alert("Row deleted successfully");
                        </script>';
                }
                else{
                    echo '<script type="text/javascript">
                            window.alert("Row deletion was unsuccessful");
                        </script>';
                }
            }
            else{
                echo '<script type="text/javascript">
                        window.alert("File deletion unsuccessful");
                    </script>';
            }
        }

        delete_row($_POST['table-name'], $_POST['row-id']);
    }

?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js  " /> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kmlpandey77/bootnavbar/css/bootnavbar.css"/> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/db.css">
    <link rel="stylesheet" href="../../css/nav.css" /><meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Admin crud</title>

</head>


<body>
    <div class="container pt-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-cerulean d-print" id="navbar">

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
                <li><a class="dropdown-item" href="../../users/audio/audiosection.php">Audio Stories</a></li>
                <li><a class="dropdown-item" href="../../users/books/bookSection.php">Books</a></li>

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
        <li class="nav-item active mar">
            <a class="nav-link" href="../../admin/landing_page/login.php">Log In</a>
        </li>
        <li class="nav-item  mar">
            <a class="nav-link" href="#">About us</a>
        </li>
        </li>
    </ul>
</div>

</nav>
    </div>

<section style="margin: 60px;">
    <div class="row">
        <div class="col-3 sm-col-12 xs-col-12">
          <div class="nav flex-column nav-pills"  aria-orientation="vertical">
                <?php
                    $curr_table = NULL; 
                    if( isset($_POST['table-name']) ){                                  // checking if table-name is sent by post method
                        $curr_table = $_POST['table-name'];
                    }

                    while($t_name = mysqli_fetch_assoc($table_list) ){                  // extract one table name row in association array
                        if( ! isset($_POST['table-name']) && ! isset($curr_table) )     // if table-name isn't sent by post method then
                            $curr_table = $t_name['TABLE_NAME'];                        // use first table as curr_table
                ?>
                        <form method="POST" action="#">
                            <input type="hidden" name="table-name" value="<?php echo $t_name['TABLE_NAME'] ?>" >
                            <input type="submit" class="nav-link" aria-selected="true"  value="<?php echo $t_name['TABLE_NAME'] ?>" >
                        </form>
                <?php
                    }                                                                   // end of while loop for table name
                ?>
            <a class="nav-link"  href="dbbook.html"  aria-selected="false">Books</a>
            <a class="nav-link active"  href="#" >Audio</a>
            <a class="nav-link"  href="dbpoem.html"  aria-selected="false">Poems</a>
          </div>
        </div>
        <div class="col-9  sm-col-12 xs-col-12">
            <table>
                <?php
                    $table_col_q = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
                                WHERE TABLE_NAME='".$curr_table."' 
                                ORDER BY ORDINAL_POSITION;";
                    $table_data_q = "SELECT * from ".$curr_table.";" ;

                    $table_data = mysqli_query($connection, $table_data_q);
                    $table_columns = mysqli_query($connection, $table_col_q);
                    $table_col_count = mysqli_num_rows( $table_columns );

                    $table_col_arr = [];
                    $index = 0;
                    echo '<tr>';
                    while($table_col_name = mysqli_fetch_assoc($table_columns) ){
                        $table_col_arr[$index] = $table_col_name['COLUMN_NAME'];
                        echo '<th>'.$table_col_name['COLUMN_NAME'].'</th>';
                        $index++;
                    }
                    echo'</tr>';
                    echo '<br>';
                    while( $table_row = mysqli_fetch_array($table_data) ){
                        echo '<tr>';
                        $col_index = 0;
                        while($col_index < $table_col_count){
                            echo '<td>'.$table_row[$col_index].'</td>';
                            $col_index++;
                        }
                        echo '<form method="post" action="#">
                                <input type="hidden" name="table-name" value="'.$curr_table.'">
                                <input type="hidden" name="row-id" value="'.$table_row[0].'" >
                                <td><input type="submit" name="row-action" value="Update" ></td>
                                <td><input type="submit" name="row-action" value="Delete" ></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
      </div>
</section>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/gh/kmlpandey77/bootnavbar/js/bootnavbar.js"></script>
        <script>
          $('navbar').bootnavbar();
      </script>
</body>

</html>