<?php
session_start();
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     var_dump($_POST);
// } else {
//     echo "No data received.";
// }
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$age = $_POST["age"];
$address = $_POST["address"];
$checkemail= $email;
$servername ="localhost";
$username = "root";
$password = "";

$mycon = mysqli_connect($servername, $username, $password,"userstest");
if (!$mycon) {
    die("Connection failed: " . mysqli_connect_error());
}

// $mysqldb = "CREATE DATABASE userstest";
// if (mysqli_query($mycon, $mysqldb)) {
//     echo "Database created successfully";
//   } else {
//     echo "Error creating database: " . mysqli_error($mycon);
//   }

// $mysqltb = 'CREATE TABLE aboutuser if not exists(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     age int(3) NOT NULL,
//     address varchar(30) NOT NULL
//     )';


// if (mysqli_query($mycon, $mysqltb)) {
//     echo "Table created successfully";
//     } else {
//     echo "Error creating table: " . mysqli_error($mycon);
// }
      

$select = mysqli_query($mycon,"SELECT * FROM `aboutuser` WHERE email = '$checkemail'");

if(mysqli_num_rows($select)>0) {
    $_SESSION['error'] = "that email is alresdy being used"; 
}else{

    $insert = "INSERT INTO `aboutuser` (firstname, lastname, email, age, address) VALUES ('$firstname','$lastname','$email','$age','$address')";
    if(mysqli_query($mycon, $insert)) {
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $insert. " . mysqli_error($mycon);
    }
    $_SESSION['perfect'] = "you registered successfully"; 
}



if($_POST['firstname'] == ""){
    $_SESSION['firsterror'] = "the field FIRSTNAME must not be empty"; 
} 
if($_POST['lastname'] == ""){
    $_SESSION['lasterror'] = "the field LASTNAME must not be empty"; 
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['emailerror'] = "that is not an EMAIL address";
}
if($_POST['age'] == ""){
    $_SESSION['ageerror'] = "the field AGE must not be empty"; 
}
if($_POST['address'] == ""){
    $_SESSION['addresserror'] = "the field ADDRESS must not be empty"; 
}
header('Location: index.php');
