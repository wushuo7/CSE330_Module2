<?php
    
    session_start();
    $username = $_SESSION['username'];
    if( !preg_match('/^[\w_\-]+$/', $username) ){
            echo "Invalid username";
            exit;
     }// check the username 
     $filename=$_POST["files"];
     $fileLocation = sprintf("/home/wushuo/users/%s/%s", $username,$filename); // open the file 
     
     unlink($fileLocation)or die("Cannot delete file."); //delete the file
     echo $filename . " has been deleted!";
     

?>