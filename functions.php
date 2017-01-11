<?php
    //Retrieves user information from user table
    function getUser($conn, $username){
        $query = "SELECT * FROM users WHERE username = '$username'";
        $user_data = mysqli_query($conn,$query);
        if($user = mysqli_fetch_assoc($user_data))
            return $user;
        else
            return null;
    }

    function getEmail($conn,$email){
        $query = "SELECT * FROM users WHERE email = '$email'";
        $email_data = mysqli_query($conn,$query);
        if($email = mysqli_fetch_assoc($email_data))
            return $email;
        else
            return null;
    }
?>