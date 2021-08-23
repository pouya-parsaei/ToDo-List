<?php
include "bootstrap/init.php";
if (isset($_GET['logout'])) {
   logout();
}
if (!isLoggedIn()) {
   //redirect to auth form
   redirect(site_url('auth.php'));
}
# user is LoggedIn
$user = getLoggedInUser();

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
   $deletedCount = deleteFolder($_GET['delete_folder']);
}
if (isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])) {
   $deletedCount = deleteTask($_GET['delete_task']);
}

#connect to db and get tasks
$folders = getFolders();

$tasks = getTasks2() ;

//view tasks by date
 if (isset($_GET['orderBy'])) {
   if ($_GET['orderBy'] == 'DESC') {
     $tasks = getTasksByDate(TASKS_ORDER_DESC);
   }
   if ($_GET['orderBy'] == 'ASC') {
     $tasks = getTasksByDate(TASKS_ORDER_ASC);
   }
}  


//search tasks
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $action = $_GET['action'];
   if ($action == 'search') {
      $searchTask = $_POST['search'];
      $tasks = search($searchTask);
   } else {
      message("invalid Action");
      die();
   }
}

//pagination
 if (isset($_GET['startPoint'])) {
   $startPoint = $_GET['startPoint'];
   $task_limit = $tasksInEachPage;
   $tasks=getTasksLimit($startPoint,$task_limit);
} 

include "tpl/tpl-index.php";
