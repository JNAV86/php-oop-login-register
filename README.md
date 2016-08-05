The main benefit one can get from this repository is reusable code straight out of the box for building any PHP app with a login or registration systems.  


For this example. 
A database was created 3 tables.
groups
1. id (int - 11, auto_increment, primary) 
2. name (varchar 20)
3. permissions - (text)

The groups table was created to store different types of roles along with their permissions that will be asigned to users.

users
1. id (int - 11, auto_increment, primary)
2. username (varchar - 20)
3. password (varchar - 64)
4. salt (varchar - 32)
5. name (varchar - 50)
6. date_joined (datetime)
7. groups (int - 11)

The users table was used to store all the information of registered users.

user_sessions 
1. id (int - 11, auto_increment, primary)
2. user_id (int - 11)
3. hash (varchar - 64)


This table will store the information required to restore sessions as is for users who opted to be remembered.

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
