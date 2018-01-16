<?php
    session_start();
    if(isset($_POST['submit'])){// check the usename 
        if(isset($_POST['username'])){
            $_SESSION['username']=$_POST['username'];
            $username=$_SESSION['username'];
            if( !preg_match('/^[\w_\-]+$/', $username) ){
            echo "Invalid username";
            exit;
    }
        }
    }
    // $checkusers=fopen("http://ec2-34-212-33-18.us-west-2.compute.amazonaws.com/~simonwustl/users.txt","r");
    $checkusers=fopen("/home/wushuo/public_html/users.txt","r");
    while( !feof($checkusers)){
            if(trim(fgets($checkusers))==$username){
                    header("Location: userpage.php"); // open the userpage if user name  exits
                    exit;
            }
    }
    header("Location: loginerrorpage.html");// return wrong if the user name doesn't exist
    fclose($checkusers);
    exit;
    


?>