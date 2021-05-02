<?php 
    session_start();
    #If check is not 1, then the user is trying to crush the website
    if(($_SESSION['check'])!=1){
        //session_destroy();
        echo "Operation is not permitted";
    }
    else{
        ?>
        <!DOCTYPE html>
        <head>
            <meta charset="UTF-8">
            <title>Log in Page</title>
            <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        </head>

<body>
    <div class="center">
        <h1>Update</h1>
        <form name="Sign in" action="action_update.php" method="POST">
            <table>
            <tr><td>Username:</td><td><input type="text" name="username" value='<?php echo $_SESSION['username'] ?>'  pattern="[A-zÄÖÜÇçäöüß0123456789 ]+" title="No Special Character!" required> </td></tr>
            <tr><td>Password:</td><td><input type="password" name="password" value='<?php echo $_SESSION['user_password']?>' required></td></tr>
            <tr><td>E-mail:</td><td><input type="email" name="email" value='<?php echo $_SESSION['email'] ?>' pattern = "[^=()/><\][\\\x22;'|]+" title="No Special Character!" required></td></tr>
            <tr><td>Phone:</td><td><input type="tel" name="tel" value='<?php echo $_SESSION['phone_number'] ?>' pattern = "[0-9]+" title="Only Numbers" required></td></tr>
            <tr><td>Adress:</td><td><input type="text" name="address" required pattern="[^=()/><\][\\\x22;'|]+" title="No Special Character!" value='<?php echo $_SESSION['address'] ?>'  ></td></tr>
            <tr><td></td><td><input type="submit" value="Submit"required></td></tr>
    
            </table>
        </form>
    </div>
</body>
        <?php
    }
?>


