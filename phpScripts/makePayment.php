<?php 

include 'dbConnection.php';

$conn = openConn();

//Retrieve form data for payment
$studentID = $_POST['studentid'];
$amount = trim(mysqli_real_escape_string($conn, $_POST['amount']));
$currentDate = date('Y-m-d');

//Insert data in the accounting table by studentID
$query = "INSERT INTO accounting(`amount`, `studentID`, `date`) VALUES($amount, '$studentID', '$currentDate') ";
$runQuery = $conn->query($query);

if($runQuery)
{
    $success = "Payment was successfully made for " . " " . $studentID;
    header('Location:../makePayment.php?success='.$success);
    exit();
}
else 
{
    $error = "Something went wrong making payment";
    header('Location:../makePayment.php?error='.$error);
    exit();
}

closeConn($conn);


?>