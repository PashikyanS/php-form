<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
    <?php
   
    // $firstname = "";
    // $lastname = "";
    // $email = "";
    // $age = "";
    // $address ="";
    // $password = "";
    // $error = "";
    // $perfect = "";
    
   
    // if( isset( $_SESSION['firsterror']) && !empty($_SESSION['firsterror'])){
    //     $firstname = $_SESSION['firsterror'];
    // }
    // if( isset( $_SESSION['lasterror']) && !empty($_SESSION['lasterror'])){
    //     $lastname = $_SESSION['lasterror'];
    // }
    // if(isset( $_SESSION['emailerror']) && !empty($_SESSION['emailerror']) ){
    //     $email = $_SESSION['emailerror'];
    // }
    // if( isset( $_SESSION['passworderror']) && !empty($_SESSION['passworderror'])){
    //     $password = $_SESSION['passworderror'];
    // }
    // if( isset( $_SESSION['ageerror']) && !empty($_SESSION['ageerror'])){
    //     $age = $_SESSION['ageerror'];
    // }
    // if( isset( $_SESSION['addresserror']) && !empty($_SESSION['addresserror'])){
    //     $address = $_SESSION['addresserror'];
    // }
    // if( isset( $_SESSION['perfect']) && !empty($_SESSION['perfect'])){
    //     $perfect = $_SESSION['perfect'];
    // }
    
    ?>
    <div class="containerr">
         <form class="form1" action="request.php" method="POST">
         <?php
            // if($error != ""){
            //     echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $error."</span>";
            // }else if($perfect != ""){
            //     echo "<span style='color:green; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $perfect."</span>";
            // }
          ?>

            
            <div>
                <label for="emaillogin">Email</label>
                <input type="email" id="emaillogin" name="emaillogin" placeholder="example@gmail.com">
                <?php 
                // if($email != ""){
                // echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $email."</span>";
                // } 
                ?>
            </div>
            <div>
                <label for="passwordlogin">Password</label>
                <input type="password" id="passwordlogin" name="passwordlogin" placeholder="12345678">
                <?php 
                // if($email != ""){
                // echo "<span style='color:red; font-weight: 200; padding-left: 10px; font-size: 15px; margin:0;font-family: sans-serif'>". $password."</span>";
                // } 
                ?>
            </div>
            
            <input type="submit" id="submit" value="LogIn">
            
            
        </form>
    </div>

</body>
</html>
<?php
    session_destroy();
?>