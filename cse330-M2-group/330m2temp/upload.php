<?php
    session_start();
    // Get the filename and make sure it is valid
    // echo"hi";
    // if(isset($_POST["uploadedfile"])){
       
            $filename = basename($_FILES['uploadedfile']['name']);
            if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
                echo "Invalid filename";
                exit;
            }
            // Get the username and make sure it is valid
            $username = $_SESSION['username'];
            if( !preg_match('/^[\w_\-]+$/', $username) ){
                echo "Invalid username";
                exit;
            }
            // $full_path = "http://ec2-34-212-33-18.us-west-2.compute.amazonaws.com/~simonwustl/uploads/" . $filename;
            // $full_path = sprintf("/home/simonwustl/%s/%s",  $username , $filename);
            $full_path = sprintf("/home/wushuo/users/%s/%s", $username, $filename); // upload file as told
            // if(!file_exists($full_path)){
                 
            // }

            if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
                echo "The file ". $filename . " has been successfully uploaded";
                
                exit;
            }else{
                echo "The file ". $filename . " has not been successfully uploaded! You should Do it again.";
                exit;
            }
            $_SESSION
    // }

?>