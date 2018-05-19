<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/user.css">
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
        <!-- Body -->
        <div class="row">
                <div class="col-lg-12">
                            

                            <div class="col-xs-12 col-lg-6 boxes">
                                <div class="bg-info">
                                            <?php
                                                include 'DataAccess.php';
                                                $user = $_SESSION['username'];
                                                try{
                                                    $da = new Database();
                                                    $da->getUserData($user);
                                                }catch(Exception $e){echo "Error:".$e->getMessage();}
                                            ?>
                                </div>
                                <a class="btn btn-success center-block"  href="editprofile.php">Edit</a>
                            </div>
                            <div class="col-xs-12 col-lg-6 boxes">
                                        <div class="bg-info" id="userpanel">
                                                <ul class="nav nav-pills">
                                                    <li class="active"><a data-toggle="pill" href="#tab1"><i class="fa fa-flag"></i></a></li>
                                                    <li><a data-toggle="pill" href="#tab2"><i class="fa fa-envelope"></i></a></li>
                                                    <li><a data-toggle="pill" href="#tab3"><i class="fa fa-microphone"></i></a></li>
                                                </ul>
                                        
                                                <div class="tab-content">
                                                    <div id="tab1" class="tab-pane fade in active">
                                                    <h3>Archive</h3>
                                                    <p>No messages on archive.</p>
                                                    </div>
                                                    <div id="tab2" class="tab-pane fade">
                                                    <h3>Inbox</h3>
                                                    <p>No new messages available.</p>
                                                    </div>
                                                    <div id="tab3" class="tab-pane fade">
                                                    <h3>Announcements</h3>
                                                    <p>No new announcements available.</p>
                                                    </div>
                                                </div>
                                        </div>
                            </div>

                    
                </div>     
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>