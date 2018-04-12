<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username']=$username;

    include 'DataAccess.php';
    try{
        $da = new Database();
        $da->loginVerify($username,$password);
    }catch(Exception $e){echo "Connection failed !".$e->geMessage();}
}

if($_SERVER['REQUEST_METHOD']=='GET'){
    $user = $_SESSION['username'];
    if($user=="admin"){
        header('Location:admin.php');
    }else{
        header('Location:userprofile.php');
    }
}
?>