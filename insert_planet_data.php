	<?php

    $servername = "localhost";
    $server_username = "root";
    $server_password = "Tcw@388254";
    $dbName = "Roar_Galaxy";
    
    $username = $_POST["usernamePost"];
    $filesource = $_POST["filesourcePost"];
 
    //Make connection
    $conn = new mysqli($servername,$server_username,$server_password,$dbName);
    
    //Check connection
    if(!$conn){
        die("Connection failed. ". mysqli_connect_error());
    }

    $sql = "INSERT INTO planet_data (username,filesource)
            VALUES ('".$username."','".$filesource."')";

    $result = mysqli_query($conn,$sql);
    
    if(!$result) { 
        die("Connection failed. ". mysql_error());
    }
?>