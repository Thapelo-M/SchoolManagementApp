<?php 
     $dbHost = "localhost";
     $dbUser = "root";
     $dbPass = "";
     $dbName = "school_system";

   
     $pdo = new PDO("mysql:host=$dbHost;dbname=school_system", $dbUser, $dbPass);

     $stmt = $pdo->prepare("SELECT * FROM users");
     $stmt->execute();

     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     header('Content-Type: application/json');
     echo json_encode($results);
     
     
?>