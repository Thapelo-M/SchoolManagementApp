<?php 
    session_start();
    include '../dbConnection.php';

    $conn = openConn();

    //Handle student information logic
    $name = mysqli_escape_string($conn, $_POST['name']);
    $surname = mysqli_escape_string($conn, $_POST['surname']);
    $dob = mysqli_escape_string($conn, $_POST['dob']);
    $gender = mysqli_escape_string($conn, $_POST['gender']);
    $address= mysqli_escape_string($conn, $_POST['address']);
    $grade = mysqli_escape_string($conn, $_POST['grade']);
    $supportingDoc = uploadDoc();
    $admissionStatus = "Pending";
    $parentID = $_SESSION['user'];
    $studentID = generateUserId();
    $profilePic = uploadFile();

    //Register a student 
    
    $stmtStudent = "INSERT INTO students(studentID, parentID, admissionStatus, dob, gender, supportingDocs, address, name, surname, profile, grade) VALUES('$studentID', '$parentID', '$admissionStatus', '$dob', '$gender', '$supportingDoc', '$address', '$name', '$surname', '$profilePic', '$grade')";
    $stmtStudentRun = $conn->query($stmtStudent);
    
    if($stmtStudent)
    {
        $success = "Student was successfully registered please await admission status";
        header('Location:../../dashboard.php?success='.$success);
        exit();
    }
    else 
    {
        $error = "An Error occured while adding student.";
        header('Location:../../dashboard.php?success='.$error);
        exit();
    }

    function generateUserId()
    {
        //Generate random user id
        $uniqueId = uniqid();

        //Customize format
        $uid = "student" . $uniqueId;

        return $uid;
    }

    
    function uploadFile()
    {
        $pic = " ";

    if(isset($_FILES["profile"]) && $_FILES["profile"]["error"] == 0){
           $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
           $filename = $_FILES["profile"]["name"];
           $filetype = $_FILES["profile"]["type"];
           $filesize = $_FILES["profile"]["size"];

           // Verify file extension
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

           // Verify file size - 6MB maximum
           $maxsize = 6 * 1024 * 1024;
           if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

           // Verify MYME type of the file
           if(in_array($filetype, $allowed)){
               // Check whether file exists before uploading it
               if(file_exists("../upload/" . $filename)){
                   echo $filename . " is already exists.";
               } else{
                   move_uploaded_file($_FILES["profile"]["tmp_name"], "../upload/" . $filename);
                     $pic = $filename;
               }
           } else{
               echo "Error: There was a problem uploading your file. Please try again.";
           }
       } else{
           echo "Error: " . $_FILES["profile"]["error"];
       }

       return $pic;
    }

    function uploadDoc()
    {
        $pic = " ";

    if(isset($_FILES["recommendation"]) && $_FILES["recommendation"]["error"] == 0){
           $allowed = array("pdf" => "application/pdf");
           $filename = $_FILES["recommendation"]["name"];
           $filetype = $_FILES["recommendation"]["type"];
           $filesize = $_FILES["recommendation"]["size"];
            echo $filename;
           // Verify file extension
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

           // Verify file size - 6MB maximum
           $maxsize = 6 * 1024 * 1024;
           if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

           // Verify MYME type of the file
           if(in_array($filetype, $allowed)){
               // Check whether file exists before uploading it
               if(file_exists("../upload/docs/" . $filename)){
                   echo $filename . " is already exists.";
               } else{
                   move_uploaded_file($_FILES["recommendation"]["tmp_name"], "../upload/docs/" . $filename);
                     $pic = $filename;
               }
           } else{
               echo "Error: There was a problem uploading your file. Please try again.";
           }
       } else{
           echo "Error: " . $_FILES["recommendation"]["error"];
       }

       return $pic;
    }




?>