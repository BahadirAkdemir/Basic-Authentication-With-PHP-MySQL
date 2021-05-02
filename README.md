# Basic-Authentication-With-PHP-MySQL

Hello,


To Do:

• You need to download and install xampp

• After installation, if you can start both apache and mysql without errors, you can skip this part. If there is a problem about mysql,
  The reason is probably MySQL Workbench. Go to the services, find mysql and stop it. After that, open xampp again and click start

  Still you come accross with an error about mysql connection, please try to find a solution from the internet.

• Paste "login" folder into the C:/xampp/htdocs folder

• Open log_in.php file with notepad or etc and be sure that 10, 11 and 12th lines are filled with your info (hostname user and mysql password).
 Note: In general, host and user are same for everyone (localhost, root) but be sure that password is correct (if don't have password, then leave it as blank like -> "")
 Note: This part is important because my login page creates database and creates tables. So It must be connected with SQL server. Also, there shouldn't be any other database 
       with the same name as my database (I will create db called "login" but if you want to change, then go to log_in.php 13th line. DB name must be unique so be sure that.)
 Note: If you do not have MySQL Workbench and only server in your computer is phpMyadmin that was loaded with xampp. Then do not apply this part. It will connect automatically. 

• open the browser and write "localhost". Be sure that all pages mapped in this url is working.

• Write "localhost/login/log_in.php". My main page is login page. Database is being created here.

• Start to use
