<?php
session_start();
    if(isset($_COOKIE['email']) && isset($_COOKIE['pass'])
            && $_POST['delete']==true){
        setcookie('email',null,time()-60,true);
        setcookie('pass',null,time()-60,true);
        unset($_COOKIE['email']);
        unset($_COOKIE['pass']);
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Private</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Private area : <?= $_SESSION['email']??"";?></h1>
        
        
        <hr>
        <p><?= date('d/m/Y H:i:s',$_COOKIE['lastaccess'])??"";?></p>
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            Delete <input type="checkbox" name="delete">
            <input type="submit" value="Send">
        </form>
        <hr>
        <a href="logout.php">logout</a>
    </body>
</html>


