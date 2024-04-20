<?php

    include 'dbConnection.php';
    $conn = openConn();
    
    //Process registration information and register user
    $name = trim(mysqli_escape_string($conn, $_POST['name']));
    $surname = trim(mysqli_escape_string($conn, $_POST['surname']));
    $email = trim(mysqli_escape_string($conn, $_POST['email']));
    $address = trim(mysqli_escape_string($conn, $_POST['address']));
    $password = trim(mysqli_escape_string($conn, $_POST['password']));

    $workAddress= trim(mysqli_escape_string($conn, $_POST['workAddress']));
    $occupation = trim(mysqli_escape_string($conn, $_POST['occupation']));
    $uid = generateUserId();

    $checkEmailQuery = "SELECT email FROM users WHERE `email` = '$email'";
    $runEmailQuery = mysqli_query($conn, $checkEmailQuery);
    $pic = uploadFile();

    $addUserQuery = "INSERT INTO users(`uid`, `name`, `surname`, `email`, `address`, `userType`, `password`, profile_pic)
    VALUES('$uid', '$name', '$surname', '$email', '$address', 'Parent', '$password', '$pic')";

    $addParentDetails = "INSERT INTO parents VALUES('$uid', '$workAddress', '$occupation')";
    // $results = $conn->query($checkEmailQuery);
    // while($emailRows = mysqli_fetch_assoc($results))
    // {
    //     echo $emailRows['email'];
    // }

    if(mysqli_num_rows($runEmailQuery) >= 1)
    {
        $emailExists = "Email entered already exists in the system";
        header('Location:../register.php?error='.$emailExists);
        exit();
    }
    else
    {
        // $runAddUser = mysqli_query($conn, $addUserQuery);
        $runAddUser = $conn->query($addUserQuery);
        $runAddParentInfo = $conn->query($addParentDetails);
        $registered = "Successfully registered please login";
        header('Location:../index.php?success='.$registered);
        exit();
    }

    /*
        if(!$conn->query("INSERT INTO users(`uid`, `name`, `surname`, `email`, `address`, `userType`, `password`)
    VALUES('$uid', '$name', '$surname', '$email', '$address', 'parent', '$password')"))
        {
            echo ("Error: " . $conn->error);
        }
    */
    function generateUserId()
    {
        //Generate random user id
        $uniqueId = uniqid();

        //Customize format
        $uid = "user" . $uniqueId;

        return $uid;
    }

    function uploadFile()
    {
        $pic = " ";

    if(isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0){
           $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
           $filename = $_FILES["pic"]["name"];
           $filetype = $_FILES["pic"]["type"];
           $filesize = $_FILES["pic"]["size"];

           // Verify file extension
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

           // Verify file size - 6MB maximum
           $maxsize = 6 * 1024 * 1024;
           if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

           // Verify MYME type of the file
           if(in_array($filetype, $allowed)){
               // Check whether file exists before uploading it
               if(file_exists("upload/" . $filename)){
                   echo $filename . " is already exists.";
               } else{
                   move_uploaded_file($_FILES["pic"]["tmp_name"], "upload/" . $filename);
                     $pic = $filename;
               }
           } else{
               echo "Error: There was a problem uploading your file. Please try again.";
           }
       } else{
           echo "Error: " . $_FILES["pic"]["error"];
       }

       return $pic;
    }

?>