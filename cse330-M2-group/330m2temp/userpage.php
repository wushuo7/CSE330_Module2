<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>User Page</title>
<style type="text/css">
    div#Header{
        background-color:aquamarine;
        padding: 10px;
        width: 100%;
    }
    p#headerWords{
        text-align:center;
        font-family:fantasy;
        font-size: 60px;
        font-weight: bold;
        width: 100%;
    }
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
    .listOfFiles{
        background-color:lightgreen;
        padding: 10px;
        width: 100%;
        font-family:fantasy;
        font-size: 20px;
        /*font-weight: bold;*/
        /*width: 100%;*/
    }
    .openFile{
        background-color:lightslategray;
        padding: 10px;
        width: 100%;
        font-family:fantasy;
        font-size: 20px;
    }
    .uploadFile{
        background-color:lemonchiffon;
        padding: 10px;
        width: 100%;
        font-family:fantasy;
        font-size: 20px;
    }
    .deleteFile{
        background-color:lightcoral;
        padding: 10px;
        width: 100%;
        font-family:fantasy;
        font-size: 20px;
    }
</style>
</head>
<body>
    <div id="Header">

    <p id=headerWords>Your File Sharing System</p>

    </div>
    <div class="listOfFiles">
        <p>Here are the files that you have uploaded:<p><br>
        
        <?php
            session_start(); //show the files that the user upload
            $username = $_SESSION['username'];
            $fileDirectory = sprintf("/home/wushuo/users/%s", $username);
            $dh=opendir($fileDirectory);
            if(is_dir($fileDirectory)){
                    while((($filename=readdir($dh))!=false)){
                        if(($filename != '.') && ($filename != '..')){
                            //  echo '<a href=' . $fileDirectory . '/' . $filename.'>' . $filename ."</a>" . "<br>";
                            echo $filename. "<br>";
                       }
                        
                    }
                    closedir($dh);

            }
        ?>
        
    </div>
    <div class="openFile">
              <form action="openFile.php" method="POST">
            <br>
            Choose a file to open:
            <br>
            <select name="openFiles">

            <?php
            session_start();
            $username = $_SESSION['username'];
            if( !preg_match('/^[\w_\-]+$/', $username) ){
                echo "Invalid username";
                exit;
            }
            $fileDirectory = sprintf('/home/wushuo/users/%s', "$username");// open a file 
            $dh=opendir($fileDirectory);
            if(is_dir($fileDirectory)){
                    while((($filename=readdir($dh))!=false)){
                        if(($filename != '.') && ($filename != '..')){
                             echo '<option value=' . $filename . '>' . $filename .'</option>'. "<br>";
                        }
                        
                    }
                    closedir($dh);
            }
            ?>
            </select>
            <input type="submit" name="open" value="OPEN">
        </form>   




    </div>



    <div class="uploadFile">
        <form enctype="multipart/form-data" action="upload.php" method="POST" > 
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                <br>
                <label for="uploadfile_input">Choose a file to upload:</label>
                <br>
                <input name="uploadedfile" type="file" id="uploadfile_input" />
                <input type="submit" value="Upload File" />
        </form>
    </div>
    <div class="deleteFile">
        <form action="deleteFile.php" method="POST">
            <br>
            Choose a file to be deleted:
            <br>
            <select name="files">

            <?php
            session_start();
            
            $username = $_SESSION['username'];
            
            $fileDirectory = sprintf("/home/wushuo/users/%s", $username); // delete a file
            $dh=opendir($fileDirectory);
            if(is_dir($fileDirectory)){
                    while((($filename=readdir($dh))!=false)){
                        if(($filename != '.') && ($filename != '..')){
                             echo '<option value=' . $filename . '>' . $filename .'</option>'. "<br>";
                        }
                        
                    }
                    closedir($dh);
            }
            ?>
            </select>
            <input type="submit" name="delete" value="DELETE">
        </form>
    </div>
    <div>
        <blockquote>Logout here!<br>
            <form action="logout.php" method="POST">
            <input type="submit" name="logout" value="LOGOUT"> 
        </form>
            <br>
            Delete user!<br>
            <form action="deleteuser.php" method="POST">
            <input type="submit" name ="delete" value="DELETE">
            </form>    
        </blockquote>
        
    </div>


</body>
</html>