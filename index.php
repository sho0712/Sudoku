<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

// タスク登録
$title = '';
$errors = '';
$place = '';
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filter_input(INPUT_POST, 'title');
    $errors = insert_validate($title);
    if (empty($errors)) {
        insert_task($title);
    }
}

// 未完了タスク
$notyet_tasks = find_task_by_status(TASK_STATUS_NOTYET);
//var_dump($notyet_tasks);

//完了タスク
$done_tasks = find_task_by_status(TASK_STATUS_DONE);
//var_dump($done_tasks);

?>

<!DOCTYPE html>
<html lang="ja">


<?php include_once __DIR__ . '/_head.html' ?>

<head>
    <title></title>
</head>

<body>
    <div class="wrapper">
        <div class="new-task">
            <h1>ミニ独数問題</h1>

            <table border="1" width="600" height="200">
                <!-- 表全体の高さを最初に指定しておく -->
                <div class="table">
                    <tr height="50">
                        <th></th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr>
                    <tr height="50">
                        <td align="center">１行</td>
                        <td align="center">４</td>
                        <td align="center">$title</td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                    <tr height="50">
                        <td align="center">２行</td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                    <tr height="50">
                        <td align="center">３行</td>
                        <td align="center">１</td>
                        <td align="center"></td>
                        <td align="center">４</td>
                        <td align="center"></td>
                    </tr>
                    <tr height="50">
                        <td align="center">４行</td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center">２</td>
                    </tr>
                </div>
            </table>
        </div>
    </div>
</body>

<body>
    <div class="wrapper">
        <div class="new-task">
            <h1>ミニ独数</h1>
            <!-- エラーが発生した場合、エラーメッセージを出力 -->
            <?php if (!empty($errors)) : ?>
                <ul class="errors">
                    <?php foreach ($errors as $error) : ?>
                        <li><?= h($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <h2>ミニ数独のルールと遊び方</h2>
            <p>
                　ミニ数独の解き方は、４x４の枠の中に１～４の数字を入れ、縦横と各枠（太線の四角い２x２の枠）の数字は重複してはいけない。
                ゲームを始める時、４x４の四角い枠には多くの空いたマスがあり、推理して足りない数字を書くだけですべての枠を完成させることができる。
            </p>
            <ul>
                <li>縦列に数字１～４を、それぞれ一度だけ使える。</li>
                <li>横列に数字１～４を、それぞれ一度だけ使える。</li>
                <li>各小さな枠に数字１～４を、それぞれ一度だけ使える。</li>
            </ul>
            <form action="" method="post">
                <input type="text" name="title" placeholder="場所を入力してください　例：A1">
                <input type="text" name="status" placeholder="数字を入力してください　例：３">
                <input type="submit" value="登録" class="btn submit-btn">
            </form>
        </div>
        <div class="notyet-task">
            <h2>未完了タスク</h2>
            <ul>
                <?php foreach ($notyet_tasks as $task) : ?>
                    <li>
                        <a href="done.php?id=<?= h($task['id']) ?>" class="btn done-btn">完了</a>
                        <a href="edit.php?id=<?= h($task['id']) ?>" class="btn edit-btn">編集</a>
                        <a href="delete.php?id=<?= h($task['id']) ?>" class="btn delete-btn">削除</a>
                        <?= h($task['title']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>