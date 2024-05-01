<?php 
    session_start();
    //unset session variables
    session_unset();

    //Destroy session
    session_destroy();

    //Return user back to main page
    header("Location:../../index.php");

    exit();




?>