<?php 

require './connect.php';

$fname=mysqli_escape_string($connection,$_GET['name']);

// echo $filename;


// The location of the PDF file 
// on the server 
$filename = "files/books/".$fname; 

// Header content type 
header("Content-type: application/pdf"); 

header("Content-Length: " . filesize($filename)); 

// Send the file to the browser. 
readfile($filename); 
?> 
