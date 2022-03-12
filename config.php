<?php

// 接続に必要な情報を定数として定義
// hostにはコンテナ名を指定する
define('DSN', 'mysql:host=db;dbname=sudoku_db;charset=utf8;');
define('USER', 'testuser');
define('PASSWORD', '9999');


define('MSG_TITLE_REQUIRED', 'タスク名を入力してください');
define('MSG_TITLE_NO_CHANGE', 'タスク名が変更されていません');

define('TASK_STATUS_NOTYET', 'notyet');
define('TASK_STATUS_DONE', 'done');
//define('TASK_STATUS_CANCEL', 'notyet');

