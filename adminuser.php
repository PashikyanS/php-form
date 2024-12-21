<?php session_start();
if(!isset($_SESSION["firstname"])){
    header('Location: login.php');
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
<body> 
    <?php 
    $image = $_SESSION["image"] ?? "user.jpg" ;
   
    ?>
    <div class="about">
        <div class="profil">
            <div class="userimage" style="background-image: url('image/<?php echo $image?>');height: 250px; width:250px; background-repeat: no-repeat; background-size: cover;border-radius:20px;')"></div>
            <div class="info">
                <span class="name"><?php echo $_SESSION["firstname"] ?></span>
                <span class="name"><?php echo $_SESSION["lastname"] ?></span>
                <p><?php echo $_SESSION["role"] ?></p>
                <form action="studentrequest.php" method="post">
                    <button class="delete" name="logout">Log Out</button>
                </form>
            </div>
        </div>
        <div class="input">
            <?php
                if($_SESSION["role"] === "admin"){
                    include "admin.php";
                }
            ?>
        </div>
    </div>
    <div class="table">
        
        <table class="studentlist">
            <?php 
            $servername ="localhost";
            $username = "root";
            $passworddb = "";
            $mycon = mysqli_connect($servername, $username, $passworddb,"userstest");
            $select = "SELECT * FROM `aboutstudent`";
            $result = mysqli_query($mycon, $select);
            if($result) {
                $_SESSION['perfect'] = "you added successfully"; 
            } else{
                echo "ERROR: Could not able to execute $select. " . mysqli_error($mycon);
            }
            ?>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Faculty</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <?php if($_SESSION["role"] === "admin"): ?>
                    <th>Edit</th>
                    <th>Delete</th>
                    <?php endif; ?>
                </tr>
                <?php 
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>". $row['id']."</td>
                            <td>". $row["firstname"]."</td>
                            <td>". $row["lastname"]."</td>
                            <td>". $row["faculty"]."</td>
                            <td>". $row["course"]."</td>
                            <td>". $row["grade"]."</td>";
                            echo "<form action='studentrequest.php' method = 'post'>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <input type='hidden' name='firstname' value='".$row['firstname']."'>
                            <input type='hidden' name='lastname' value='".$row['lastname']."'>
                            <input type='hidden' name='faculty' value='".$row['faculty']."'>
                            <input type='hidden' name='course' value='".$row['course']."'>
                            <input type='hidden' name='grade' value='".$row['grade']."'>";
                            if($_SESSION["role"] === "admin"){

                              echo " <td><button type = 'submit' class='edit' name = 'edit'>Edit</button> </td>
                            <td><button type = 'submit' class='delete' name = 'delete'>Delete</button> </td>";
                            }
                            echo "</form>";
                            echo "</tr>";
                    }

                ?>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>