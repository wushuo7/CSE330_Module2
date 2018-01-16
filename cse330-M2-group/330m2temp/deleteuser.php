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
    $username = $_SESSION['username'];
    if(isset($_POST['submit'])){
        if(isset($_POST['username'])){
            $_SESSION['username']=$_POST['username'];
            $username=$_SESSION['username'];
            if( !preg_match('/^[\w_\-]+$/', $username) ){
            echo "Invalid username";
            exit;
    }
        }
    }
        
        function delDirAndFile($dirName){
        if ( $handle = opendir( "$dirName" ) ) {
        while ( false !== ( $item = readdir( $handle ) ) ) {
        if ( $item != "." && $item != ".." ) {
        if( unlink( "$dirName/$item" ) )echo "delete the file successfully： $dirName/$item
        \n";
        
        }
        }
        closedir( $handle );
        if( rmdir( $dirName ) )echo "delete Directory successfully： $dirName\n";
}
}
        $fileLocation = sprintf("/home/wushuo/users/%s/%s", $username,$filename);
        delDirAndFile($fileLocation);
        
        $wanttomove= "$username";
        
        
        
        $data = file("/home/wushuo/public_html/users.txt");
        $out = array();
        foreach($data as $line) {
        if(trim($line) != $wanttomove) {
           $out[] = $line or die("Unable to open file!");
         }
        }

        $fp = fopen("users.txt", "w+");
        flock($fp, LOCK_EX);
        foreach($out as $line) {
            fwrite($fp, $line) or die("Unable to open file!2");
        }
        flock($fp, LOCK_UN);
        fclose($fp);
        
        
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