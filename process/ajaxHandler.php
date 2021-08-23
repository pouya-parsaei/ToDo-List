<?php
include_once "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}

 if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action!");
}

switch ($_POST['action']) {  
    case "doneSwitch":
        $taskId = $_POST['taskId'];
        if (!isset($taskId) || !is_numeric($taskId)) {
            echo " Task ID is invalid";
            die();
        }
        echo doneSwitch($taskId);

        break;
    case "addFolder":
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo " Folder name must include at least 3 characters.";
            die();
        }
        echo addFolder($_POST["folderName"]);
        break;
    case "addTask":

        $folderId = $_POST['folderId'];
        $taskTitle = $_POST['taskTitle'];
        if (!isset($folderId) || empty($folderId)) {
            echo " Pleas choose the folder first.";
            die();
        }
        if (!isset($taskTitle) || strlen($taskTitle) < 2) {
            echo " Task Name must include at least 2 Characters";
            die();
        }
        echo addTask($taskTitle, $folderId);
        break;

    default:
        diePage("Invalid Action!");
}
