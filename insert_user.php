	<?php
    include 'functions.php';
    $servername = "localhost";
    $server_username = "root";
    $server_password = "Tcw@388254";
    $dbName = "Roar_Galaxy";
    
    $username = $_POST["usernamePost"];
    $email = $_POST["emailPost"];
    $password = $_POST["passwordPost"];
    $confPassword = $_POST["confPasswordPost"];

    //Make connection
    $conn = new mysqli($servername,$server_username,$server_password,$dbName);
    
    //Check connection
    if(!$conn){
        die("Connection failed. ". mysqli_connect_error());
    }

    $pass = true;
    $problem = "";
    $succeed = "Register sucessfully!";
    //Validate username is not empty and is not already in the database.
    if($username == ""){
    	$pass = false;
    	$problem = $problem . "Warning: username cannot be empty.\r\n";
    }
    else if(getUser($conn, $username) == true){
    	$pass = false;
    	$problem = $problem . "Warning: username already exist.\r\n";
    }

    //Validate email is not empty and is not already in the database.
    if(getEmail($conn,$email) == true){
    	$pass = false;
    	$problem = $problem . "Warning: the email has already been used to register.\r\n" ;
    }
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
    	$pass = false;
    	$problem = $problem . "Warning: invalid email input.\r\n";
    }

    //Validate password input is value and matches the confirmed password
    if($password == "" || $confPassword == ""){
    	$pass = false;
    	$problem = $problem . "Warning: password cannot be empty.\r\n";
    }
    else if($password != $confPassword){
    	$pass = false;
    	$problem = $problem . "Warning: mismatch password.\r\n";
    }

    if($pass){
	    $sql = "INSERT INTO users (username,email,password)
	    		VALUES ('".$username."','".$email."','".$password."')";
	    $result = mysqli_query($conn,$sql);
	    
	    if(!$result) { 
	        die("Connection failed. ". mysql_error());
	    }

	    echo $succeed;
	}
	else
		echo $problem;
?>