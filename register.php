<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $address=$_POST['address'];
    $country=$_POST['country'];
    $user=$_POST['username'];
    $pass=$_POST['password'];

    include 'DataAccess.php';
    try{
        $da = new Database();
        $da->registerUser($name,$email,$phone,$dob,$address,$country,$user,$pass);

    }catch(Exception $e){echo "Connection Failed !".$e->getMessage();}
}
?>