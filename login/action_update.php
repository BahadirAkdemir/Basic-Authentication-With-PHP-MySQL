<?php
  session_start();

  #Connecting to MySQL services
  $link = mysqli_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['password']);

  #Connecting to the database
  mysqli_select_db($link,$_SESSION['db']);

  #Checking whether the user come to the update page before here or not
  if(isset($_POST['username'])){
    $username = mysqli_escape_string($link,$_POST['username']);
    $u_password = mysqli_escape_string($link,$_POST['password']);
    $email = $_POST['email'];
    $phone = $_POST['tel'];
    $address = $_POST['address'];

    #Checking unique information
    $check_name = "SELECT * FROM users WHERE username='".$username."'";
    $check_mail = "SELECT * FROM user_info WHERE email='".$email."'";

    $check_result_name = mysqli_query($link,$check_name);
    $row_name = mysqli_fetch_array($check_result_name);

    $check_result_email = mysqli_query($link,$check_mail);
    $row_mail = mysqli_fetch_array($check_result_email);

    if(mysqli_num_rows($check_result_name)>=1 && $row_name['username']!=$_SESSION['username'] || (mysqli_num_rows($check_result_email)>=1 && $row_mail['email']!=$_SESSION['email'])){
      echo "This name or email is already registered. Please turn back and give a valid name or email <br>";
      echo "<button onclick='history.go(-1);'>Back </button>";
    }else{
      #Update Operation
      $update_user_info_query = "UPDATE user_info SET email = '".$email."', phone_number ='".$phone."', address = '".$address."' WHERE   id = '".$_SESSION['id']."'";
      $update_user= "UPDATE users SET username='$username', password='$u_password' WHERE id='".$_SESSION['id']."'";   
      $result_user_info = mysqli_query($link,$update_user_info_query);
      $result_user = mysqli_query($link,$update_user);
      if($result_user && $result_user_info){
        $_SESSION['check']=0;
        header("Location: log_in.php");
      }else{
        echo"An Error Occured <br>";
        echo "<button onclick='history.go(-1);'>Back </button>";
      }
    }
  }