<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

// タスク登録
$title = '';
$errors = '';
$place = '';
$status = '';

$sudoku = [4, 2, 1, 3, 3, 1, 2, 4, 2, 3, 4, 1, 1, 4, 3, 2];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sudoku[0] = filter_input(INPUT_POST, 'title');
    $status = filter_input(INPUT_POST, 'status');
    $errors = insert_validate($title);
    if (empty($errors)) {
        insert_task($title);
    }
}

// 未完了タスク
$notyet_tasks = find_task_by_status(TASK_STATUS_NOTYET);
//var_dump($notyet_tasks);

//完了タスク
//$done_tasks = find_task_by_status(TASK_STATUS_DONE);
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
                        <td align="center"><?= $sudoku[0] ?></td>
                        <td align="center"><?= $sudoku[1] ?></td>
                        <td align="center"><?= $sudoku[2] ?></td>
                        <td align="center"><?= $sudoku[3] ?></td>
                    </tr>
                    <tr height="50">
                        <td align="center">２行</td>
                        <td align="center"><?= $status ?></td>
                        <td align="center"><?= $sudoku[5] ?></td>
                        <td align="center"><?= $sudoku[6] ?></td>
                        <td align="center"><?= $sudoku[7] ?></td>
                    </tr>
                    <tr height="50">
                        <td align="center">３行</td>
                        <td align="center"><?= $sudoku[8] ?></td>
                        <td align="center"><?= $sudoku[9] ?></td>
                        <td align="center"><?= $sudoku[10] ?></td>
                        <td align="center"><?= $sudoku[11] ?></td>
                    </tr>
                    <tr height="50">
                        <td align="center">４行</td>
                        <td align="center"><?= $sudoku[12] ?></td>
                        <td align="center"><?= $sudoku[13] ?></td>
                        <td align="center"><?= $sudoku[14] ?></td>
                        <td align="center"><?= $sudoku[15] ?></td>
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
                <input type="text" name="title" placeholder="数字を入力してください　例：３">
                <input type="text" name="status" placeholder="数字を入力してください　例：３">
                <input type="submit" value="A1登録" class="btn submit-btn">
            </form>
            <form action="" method="post">
                <input type="submit" value="解答" class="btn submit-btn">
            </form>
        </div>
        <!-- <div class="notyet-task">
            <h2>入力履歴</h2>
            <ul>
                <?php foreach ($notyet_tasks as $task) : ?>
                    <li>
                        <a href="one.php?id=<?= h($task['id']) ?>" class="btn done-btn">１ </a>
                        <a href="two.php?id=<?= h($task['id']) ?>" class="btn done-btn">２ </a>
                        <a href="three.php?id=<?= h($task['id']) ?>" class="btn done-btn">３ </a>
                        <a href="foru.php?id=<?= h($task['id']) ?>" class="btn done-btn">４ </a>
                        <?= h($task['title']) ?>
                        <?= h($task['status']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div> -->
    </div>
</body>

</html>