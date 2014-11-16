<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login</title>
 </head>
 <body>
   <h1>Login</h1>
   <?php
    echo validation_errors();
    echo form_open('verifylogin'); 
    echo form_label("Login: ");
    echo form_input("login");
    echo '<br />';
    echo form_label("Password: ");
    echo form_password("password");
    echo '<br />';
    echo form_submit("","Login");
    echo form_close();
   ?>
 </body>
</html>