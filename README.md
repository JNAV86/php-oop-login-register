#OOP PHP LOGIN and REGISTER

I created this project to help myself become familiar with coding using OOP principles and drop my old habit of only creating PHP scripts with procedural principles.

The reason for uploading this was to hopefully help someone use these features to mitigate redundant tasks when creating their own PHP applications that need user login and registration features.

##Getting Started

###Requirements 

- Apache
- PHP
- MySQL
- phpMyAdmin
    * You can easily have this with a simple installation of [MAMP(Mac OSX)](https://www.mamp.info/en/) or [XAMPP(Windows)](https://www.apachefriends.org/index.html)

1. Create a database with the name 'githubtest' in phpMyAdmin
2. Start your MySQL server and create the following tables listed below in the Database 'githubtest' with the columns and their attributes stated using phpMyAdmin.

    * ***Table 1 - groups***
      * *This table will store the different roles that will be assigned to users registering*
      * NAME: id || TYPE: INT || Length/Values: 11 || A_I/auto_increment: check || INDEX: PRIMARY
      * NAME: name || TYPE: VARCHAR || Length/Values: 20
      * NAME: permissions || TYPE: TEXT

    * ***Table 2 - users***
      * *This table will store the information of users who register*
      * NAME: id || TYPE: INT || Length/Values: 11 || A_I/auto_increment: check || INDEX: PRIMARY)
      * NAME: username || TYPE: VARCHAR || Length/Values: 20
      * NAME: password || TYPE: VARHCAR || Length/Values: 64
      * NAME: salt || TYPE: VARCHAR || Length/Values: 32
      * NAME: name || TYPE: VARCHAR || Length/Values: 50)
      * NAME: date_joined || TYPE: DATETIME
      * NAME: groups || TYPE: INT || Length/Values: 11)
      
    * ***Table 3 - user_sessions***
      * *This table will store the information required to make users use the 'remember me' feature.*
      * NAME: id || TYPE: INT || Length/Values: 11 || A_I/auto_increment: check || INDEX: PRIMARY
      * NAME: user_id || TYPE: INT || Length/Values: 11
      * NAME: hash || TYPE: VARCHAR || Length/Values: 64
      
3. Start your Apache server and clone the project in your Apache directory 
    ```
    git clone https://github.com/mattchambers/php-oop-login-register.git PHP-OOP
    ```
    
4. At this state you should be able to use the project with your browser by accesing it at *http://localhost/PHP-OOP/index.php* OR *http://localhost/index.php*

    * You can now start playing around and see how the features work.
  

## Contribution
Please feel free to make issue reports with suggestions on how to make this a better repo. I'm open to anything that will help becoming a better developer.

## License 

This project is licensed under [The MIT License](https://opensource.org/licenses/MIT)
