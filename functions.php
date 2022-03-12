<?php

// 設定ファイルを読み込む
require_once __DIR__ . '/config.php';

// 接続処理を行う関数
function connect_db()
{
    // try ~ catch 構文
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        // 接続がうまくいかない場合こちらの処理が実行される
        echo $e->getMessage();
        exit;
    }
}

// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


function find_task_by_status($status)
{
    $dbh = connect_db();


    // statusを抽出条件に指定してデータを取得
    $sql = <<<EOM
    SELECT
        *
    FROM
        kadai3
    WHERE
        status = :status;
    EOM;

    //プライペアドステートメント
    $stmt = $dbh->prepare($sql);
    //$status = 'notyet';
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function find_by_id($id)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        tasks
    WHERE
        id = :id
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insert_validate($title)
{
    $errors = [];
    if (empty($title)) {
        $errors[] = MSG_TITLE_REQUIRED;
    }
    return $errors;
}


function insert_task($title)
{
    $dbh = connect_db();
    $sql = <<< EOM
    INSERT INTO
        kadai3
        (title)
    VALUES
        (:title)
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->execute();
}

function update_status_to_done($id)
{
    $dbh = connect_db();

    $sql = <<<EOM
    UPDATE
        tasks
    SET
        status = :status
    WHERE
        id = :id
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $status = TASK_STATUS_DONE;
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->execute();
}


function update_status_to_cancel($id)
{
    $dbh = connect_db();

    $sql = <<<EOM
    UPDATE
        tasks
    SET
        status = :status
    WHERE
        id = :id
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $status = TASK_STATUS_NOTYET;
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->execute();
}


function update_validate($title, $task)
{
    $errors = [];
    if (empty($title)) {
        $errors[] = MSG_TITLE_REQUIRED;
    }
    if ($title == $task['title']) {
        $errors[] = MSG_TITLE_NO_CHANGE;
    }
    return $errors;
}

function update_task($id, $title)
{
    $dbh = connect_db();
    $sql = <<< EOM
    UPDATE
        tasks
    SET
        title = :title
    WHERE
        id = :id
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function delete_task($id)
{
    $dbh = connect_db();
    $sql = <<<EOM
    DELETE FROM
        tasks
    WHERE
        id = :id
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function input_task($title,$status)
{
    $dbh = connect_db();
    $sql = <<< EOM
    UPDATE
        kadai3
    SET
        status = :status
    WHERE
        title = :title
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}