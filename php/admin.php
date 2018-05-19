<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/admin.css">
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

        <div class="row">
            <div class="col-lg-12">
                <div class="bg-info center-block" id="companyData">
                        <h2>Rendered Data</h2>
                        <?php
                        include 'DataAccess.php';
                        try{
                            $da = new Database();
                            $da->getAllData();
                        }catch(Exception $e){echo "Error:".$e->getMessage();}
                        ?>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-info center-block" id="userData">
                    <div class="col-xs-6">
                            <div>
                                    <?php
                                        $user = $_SESSION['username'];
                                        try{
                                            $da->getUserData($user);
                                        }catch(Exception $e){echo "Error:".$e->getMessage();}
                                    ?>   
                            </div>
                    </div>
                    <div class="col-xs-6">
                            <div>
                                    <div class="form-horizontal">
                                            <div class="form-group">
                                                    <div class="col-xs-4"><input type="button" class="form-control btn-success"></div>
                                                    <div class="col-xs-4"><input type="button" class="form-control btn-success"></div>
                                                    <div class="col-xs-4"><input type="button" class="form-control btn-success"></div>
                                            </div>
                                        <div class="form-group">
                                                <div id="userPanel">
                                                </div>
                                        </div>
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