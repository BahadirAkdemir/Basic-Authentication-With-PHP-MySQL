<?php
    session_start();
    
    
    
    //Update permittion=>no
    $_SESSION['check']=0;
    
    #MySQL information (Please fill the variables with your information)
    $host = "localhost";
    $user= "root";
    $password = "";
    $db="bahadir_login";

    #Keeping the information in order to use in other pages
    $_SESSION['host'] = $host;
    $_SESSION['user'] = $user;
    $_SESSION['password'] = $password;

    #Connection to the MySQL
    $link = mysqli_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['password']);

    #Checking if the database exist, create database 
    $checker=mysqli_query($link,"SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db'");
    if(mysqli_num_rows($checker)!=1){
        $sql_cr_db="create database if not exists `$db`;";
        $sql_use_db="USE `$db`;";
        $sql_cr_tb1="CREATE TABLE users (
        id int NOT NULL AUTO_INCREMENT,
        username varchar(20) NOT NULL,
        password varchar(20) NOT NULL,
        PRIMARY KEY (id)
        );";

        $sql_cr_tb2="CREATE TABLE user_info (
        id int NOT NULL AUTO_INCREMENT,
        email varchar(20) NOT NULL,
        phone_number varchar(11) NOT NULL,
        address varchar(255) NOT NULL,
        PRIMARY KEY (id)
        );";
        mysqli_query($link,$sql_cr_db);
        mysqli_query($link,$sql_use_db);
        mysqli_query($link,$sql_cr_tb1);
        mysqli_query($link,$sql_cr_tb2);
    }

    $_SESSION['db'] = $db;

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Log in Page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="center">
        <h1>Log in</h1>
        <form name="log in" action="action_login.php" method="POST">
            <table>
                <tr><td></i>Username:</td><td><input type="text" name="user" id="user" placeholder="Username" required></td></tr>
                <tr><td>Password:</td><td><input type="password" name="pass" id="password" placeholder="Password" required></td></tr>
                <tr><td></td><td><input type="submit" value="Submit" id="submit"></td></tr>
    
            </table>
        </form>
        <h5><a href="sign_in.php">You don't have an account?</a></h1>
    </div>
</body>