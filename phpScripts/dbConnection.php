<?php 

    function openConn()
    {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "school_system";

        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName) or die("Connection failed!" . $conn->error);
        return $conn;
    }

    function closeConn($conn)
    {
        $conn->close();
    }
?>