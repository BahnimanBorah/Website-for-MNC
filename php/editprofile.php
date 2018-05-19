<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/editprofile.css">
</head>
<body>

    <div class="container-fluid">
        <!--navigation bar-->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            
            <div class="navbar-header">
                <a class="navbar-brand" href="../home.htm"><em>Tour Cafe</em></a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavBar">
                <ul class="nav navbar-nav">
                    <li><a href="verify.php">Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>

        </nav>

        <!-- body -->
        <div class="row">
            <div class="col-lg-12">
                <div id="editBox">
                    <h2 class="text-center">Edit Profile</h2>
                <div class="form-horizontal">
                        <div class="form-group">
                            <form action="editprofile.php" method="post">
                                
                                <select class="form-control" name="fields">
                                    <option value="name">Name</option>
                                    <option value="email">Email ID</option>
                                    <option value="address">Address</option>
                                    <option value="phone">Phone</option>
                                    <option value="dob">Date Of Birth</option>
                                    <option value="country">Country</option>
                                </select>
                                <input type="text" name="new" class="form-control" placeholder="Enter new value"><br>
                                <input type="submit" class="form-control btn-success" value="Save">
                                
                            </form>
                        </div>
                        <!-- php -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>