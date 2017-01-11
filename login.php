    <?php
    $servername = "localhost";
    $server_username = "root";
    $server_password = "Tcw@388254";
    $dbName = "Roar_Galaxy";
    

    $username = $_POST["usernamePost"];
    $password = $_POST["passwordPost"];

    //Make connection
    $conn = new mysqli($servername,$server_username,$server_password,$dbName);
    
    //Check connection
    if(!$conn){
        die("Connection failed. ". mysqli_connect_error());
    }
    
    $sql_username = "SELECT password FROM users WHERE username = '".$username."'";
    //$sql_email = "SELECT password FROM users WHERE username = '".$username."'";
    $result_username = mysqli_query($conn,$sql_username);
    //$result_email = mysqli_query($conn,$sql_email);
    
    if(mysqli_num_rows($result_username) > 0){
	    while($row = mysqli_fetch_assoc($result_username)){
		    if($row['password'] == $password){
		        echo "Succeed";
		    }
		    else {
		    	echo "Password incorrect!";
		    }
		}
	}
	else{
		echo "User not found.";
	}
?>