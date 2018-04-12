<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--navigation bar-->
    <div class="topNavigation">
        <div class="topNavButtons" style="float:right">
                <a href="verify.php">Profile</a>
                <a href="logout.php">Log Out</a>
        </div>
    </div>
    <div id="tabledata">
        <h2>Rendered Data</h2>
        <?php
        include 'DataAccess.php';
        try{
            $da = new Database();
            $da->getAllData();
        }catch(Exception $e){echo "Error:".$e->getMessage();}
        ?>
    </div>
    <div id="profileStatus">
    <?php
        $user = $_SESSION['username'];
        try{
            $da->getUserData($user);
        }catch(Exception $e){echo "Error:".$e->getMessage();}
        ?>
        <div id="notifications">
            <div id="icons"><i class="fa fa-microphone fa-2x"></i><i class="fa fa-envelope fa-2x"></i><i class="fa fa-flag fa-2x"></i></div>
            <div id="panel"></div>
        </div>
        <a href="editprofile.php">Edit Profile</a><br>
        <a href="adminmanage.html">Manage Employees</a>
    </div>
</body>
</html>