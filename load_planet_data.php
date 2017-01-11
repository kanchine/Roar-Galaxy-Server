    <?php
    $servername = "localhost";
    $username = "root";
    $password = "Tcw@388254";
    $dbName = "Roar_Galaxy";
    
    //Make connection
    $conn = new mysqli($servername,$username,$password,$dbName);
    
    //Check connection
    
    if(!$conn){
        die("Connection failed. ". mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM planet_data";
    $result = mysqli_query($conn,$sql);
    
    if(!$result) { 
        die("Connection failed. ". mysql_error());
    }
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "id:".$row['ID']."|filesource:".$row['filesource']."|username:".$row['username']. ";";
        }
    }
?>