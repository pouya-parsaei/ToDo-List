<?php defined('BASE_PATH') or die('Permission Denied');
/*** Auth Functions ***/

//get login user id
function getCurrentUserId()
{
    
    return getLoggedInUser()->id ?? 0;
}

function isLoggedIn()
{
    return isset($_SESSION['login']) ? true : false;
}

function getLoggedInUser()
{
    return $_SESSION['login'] ?? null;
}

function getUserByEmail($email)
{
    try {
        global $pdo;
        $sql = "SELECT * FROM users WHERE email =:email ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        $records[0]->image = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $records[0]->$email ) ) );
    } catch (PDOException $e) {
        throw $e;
    }

    return $records[0] ?? null;
}

function logout()
{
    unset($_SESSION['login']);
}
function login($email, $password)
{
    $user = getUserByEmail($email);
    if (is_null($user)) {
        return false;
    }
    #check the password
    if (password_verify($password, $user->password)) {
        # login is successfull
        
        $_SESSION['login'] = $user;
        return true;
    }
    return false;
}

function  register($userData)
{
    global $pdo;
    #validation of $userData here  (isValidEmail,isValidUserName,isValidPassword)
    $email = $userData['email'];


    //Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        diePage("Invalid email format");
    }

    //UserName Validation
    $name = $userData['name'];
    userNameValidation($name);

    //Password Validation
    $password = $userData['password'];
    passwordValidation($password);
    $passHash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email,:pass)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $name, ':email' => $email, ':pass' => $passHash]);
    return $stmt->rowCount() ? true : false;
}
