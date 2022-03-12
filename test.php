<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

// タスク登録
$title = '';
$errors = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filter_input(INPUT_POST, 'title');
    $errors = insert_validate($title);
    if (empty($errors)) {
        insert_task($title);
    }
}

// 未完了タスク
$notyet_tasks = find_task_by_status(TASK_STATUS_NOTYET);
var_dump($notyet_tasks);


