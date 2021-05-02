<?php 
    session_start();
    #Giving the user update permission
    $_SESSION["check"]=1;
    #Connecting to MySQL services
    $link = mysqli_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['password']);
    #Connecting to the database
    mysqli_select_db($link,$_SESSION['db']);

    if(isset($_POST['user'])){
        #Keeping log-in information
        $username = $_POST['user'];
        $u_password = $_POST['pass'];

        #Caution for SQL injection
        $username=mysqli_escape_string($link,$username);
        $u_password=mysqli_escape_string($link,$u_password);

        #Query Operations
        $sql = "SELECT * FROM users WHERE username='".$username."' AND    password='".$u_password."'";
        $result = mysqli_query($link,$sql);
        $result_row = mysqli_fetch_array($result);

        #Checling that only one row came in order to prevent some errors or SQL injections
        if(mysqli_num_rows($result)==1 && $u_password==$result_row['password'] && $username==$result_row['username']){

            #Fetching the data
            $user_info = mysqli_query($link,"Select * from users natural join user_info WHERE username='".$username."' AND    password='".$u_password."'");
            $user_info_row=mysqli_fetch_array($user_info);

            #Keeping the data in order to be able to make an update operation
            $_SESSION['username']=$user_info_row['username'];
            $_SESSION['user_password']=$user_info_row['password'];
            $_SESSION['phone_number']=$user_info_row['phone_number'];
            $_SESSION['email']=$user_info_row['email'];
            $_SESSION['address']=$user_info_row['address'];
            $_SESSION['id']=$user_info_row['id'];

            #Displaying users' information
            echo "<h1>Hello $username </h1>";
            echo "<table border='1'>"; // start a table tag in the HTML
            $show= mysqli_query($link,"Select * from users natural join user_info");
            echo "<tr><td><b> ID </b></td><td><b> User Name</b> </td><td><b> Password </b></td><td><b> Phone Number </b></td><td><b>E-mail </b></td><td><b> Address</b> </td></tr>";
            while($row = mysqli_fetch_array($show)){ 
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td><td>" . $row['phone_number'] . "</td><td>" . $row['email'] . "</td><td>" . $row['address'] . "</td></tr>";  //$row['index'] the index here is a field name
            }
            echo "</table>";

            #Log-out and update links
            echo"<br>";
            echo"<a href='update.php' title='My Page'>Update</a><br><br>";
            echo"<a href='log_in.php' title='My Page'>Log out</a>";
            exit();

        }else{
            echo "The is no such a user with this information. Please enter valid values or sign in <br> ";
            
            echo"<a href='log_in.php' title='My Page'>Return to log in page</a> <br>";
            echo"<a href='sign_in.php' title='My Page'>Go to sign in page</a>";

            exit();
        }
    }else{
        #Avoiding some attacks (in case the user may attack by entering the url)
        $_SESSION["check"]=0;
    }


?>