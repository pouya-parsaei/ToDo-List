<?php defined('BASE_PATH') or die('Permission Denied');

/*** Folder Function ***/
function deleteFolder($folder_id)
{
    global $pdo;
    $sql = "DELETE FROM folders WHERE id=$folder_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}
function addFolder($folder_name)
{
    global $pdo;
    $current_user_id = getCurrentUserId();

    $sql = "INSERT INTO folders (name,user_id) VALUES (:folder_name,:user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':folder_name' => $folder_name, ':user_id' => $current_user_id]);
    return $stmt->rowCount();
}

function getFolders()
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "SELECT * FROM folders WHERE user_id=$current_user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

/*** Task functions ***/
function deleteTask($task_id)
{
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id=$task_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}
function addTask($taskTitle, $folderId)
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "INSERT INTO tasks (title,user_id,folder_id) VALUES (:task_title,:user_id,:folder_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':task_title' => $taskTitle, ':user_id' => $current_user_id, ':folder_id' => $folderId]);
    return $stmt->rowCount();
}
  function getTasks()
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = " AND folder_id=$folder";
    }
    $current_user_id = getCurrentUserId();
    $sql = "SELECT * FROM tasks WHERE user_id=$current_user_id $folderCondition ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}  


function doneSwitch($taskId)
{
    try {
        global $pdo;
        $current_user_id = getCurrentUserId();
        $sql = "UPDATE tasks SET is_done= 1 - is_done WHERE user_id=? AND id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$current_user_id, $taskId]);
    } catch (PDOException $e) {
        throw $e;
    }

    return $stmt->rowCount();
}

//view tasks by date
 function cb($a, $b) {
    return strtotime($b->created_at) - strtotime($a->created_at);
} 

//
  function getTasksByDate($order)
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = " AND folder_id=$folder";
    }
    
    $current_user_id = getCurrentUserId();
    $sql = "SELECT * FROM tasks WHERE user_id=$current_user_id $folderCondition ORDER BY created_at $order LIMIT 0,10";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}  

function search($text)
{
    try {
        global $pdo;
        $folder = $_GET['folder_id'] ?? null;
        $folderCondition = '';
        if (isset($folder)) {
            $folderCondition = " AND folder_id=$folder";
        }
        $text = htmlspecialchars($text);
        $current_user_id = getCurrentUserId();
        $stmt = $pdo ->prepare("SELECT * FROM tasks WHERE user_id=$current_user_id $folderCondition AND title LIKE concat('%',:title,'%') LIMIT 0,10");
        $stmt -> execute(array(':title' => $text));
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        throw $e;
    }
    return $records;
}
  
 function getTasksLimit($startPoint,$task_limit)
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = " AND folder_id=$folder";
    }
    $current_user_id = getCurrentUserId();
    $sql = "SELECT * FROM tasks WHERE user_id=$current_user_id $folderCondition LIMIT $startPoint,$task_limit";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
} 

  function getTasks2()
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)) {
        $folderCondition = " AND folder_id=$folder";
    }
    $current_user_id = getCurrentUserId();
    $sql = "SELECT * FROM tasks WHERE user_id=$current_user_id $folderCondition LIMIT 0,10";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

