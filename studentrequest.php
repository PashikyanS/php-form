<?php
session_start();
include "classpost.php";
print_r($_POST);

if(isset($_POST['edit'])) {
    $_SESSION["id"] = $_POST["id"];
    $_SESSION["editfname"] = $_POST["firstname"];
    $_SESSION["editlname"] = $_POST["lastname"];
    $_SESSION["editcourse"] = $_POST["course"];
    $_SESSION["editfaculty"] = $_POST["faculty"];
    $_SESSION["editgrade"] = $_POST["grade"];
    print_r($_SESSION);
    header('Location: edit.php');

}
if(isset($_POST['delete'])) {
    User::delete($_POST["id"]);
header('Location: adminuser.php');

}
if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $course = $_POST["course"];
    $faculty = $_POST["faculty"];
    $grade  = $_POST['grade'];

    User::addToStudentDB($firstname,$lastname,$course,$faculty,$grade);
header('Location: adminuser.php');

}
if(isset($_POST['editt'])) {
    $id = $_POST["id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $course = $_POST["course"];
    $faculty = $_POST["faculty"];
    $grade = $_POST["grade"];
    User::update($id,$firstname,$lastname,$course,$faculty,$grade);

    header('Location: adminuser.php');

}
if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');

}