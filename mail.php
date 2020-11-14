<?php

if(!empty($_POST)){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $birthday = $_POST['birthday'];
    $pattern = "/^[А-Яа-яёЁЇїІіЄєҐґщЩуУшШхХрРтТьЬюЮ]+$/";

    $error = false;
    $errorMsg = "";
    $succesMsg = "Form has been sent. Thank you!";
    
    
    
    
    
    if(!empty($name) && !empty($surname) && !empty($lastname) && !empty($email) && !empty($year)&& !empty($birthday)){
      
        if(!preg_match($pattern, $name)|| !preg_match($pattern, $surname) || !preg_match($pattern, $lastname)){
            $error = true;
            $errorMsg = "Use Ukraininan letters only!";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $errorMsg = "Fill in valid email!";
        }
      
    }
    else{
        $error = true;
        $errorMsg = "Fill in all fields!";
    }

    
    echo(json_encode(array('error' => $error, 'errorMsg' => $errorMsg, 'succesMsg' => $succesMsg )));
}

?>
