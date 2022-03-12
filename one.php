<?php

require_once __DIR__ . '/functions.php';
$id = filter_input(INPUT_GET, 'id');
$task = find_by_id($id);

$title ='';
$errors = [];

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $title = filter_input(INPUT_POST,'title');

    $errors = update_validate($title,$task);

    if (empty($errors)){
        update_task($id,$title);
        
        header('Location:index.php');
        exit;
    }
}
