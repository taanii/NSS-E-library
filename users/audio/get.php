<?php
    require '../../connect.php';

    //displaying first 16 Audiobooks
    if(isset($_POST['start'])  )
    {
        // || isset($_POST['submit'])
        echo isset($_POST['submit']);
        $start= mysqli_real_escape_string($connection,$_POST["start"]) ;
        $sql_query="SELECT * FROM `audios` LIMIT $start,12";
        $res =mysqli_query($connection,$sql_query);
        if(mysqli_num_rows($res)> 0)
        {
            $html="<h2>nothing to display</h2>";
?>
    	    
            <div class="row">
                <?php

                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4  my-4 ">
                        <div class="card ">
                            <a href="<?php 
                            echo './playAudio.php?name='.$row['name']; ?>". target="_blank"> 

                            <div class="card-img-top">
                                <!-- card-block -->
                                <img src="./img/thumbnail2.png" >
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
            </div>
            <!-- end of row div -->

        <?php 
        }//end of -- while statmnt
        //echo $html;
    }//end of if statmnt

else{
    echo"error.....First  16 audio files can't be displayed";
}

?>