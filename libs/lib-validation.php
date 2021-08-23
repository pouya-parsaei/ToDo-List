<?php defined('BASE_PATH') OR die('Permission Denied');
function userNameValidation($str){
    $usernameLength = strlen($str);
    $min = 4;
    $max = 25;
    if ($usernameLength < $min || $usernameLength > $max ) {
        diePage("name must contain 4 to 25 characters");
    }
    if(!preg_match('/^[a-zA-Z]/', $str)){
        diePage("name must start with a letter");
    }
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $str)) {
        diePage("name can only contain letters, numbers, and the underscore character.");
    }
}

function passwordValidation($str){
    
    if (strlen($str) < 8) {
        diePage("Password must include at least 8 characters!") ;
    }

    if (!preg_match("#[0-9]+#", $str)) {
        diePage("Password must include at least one number!") ;
    }

    if (!preg_match("#[a-zA-Z]+#", $str)) {
        diePage("Password must include at least one letter!") ;
    }     

    if (!preg_match("#[^\da-zA-Z]+#", $str)) {
        diePage("Password must include at least one Special Characters, such as '!,@,$,...'!") ;
    }

    
}