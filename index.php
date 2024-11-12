<?php session_start();?>
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
    $firstname = "";
    $lastname = "";
    $email = "";
    $age = "";
    $address ="";
    $error = "";
    $perfect = "";
    
   
    if( isset( $_SESSION['firsterror']) && !empty($_SESSION['firsterror'])){
        $firstname = $_SESSION['firsterror'];
    }
    if( isset( $_SESSION['lasterror']) && !empty($_SESSION['lasterror'])){
        $lastname = $_SESSION['lasterror'];
    }
    if(isset( $_SESSION['emailerror']) && !empty($_SESSION['emailerror']) ){
        $email = $_SESSION['emailerror'];
    }
    if( isset( $_SESSION['ageerror']) && !empty($_SESSION['ageerror'])){
        $age = $_SESSION['ageerror'];
    }
    if( isset( $_SESSION['addresserror']) && !empty($_SESSION['addresserror'])){
        $address = $_SESSION['addresserror'];
    }
    if( isset( $_SESSION['perfect']) && !empty($_SESSION['perfect'])){
        $perfect = $_SESSION['perfect'];
    }
    ?>
    <div class="container">
         <form action="request.php" method="POST">
         <?php
            if($error != ""){
                echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $error."</span>";
            }else if($perfect != ""){
                echo "<span style='color:green; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $perfect."</span>";
            }
          ?>

            <div>
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" placeholder="John">
                <?php if($firstname != ""){
                echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $firstname."</span>";
                } ?>
            </div>
            <div>
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" placeholder="Doe">
                <?php if($lastname != ""){
                echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $lastname."</span>";
                } ?>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com">
                <?php if($email != ""){
                echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $email."</span>";
                } ?>
            </div>
            
            <div>
                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="30">
                <?php if($age != ""){
                echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $age."</span>";
                } ?>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="USA">
                <?php if($address != ""){
                echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $address."</span>";
                } ?>
            </div>
            <input type="submit" id="submit" value="Submit">
        </form>
    </div>

</body>
</html>
<?php
    session_destroy();
?>