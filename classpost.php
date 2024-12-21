<?php
// class Post{
//     private $title ;
//     private $description;
//     private $image;
//     public function __construct(String $title, String $description, String $image){
//         $this->title = $title;
//         $this->description = $description;
//         $this->image = $image;
//     }
// }

// $out = new Post("title", "description","image");

// use function PHPSTORM_META\type;

class User{
    // private $firstname, $lastname, $email, $password, $age, $address, $image , $role;
    
    public static function addToDB( $firstname, $lastname, $email, $password, $age, $address, $image,$role){
        $servername ="localhost";
        $username = "root";
        $passworddb = "";
        $checkemail= $email;

        $mycon = mysqli_connect($servername, $username, $passworddb,"userstest");
        if($_POST['firstname'] == ""){
            $_SESSION['firsterror'] = "the field FIRSTNAME must not be empty"; 
            $_SESSION["errorr"] = "error";
        } 
        if($_POST['lastname'] == ""){
            $_SESSION['lasterror'] = "the field LASTNAME must not be empty"; 
            $_SESSION["errorr"] = "error";
            
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailerror'] = "that is not an EMAIL address";
            $_SESSION["errorr"] = "error";

        }
        if($_POST['password'] == ""){
            $_SESSION['passworderror'] = "the field PASSWORD must not be empty"; 
            $_SESSION["errorr"] = "error";

        }
        if($_POST['age'] == ""){
            $_SESSION['ageerror'] = "the field AGE must not be empty"; 
            $_SESSION["errorr"] = "error";

        }
        if($_POST['address'] == ""){
            $_SESSION['addresserror'] = "the field ADDRESS must not be empty"; 
            $_SESSION["errorr"] = "error";

        }

        $select = mysqli_query($mycon,"SELECT * FROM `aboutuser` WHERE email = '$checkemail'");
    
        if(mysqli_num_rows($select)===1) {
            $_SESSION['error'] = "that email is alresdy being used"; 
           
        }else if( $_SESSION["errorr"] != "error"){
    
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $insert = "INSERT INTO `aboutuser` (firstname, lastname, email, password, age, address, image,role) 
            VALUES ('$firstname','$lastname','$email','$hashed_password','$age','$address','$image','$role')";  
                 
            if(mysqli_query($mycon, $insert)) {
                echo "Records inserted successfully.";
                $_SESSION['perfect'] = "you registered successfully"; 

            } else{
                echo "ERROR: Could not able to execute $insert. " . mysqli_error($mycon);
            }
            $uploaddir = 'image/';
            $uploadfile = $uploaddir . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.\n";
            } else {
                echo "Possible file upload attack!\n";
            }
          
        }
                
    }
    public static function getFromDB ($emaillogin, $passwordlogin){
        $servername ="localhost";
        $username = "root";
        $passworddb = "";

        $mycon = mysqli_connect($servername, $username, $passworddb,"userstest");

        if (!$mycon) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $selectfromdb = "SELECT * FROM `aboutuser` WHERE email= '$emaillogin' ";
        $result = mysqli_query($mycon, $selectfromdb);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            var_dump($row);
            if (password_verify($passwordlogin, $row['password'])) {
                echo ' Password is valid!';
                $_SESSION['loggedin'] = true;
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['role'] = $row['role'];

                return true;
            } else {
                echo ' Invalid password.';
                $_SESSION['error'] = "Incorrect password.";
                return false;
            }
        } else {
            echo "0 results";
            $_SESSION['error'] = "No user found with this email.";
            return false;
        }
    }
    public static function addToStudentDB( $firstname,$lastname, $course, $faculty, $grade){
        $servername ="localhost";
        $username = "root";
        $passworddb = "";
        $mycon = mysqli_connect($servername, $username, $passworddb,"userstest");


        // $mysqltb = 'CREATE TABLE if not exists aboutstudent(
        // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        // firstname VARCHAR(30) NOT NULL,
        // lastname VARCHAR(30) NOT NULL,
        // course INT(6) NOT NULL,
        // faculty VARCHAR(255) NOT NULL,
        // grade INT(6) NOT NULL
        // )';
    
    
        // if (mysqli_query($mycon, $mysqltb)) {
        //     echo "Table created successfully";
        //     } else {
        //     echo "Error creating table: " . mysqli_error($mycon);
        // }
        $insert = "INSERT INTO `aboutstudent` (firstname, lastname, course, faculty, grade) 
            VALUES ('$firstname','$lastname','$course','$faculty','$grade')";  
                 
            if(mysqli_query($mycon, $insert)) {
                echo "Records inserted successfully.";
                $_SESSION['perfect'] = "you added successfully"; 

            } else{
                echo "ERROR: Could not able to execute $insert. " . mysqli_error($mycon);
            }
    }
    public static function delete($id){
        $servername ="localhost";
        $username = "root";
        $passworddb = "";
        $mycon = mysqli_connect($servername, $username, $passworddb,"userstest");
        $sql = "DELETE FROM aboutstudent WHERE id=$id";

        if (mysqli_query($mycon, $sql)) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($mycon);
        }
    } 
    public static function update($id,$firstname,$lastname, $course, $faculty, $grade){
        $servername ="localhost";
        $username = "root";
        $passworddb = "";
        $mycon = mysqli_connect($servername, $username, $passworddb,"userstest");
        $sql = "UPDATE aboutstudent SET firstname = '$firstname', lastname = '$lastname', course = '$course', faculty = '$faculty', grade = '$grade' WHERE id = '$id'";

        if (mysqli_query($mycon, $sql)) {
        echo "Record edited successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($mycon);
        }

    }
}