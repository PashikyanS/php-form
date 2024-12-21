<?php
class connect {
    public static function conn(){
        $servername ="localhost";
        $username = "root";
        $passworddb = "";
        $mycon = mysqli_connect($servername, $username, $passworddb,"userstest");
        if (!$mycon) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $mycon;
    }
}