<?php
include "bootstrap/init.php";

$homeUrl = site_url();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'register') {

        $result =  register($params);
        if (!$result) {
            message("Error: An error in registration!");
        } else {
            message("Successully registered.Welcome<br>
            <a href='{$homeUrl}auth.php'>Please Login</a>", 'success');
        }
    } else if ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if (!$result) {
            message("Error: Email or Password is incorrect");
        } else {
            redirect(site_url());
        }
    }
}
include "tpl/tpl-auth.php";
