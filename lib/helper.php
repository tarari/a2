<?php


function conectaDB($config){
    
    $link=mysqli_connect($config['host'], $config['user'], $config['pass'], $config['database']);
    if(mysqli_connect_errno()){
        return null;
    }else{
        return $link;
    }
    
}

function validar_usuario(){
    //lectura de configuració
    
    $config=(array)json_decode(file_get_contents(LIB.'config.json'));
    
    if(is_array($config)&&!empty($config)){
        //connexió
        $link= conectaDB($config);
        $sql="SELECT email,pass FROM users WHERE email=? and pass=?";
        $stmt=mysqli_prepare($link, $sql);  
        $pass=$_POST['pass'];
        //$pass= password_hash($_POST['pass'],PASSWORD_DEFAULT, ['cost'=>4]);
        
        $bind=mysqli_stmt_bind_param($stmt, "ss",$_POST['email'],$pass);
        $res= mysqli_stmt_execute($stmt);
        
        if($res){
            echo $res;
            
            $result= mysqli_stmt_get_result($stmt);
            print_r($result);
            if (mysqli_num_rows($result)==1){
                return true;
            }
            else{ return false;}
        }else{return false;}
    }
    
}

function go_to($url){
    header('Location:'.$url);
}

