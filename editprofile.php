<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    ?>
    <!--navigation bar-->
    <div class="topNavigation">
        <div class="topNavButtons" style="float:right">
            <a href="verify.php">Profile</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
    <div id="erpheader">
            <h1><em>Tour Cafe</em></h1>
    </div>
    <div id="editForm">
        <div id="editFields">
            <h2>Choose:</h2>
            <form action="editprofile.php" method="post" id="editing">
                <select name="fields">
                    <option value="name">Name</option>
                    <option value="email">Email ID</option>
                    <option value="address">Address</option>
                    <option value="phone">Phone</option>
                    <option value="dob">Date Of Birth</option>
                    <option value="country">Country</option>
                </select>
                <input type="text" name="new" class="inputFields"><br>
                <input type="submit" value="Edit Profile" class="inputButtons">
                <?php
                    include 'DataAccess.php';
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $user = $_SESSION['username'];
                        $field = $_POST['fields'];
                        $data = $_POST['new'];

                        try{
                            $da = new Database();
                            $da->updateUserData($field,$data,$user);

                        }catch(Exception $e){echo "Connection Error:".$e->getMessage();}
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>