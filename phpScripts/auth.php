<?php

    include 'dbConnection.php';
    session_start();
    
    $conn = openConn();

    $user = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $pass = trim(mysqli_real_escape_string($conn, $_POST['password']));

    $query = "SELECT * FROM users WHERE email = '".$user."' AND password = '".$pass."' ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1)
    {
        
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user['uid'];
        
        //Redirect users based on user type
        if($user['userType'] == "Admin")
        {
            header('Location:../adminDashboard.php');
            exit();
        }
        else if($user['userType'] == "Parent")
        {
            header('Location:../dashboard.php');
            exit();
        }
       
    }
    else 
    {
        header('Location:../index.php?errorMessage=PasswordError');
        exit();
    }

    if(!isset($_SESSION['userEmail']))
    {
        header('Location:../index.php');
        exit();
    }

?>