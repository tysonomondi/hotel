<?php
include "./include/db.php";
global $conn;
if(isset($_POST['signup'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST["lastname"];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "INSERT INTO users(firstname,lastname,email,phonenumber,username,password) VALUES('$firstname','$lastname','$email','$phonenumber','$username','$password')";
    $run = mysqli_query($conn, $query);
}
elseif(isset($_POST['login'])){
    $username = $_POST["username"];
    $password1 = $_POST["password"];
    $query = "SELECT * FROM users WHERE username='$username'";
    $run = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($run)){
        $password = $row['password'];
        $phonenumber= $row['phonenumber'];
    }
    if($password1 == null){
        echo "user doesn't exist";
    }elseif($password === $password1){
        echo "login succesful";
    }elseif($password1 != $password){
        echo "wrong password";
    }

}
?>