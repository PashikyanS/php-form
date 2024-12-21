<?php
session_start();
include "classpost.php";


if( (isset( $_POST['emaillogin']) and !empty($_POST['emaillogin'])) or ( isset( $_POST['passwordlogin']) and !empty($_POST['passwordlogin']))){
    $emaillogin = $_POST["emaillogin"];
    $passwordlogin = $_POST["passwordlogin"];
    User::getFromDB($emaillogin,$passwordlogin);
    header('Location: adminuser.php');

    
}else if(isset($_POST["login"])) {
    header('Location: login.php');
} else{
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $image = $_FILES["image"]["name"];
    $role = $_POST["role"];

    // $added= mysqli_query($mycon,"ALTER TABLE `aboutuser` ADD role VARCHAR(5)  after `image`");

    User::addToDB($firstname,$lastname,$email,$password,$age,$address,$image,$role);
    header('Location: index.php');

}   

