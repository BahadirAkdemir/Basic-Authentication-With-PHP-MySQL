<?php 
    session_start();
    $_SESSION["check"]=0;

    #Connecting to MySQL services
    $link = mysqli_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['password']);

    #Connecting to database
    mysqli_select_db($link,$_SESSION['db']);

    #Checking whether the user come to the sign page before here or not
    if(isset($_POST['username'])){
        $username = mysqli_escape_string($link,$_POST['username']);
        $u_password = mysqli_escape_string($link,$_POST['password']);
        $u_password_confirm = mysqli_escape_string($link,$_POST['password_confirm']);
        $email = mysqli_escape_string($link,$_POST['email']);
        $phone = mysqli_escape_string($link,$_POST['tel']);
        $address = mysqli_escape_string($link,$_POST['address']);

        $check_query = "SELECT * FROM users natural join user_info WHERE username = '$username' or email = '$email'";
        $check_result = mysqli_query($link,$check_query);
        $check_num = mysqli_num_rows($check_result);

        #Checking if there is a same email or user name
        if($check_num>=1 || ($u_password_confirm!=$u_password)){
            echo "Passwords are not matched or an account already exists with that user name or email. ";
            $message = "Please Fill the information correctly: 
                <button onclick='history.go(-1);'>Back </button>";
            echo $message;
        }
        else{
            #Registiring
            $reg_query_user = "INSERT INTO users (username, password) VALUES ('$username', '$u_password') ";
            $reg_query_info = "INSERT INTO user_info (email, phone_number, address) VALUES ('$email', '$phone','$address') ";
            mysqli_query($link, $reg_query_user);
            mysqli_query($link, $reg_query_info);

            #Going to the log in page
            header("Location: log_in.php");
        }
    }
?>