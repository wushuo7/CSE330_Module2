<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Creat User</title>
<style type="text/css">
blockquote{ 
        border-top: 3px solid black;
        border-bottom: 3px solid black;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 125%;
        font-style: italic;
        text-align:center;
        padding-top: 50px;
        padding-bottom: 50px;
    }
    </style>
</head>
<body>
<?php
    session_start();
    if(isset($_POST['submit'])){ // check the user name is legal
        if(isset($_POST['username'])){
            $_SESSION['username']=$_POST['username'];
            $username=$_SESSION['username'];
            if( !preg_match('/^[\w_\-]+$/', $username) ){
            echo "Invalid username";
            exit;
    }
        }
    }
    $checkusers=fopen("/home/wushuo/public_html/users.txt","r");
    while( !feof($checkusers)){ // find wether the username exists
            if(trim(fgets($checkusers))==$username){
                    echo "This user name already exists";
                    exit;
            }
    }
    fclose($checkusers);
    
    $myfile = fopen("users.txt", "a") or die("Unable to open file!");
    $txt = "\n$username";
    fwrite($myfile, $txt);
    fclose($myfile);
    
    mkdir("/home/wushuo/users/$username",0777); // make a dir for the new user to store files
    chmod("/home/wushuo/users/$username",0777);
    
    echo "You creat the new user successfully as ". $username ."<br>";
    ?>
    <div>
    <blockquote>Login here!<br>
            <form action="logout.php" method="POST">
            <input type="submit" name="logout" value="LOGIN"> 
        </form>
    </blockquote>
    </div>

</body>
</html>
    
    
    


