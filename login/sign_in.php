<!DOCTYPE html>
<?php
    session_start();
    $_SESSION["check"]=0;
?>
<head>
    <meta charset="UTF-8"/>
    <title>Log in Page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="center">
        <h1>Sign in</h1>
        <form name="Sign in" action="action_signin.php" method="POST">
            <table>
            <tr><td>Username:</td><td><input type="text" name="username" placeholder="Username" required maxlength="20" pattern="[A-zÄÖÜÇçäöüß0123456789 ]+" title="No Special Character!"> </td></tr>
            <tr><td>Password:</td><td><input type="password" name="password" placeholder="Password" required maxlength="20"></td></tr>
            <tr><td>Password Confirm:</td><td><input type="password" name="password_confirm" placeholder="Password" maxlength="20"></td></tr>
            <tr><td>E-mail:</td><td><input type="email" name="email" placeholder="E-mail" required maxlength="20" pattern = "[^=()/><\][\\\x22;'|]+" title="No Special Character!"></td></tr>
            <tr><td>Phone:</td><td><input type="tel" name="tel" placeholder="Phone Number" maxlength="11" required pattern = "[0-9]+" title="Only Numbers" ></td></tr>
            <tr><td>Adress:</td><td><input type="text" name="address" placeholder="Address" required maxlength="255" pattern="[^=()/><\][\\\x22;'|]+" title="No Special Character!" ></td></tr>
            <tr><td></td><td><input type="submit" value="Submit"required></td></tr>
    
            </table>
        </form>
        <h5><a href="log_in.php">You already have an account?</a></h1>
    </div>
</body>