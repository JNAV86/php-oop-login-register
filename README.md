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
2. Create the following tables listed below in the Database 'githubtest' with the columns and their attributes stated.

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

## How it All Works

Config class

The config class is responsible for getting information from the init.php file. 
Things it can do:

1. Get the value of key stated in init.php. Example, to get the password for your database, Config::get('mysql/password');

Cookie class 

Things this class can do:

1. Check if a cookie exists. eg Cookie::exists('cookieName');
2. Return cookies that are set. eg Cookie::get('cookieName');
3. Create a cookie. eg Cookie::put('cookieName', 'cookieValue', 'ExpiryInSeconds');
4. Delete a cookie. eg Cookie::delete('cookieName');


DB class 

What this class can do:

1. Connect to your database with the getInstance function. eg. DB::getInstance();
2. Select rows from a database table. DB::get('tableName', array('id', '=', 'value'));
3. Delete a row from a database table. DB::delete('tableName', array('id', '=', 'value'));
4. Insert a row into a database table. DB::insert('tableName', array('field'=> 'newValue', 'field2'=> 'newValue'));
5. Update an existing table row. DB::update('tableName', array('field'=> 'newValue', 'field2'=> 'newValue'));
6. The results from a database query. $db->results();
7. The first results from a database query. $db->first();
8. Show errors if any from your database querying. $db->error();
9. Count the rows from a successful database query. $db->count();

Hash class
I advise hashing values important values that the general public should not have ease of access to. Passwords for example.

For this project I used the hash class to generate secured values for user passwords in the database.

Input Class

What it can do:

1. Check if a get or post value exists. Input::exists('field');
2. Get the value of a get or post field. Input::get('field');

Redirect Class

What it can do:

1. Redirect to any location. Eg, Redirect::to('index.php');

Session Class

What it can do:

1. Check if a session exists. eg, Session::exists('SessionName');
2. Add a value to a session. eg, Session::put('SessionName', 'SessionValue');
3. Get a session. eg, Session::get('SessionName');
4. Delete a session. eg, Session::delete('SessionName');
5. Flashing users with messages after they've completed an action like registering or updating profile. eg, Session::flash('name', 'This message will be flashed.');

Token Class

Tokens were used in the project as a way of security to stop things like Cross-site request forgery (CSRF)

What it can do:

1. Create a new token. eg, Token::generate();
2. Check if a token exists with the session being used. eg, Token::check('tokenValue');


User Class

What it can do

1. Update information on a user's profile. eg, $user->update(array('field'=>'value'), $user_id);
If a user is logged in, stating the id is not necessary.

2. Create a new user profile. eg, $user->create(array('field1'=>'value', 'field2', 'value'));
3. Find a user's row of information in the users table of the database. Eg, $user->find($user);
4. Login a user. eg, $user->login($username, $password, $remember); 
By default remember is set to false as it is an option that is left for a user to decide whether or not they want their session to be remembered.

5. Get all data associated with a user. eg, Get the username of the user currently loggen in. $user->data()->username; 
6. Check if a user is loggen in. $user->isLoggedIn();
7. Logout a user. eg, $user->logout();
8. Check if a user exist. $user->exists();
9. Check the permission of a user. eg, $user->hasPermission('role');

Validate class

The purpose of the class was created to validate input fields on forms. 
The class currently checks against 5 rules (required, minimum, maximum, matches and unique)

What it can do:

1. Check against the 5 rules stated above. eg, $validate->check($_POST, array('username'=> array('required'=> true, 'min'=> 5)));
2. Show the errors based on your rules set for specific fields. eg, $validate->errors();
3. Check if the input of fields are validated. eg, $validate->passed();
