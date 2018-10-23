<?php

    ini_set('display_errors','On');
    define('LIB','lib/');
    session_start();
    include 'lib/helper.php';
    if(isset($_POST['email']) && !empty($_POST['email'])){
        if(isset($_POST['pass']) && !empty($_POST['pass'])){
            if(validar_usuario()){
                $_SESSION['email']=$_POST['email'];
                date_default_timezone_set('Europe/Madrid');
                $date=date('F j, Y, g:i a',time());
                setcookie('lastaccess',$date);
                if ($_POST['remember']==true){
                    setcookie('email', $_POST['email'],time()+3600,true);
                    setcookie('pass', $_POST['pass'],time()+3600,true);

                    
                }
                
                go_to('private.php');
            }
        }
        
    }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>A2</title>
        <meta charset="UTF-8">
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <p>Email: <input type="text" name="email" value="<?= $_COOKIE['email']??''; ?>">  </p> 
        <p>Password: <input type="password" name="pass" value="<?= $_COOKIE['pass']??''; ?>"></p>
        <p>Remember me:<input type="checkbox" name="remember" value="true"></p>
        <p><input type="submit" value="Sign in"></p>
        
    </form>
          
    </head>
    <body>

    </body>
</html>
