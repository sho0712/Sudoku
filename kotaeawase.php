<?php

// 設定ファイルを読み込む
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$dbh = connect_db();
$status = '';


// すべてのデータを取得

$sql = <<<EOM
    SELECT
        *
    FROM
        kadai3
    WHERE
        id BETWEEN 1 AND 16;
    EOM;

//プライペアドステートメント
$stmt = $dbh->prepare($sql);

$stmt->bindParam(':status', $status, PDO::PARAM_STR);

$stmt->execute();
//$a = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($a);
return $stmt->fetchAll(PDO::FETCH_ASSOC);


?>