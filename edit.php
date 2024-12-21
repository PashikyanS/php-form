<?php session_start();
if($_SESSION["role"] === "user"){
    header('Location: adminuser.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
<div class="containerr">

         <form class="form1" action="studentrequest.php" method="POST">
         <div>
                <label for="id">Id</label>
                <input type="id" id="id" name="id" readonly="readonly" value="<?php echo $_SESSION["id"]  ?>">
            </div>
            <div>
                <label for="firstname">Firstname</label>
                <input type="firstname" id="firstname" name="firstname" value="<?php echo $_SESSION["editfname"] ?>">
            </div>
            <div>
                <label for="lastname">Lastname</label>
                <input type="lastname" id="lastname" name="lastname" value="<?php echo $_SESSION["editlname"] ?>">
            </div>
            <div>
                <label for="faculty">Faculty</label>
                <input type="faculty" id="faculty" name="faculty" value="<?php echo $_SESSION["editfaculty"] ?>">
            </div>
            <div>
                <label for="course">Course</label>
                <input type="course" id="course" name="course" value="<?php echo $_SESSION["editcourse"] ?>">
            </div>
            <div>
                <label for="grade">Grade</label>
                <input type="grade" id="grade" name="grade" value="<?php echo $_SESSION["editgrade"] ?>">
            </div>
            <input type="submit" name="editt" id="submit" value="Edit">
            
            
        </form>
    
</body>
</html>