<?php

class Database{

    protected static $connection="";
    protected $username="root";
    protected $password="ritubitu7";
    protected $server="localhost";
    protected $database="tourcafe";

    public function getAllData(){
        try{
            $connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $statement=$connection->prepare("SELECT * FROM branches");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_NUM);

            echo "<table class='table table-hover'>".
            "<tr><th>Country</th><th>Shops</th><th>Total Revenue</th><th>Logistics</th><th>Advertising</th><th>Local Sponsor</th>".
            "<th>Sponsor</th><th>No. of Employees</th><th>Shop ID</th></tr>";
            for($i=0;$i<sizeof($result);$i++){
                echo "<tr>";
                foreach($result[$i] as $key=>$value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

        }catch(Exception $e){echo "Error:".$e->getMessage();}
    }

    public function getUserData($user){
        try{
            $connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $statement=$connection->prepare("SELECT name,phone,dob,address,empid,email,position,salary,bonus".
            ",totalIncome,country FROM users WHERE username like '$user'");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_NUM);
            $fields = array("Name","Phone No.","Date Of Birth","Address","Employee ID","Email ID","Position","Salary(Annual)","Bonus(Annual)","Total Income","Country");
            echo "<table class='table table-hover stable-bordered'><tr><th>Fields</th><th>User Information</th></tr>";
            for($i=0;$i<sizeof($result);$i++){
                $field=0;
                foreach($result[$i] as $key=>$value){
                    echo "<tr><td>".$fields[$field]."</td><td>".$value."</td></tr>";
                    $field++;
                }
            }
            echo "</table>";

        }catch(Exception $e){echo "Error: ".$e->getMessage();}
    }

    public function updateUserData($field,$data,$user_name){
        try{
            $connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $statement=$connection->prepare("UPDATE users SET $field='$data' WHERE username like '$user_name'");
            $statement->execute();
            echo "<script>alert('Profile Updated successfully !')</script>";
            

        }catch(Exception $e){echo "Connection failed !".$e->getMessage();}
    }

    public function loginVerify($user,$pass){
        try{
            $connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $statement=$connection->prepare("SELECT username,password FROM users WHERE username like '$user' AND password like '$pass'");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_NUM);

            if($result!=null){
                if($user=="admin"){
                    header('Location:admin.php');
                }else{
                    header('Location:userprofile.php');
                }
            }else{
                header('Location:../portal.htm');
            }

        }catch(Exception $e){echo "Connection failed!".$e->getMessage();}
    }

    public function registerUser($name,$email,$phone,$dob,$address,$country,$user,$pass){
        try{
            $connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $statement=$connection->prepare("INSERT INTO users(name,phone,dob,address,email,country,username,password) VALUES('$name','$phone','$dob','$address','$email','$country','$user','$pass')");
            $statement->execute();

            header('Location:../portal.htm');

        }catch(Exception $e){echo "Connection Error:".$e->getMessage();}
    }
}

?>
