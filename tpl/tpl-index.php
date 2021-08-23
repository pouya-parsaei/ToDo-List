<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= SITE_TITLE ?></title>


  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div id="result"></div>
  <div class="page">
    <div class="pageHeader">
      <div class="title">Dashboard</div>
      <div class="userPanel">
        <span class="username">
          <a href="<?= site_url("?logout=1") ?>" class="logout-link"><i class="fa fa-sign-out logout-item"></i></a><?= $user->name ?? 'Unknown' ?>
        </span><img src="<?= $user->image ?>" width="40" height="40" />
      </div>
    </div>
    <div class="main">
      <div class="searchbox">
        <div>
          <form action="<?= site_url('index.php?action=search') ?>" method="POST">
            <input id="search_field" type="search" name="search" placeholder="Search Tasks" class="search_field" />
            <button type="submit" class="clickable"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
      <div class="nav">

        <div class="menu">

          <div class="title">Folders</div>
          <ul class="folder-list">

            <li class="<?= (isset($_GET['folder_id'])) ? '' : 'active'; ?>">
              <a href="<?= site_url() ?>"><i class="fa fa-folder"></i>All</a>
            </li>

            <?php foreach ($folders as $folder) : ?>
              <li class="<?php $folderId = $_GET['folder_id'] ?? null;
                          echo ($folderId == $folder->id) ? 'active' : ''; ?>">
                <a href="?folder_id=<?= $folder->id ?>"><i class="fa fa-folder"></i><?= $folder->name ?></a>
                <a href="?delete_folder=<?= $folder->id ?>" class="remove" onclick="return confirm('Are You Sure about deleting this item?\n<?= $folder->name ?>');"><i class="fa fa-trash-o"></i></a>
              </li>
            <?php endforeach; ?>


          </ul>
        </div>
        <input type="text" id="addFolderInput" placeholder="Add New Folder" class="addNewFolder" />
        <button id="addFolderBtn" class="clickable addFolderBtn">+</button>
      </div>

      <div class="view">
        <div class="viewHeader">
          <input type="text" class="AddNewTaskInput" id="AddNewTaskInput" placeholder="Add New Task (type your task name and press ENTER)">

        </div>
        <div class="content">
          <div class="list" id="wrapper">
            <div class="title">
              Today</div>
            <a href="<?= site_url('?orderBy=DESC') ?>"><button id="orderByDate">Latest First</button></a>
            <a href="<?= site_url('?orderBy=ASC') ?>"><button id="orderByDate">Oldest First</button></a>
            <ul class="task-list">
              <?php if (sizeof($tasks)) : ?>
                <?php foreach ($tasks as $task) : ?>
                  <li class="<?= $task->is_done ? 'checked' : ''; ?>">
                    <i data-taskId="<?= $task->id ?>" class="isDone clickable fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o'; ?>"></i>
                    <span><?= $task->title; ?></span>
                    <div class="info">
                      <span class="created-at">Created At <?= $task->created_at; ?></span>
                      <a href="?delete_task=<?= $task->id ?>" class="remove" onclick="return confirm('Are You Sure about deleting this item?\n<?= $task->title ?>');"><i class="fa fa-trash-o"></i></a>
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php else : ?>
                <li>No Task Here ...</li>
              <?php endif; ?>
            </ul>

          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="?startPoint=0">1</a></li>
              <li class="page-item"><a class="page-link" href="?startPoint=10">2</a></li>
              <li class="page-item"><a class="page-link" href="?startPoint=20">3</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="assets/js/script.js"></script>
  <script>
    $(document).ready(function() {

      $(".isDone").click(function(e) {
        var tid = $(this).attr('data-taskId');
        $.ajax({
          url: 'process/ajaxHandler.php',
          method: 'post',
          data: {
            action: "doneSwitch",
            taskId: tid
          },
          success: function(response) {
            if (response == 1) {
              location.reload();
            }
          }
        })
      })
      $('#addFolderBtn').click(function(e) {
        var input = $('input#addFolderInput');
        $.ajax({
          url: 'process/ajaxHandler.php',
          method: 'post',
          data: {
            action: "addFolder",
            folderName: input.val()
          },
          success: function(response) {
            if (response == '1') {
              $('<li> <a href="#"><i class="fa fa-folder"></i>' + input.val() + '</a> <a href="?delete_folder=6" class="remove"><i class="fa fa-trash-o"></i></a> </li>').appendTo('.folder-list');
            } else {
              alert(response);

            }
          }
        });
      });
      $('#AddNewTaskInput').on('keypress', function(e) {

        if (e.which == 13) {
          $.ajax({
            url: 'process/ajaxHandler.php',
            method: 'post',
            data: {
              action: "addTask",
              folderId: <?= $_GET['folder_id'] ?? 0 ?>,
              taskTitle: $('#AddNewTaskInput').val()
            },
            success: function(response) {
              if (response == 1) {
                location.reload();
              } else {
                alert(response);
              }
            }
          });
        }
      });
    });
  </script>
</body>

</html>