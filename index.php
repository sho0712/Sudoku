<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

// タスク登録
$title = '';
$errors = '';
$place = '';
$status = '';
$sudoku = '';


$sudoku = [4, 0, 0, 0, 0, 0, 0, 0, 1, 0, 4, 0, 0, 0, 0, 2];

?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($sudoku[0] == 0) {
        $sudoku[0] = filter_input(INPUT_POST, 'A_1');
        $sudoku[0] = intval($sudoku[0]);
    }
    if ($sudoku[1] == 0) {
        $sudoku[1] = filter_input(INPUT_POST, 'A_2');
        $sudoku[1] = intval($sudoku[1]);
    }
    if ($sudoku[2] == 0) {
        $sudoku[2] = filter_input(INPUT_POST, 'A_3');
        $sudoku[2] = intval($sudoku[2]);
    }
    if ($sudoku[3] == 0) {
        $sudoku[3] = filter_input(INPUT_POST, 'A_4');
        $sudoku[3] = intval($sudoku[3]);
    }
    if ($sudoku[4] == 0) {
        $sudoku[4] = filter_input(INPUT_POST, 'B_1');
        $sudoku[4] = intval($sudoku[4]);
    }
    if ($sudoku[5] == 0) {
        $sudoku[5] = filter_input(INPUT_POST, 'B_2');
        $sudoku[5] = intval($sudoku[5]);
    }
    if ($sudoku[6] == 0) {
        $sudoku[6] = filter_input(INPUT_POST, 'B_3');
        $sudoku[6] = intval($sudoku[6]);
    }
    if ($sudoku[7] == 0) {
        $sudoku[7] = filter_input(INPUT_POST, 'B_4');
        $sudoku[7] = intval($sudoku[7]);
    }
    if ($sudoku[8] == 0) {
        $sudoku[8] = filter_input(INPUT_POST, 'C_1');
        $sudoku[8] = intval($sudoku[8]);
    }
    if ($sudoku[9] == 0) {
        $sudoku[9] = filter_input(INPUT_POST, 'C_2');
        $sudoku[9] = intval($sudoku[9]);
    }
    if ($sudoku[10] == 0) {
        $sudoku[10] = filter_input(INPUT_POST, 'C_3');
        $sudoku[10] = intval($sudoku[10]);
    }
    if ($sudoku[11] == 0) {
        $sudoku[11] = filter_input(INPUT_POST, 'C_4');
        $sudoku[11] = intval($sudoku[11]);
    }
    if ($sudoku[12] == 0) {
        $sudoku[12] = filter_input(INPUT_POST, 'D_1');
        $sudoku[12] = intval($sudoku[12]);
    }
    if ($sudoku[13] == 0) {
        $sudoku[13] = filter_input(INPUT_POST, 'D_2');
        $sudoku[13] = intval($sudoku[13]);
    }
    if ($sudoku[14] == 0) {
        $sudoku[14] = filter_input(INPUT_POST, 'D_3');
        $sudoku[14] = intval($sudoku[14]);
    }
    if ($sudoku[15] == 0) {
        $sudoku[15] = filter_input(INPUT_POST, 'D_4');
        $sudoku[15] = intval($sudoku[15]);
    }
}


?>

<!DOCTYPE html>
<html lang="ja">


<?php include_once __DIR__ . '/_head.html' ?>
<!-- 
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
                        <td align="center"><?= $sudoku[4] ?></td>
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
</body> -->

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
            <a href="http://www.sudokugame.org/">
                ここをクリック
            </a>


            <title></title>
            </head>

            <body>
                <h1>ミニ独数問題</h1>
                <table border="3" align="center" width="500" height="200">
                    <div class="table">
                        <tr width=20% height="50">
                            <th width=20%></th>
                            <th width=20%>A</th>
                            <th width=20%>B</th>
                            <th width=20%>C</th>
                            <th width=20%>D</th>
                        </tr>
                        <tr height="50">
                            <td width=20% align="center">１行</td>
                            <td align="center"><?= $sudoku[0] ?></td>
                            <td align="center"><?= $sudoku[1] ?></td>
                            <td align="center"><?= $sudoku[2] ?></td>
                            <td align="center"><?= $sudoku[3] ?></td>
                        </tr>
                        <tr height="50">
                            <td align="center">２行</td>
                            <td align="center"><?= $sudoku[4] ?></td>
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
            </body>









            <form action="" method="post">
                <input type="number" min="0" max="4" name="A_1" placeholder="A1の数字を入力してください　例：３" value="<?= $sudoku[0] ?>">
                <input type="submit" value="A1" class="btn done-btn">
                <input type="number" min="0" max="4" name="A_2" placeholder="B1の数字を入力してください　例：３" value="<?= $sudoku[1] ?>">
                <input type="submit" value="B1" class="btn done-btn">
                <input type="number" min="0" max="4" name="A_3" placeholder="C1の数字を入力してください　例：３" value="<?= $sudoku[2] ?>">
                <input type="submit" value="C1" class="btn done-btn">
                <input type="number" min="0" max="4" name="A_4" placeholder="D1の数字を入力してください　例：３" value="<?= $sudoku[3] ?>">
                <input type="submit" value="D1" class="btn done-btn">
                <input type="number" min="0" max="4" name="B_1" placeholder="A2の数字を入力してください　例：３" value="<?= $sudoku[4] ?>">
                <input type="submit" value="A2" class="btn done-btn">
                <input type="number" min="0" max="4" name="B_2" placeholder="B2の数字を入力してください　例：３" value="<?= $sudoku[5] ?>">
                <input type="submit" value="B2" class="btn done-btn">
                <input type="number" min="0" max="4" name="B_3" placeholder="C2の数字を入力してください　例：３" value="<?= $sudoku[6] ?>">
                <input type="submit" value="C2" class="btn done-btn">
                <input type="number" min="0" max="4" name="B_4" placeholder="D2の数字を入力してください　例：３" value="<?= $sudoku[7] ?>">
                <input type="submit" value="D2" class="btn done-btn">
                <input type="number" min="0" max="4" name="C_1" placeholder="A3の数字を入力してください　例：３" value="<?= $sudoku[8] ?>">
                <input type="submit" value="A3" class="btn done-btn">
                <input type="number" min="0" max="4" name=" C_2" placeholder="B3の数字を入力してください　例：３" value="<?= $sudoku[9] ?>">
                <input type="submit" value="B3" class="btn done-btn">
                <input type="number" min="0" max="4" name="C_3" placeholder="C3の数字を入力してください　例：３" value="<?= $sudoku[10] ?>">
                <input type="submit" value="C3" class="btn done-btn">
                <input type="number" min="0" max="4" name="C_4" placeholder="D3の数字を入力してください　例：３" value="<?= $sudoku[11] ?>">
                <input type="submit" value="D3" class="btn done-btn">
                <input type="number" min="0" max="4" name="D_1" placeholder="A4の数字を入力してください　例：３" value="<?= $sudoku[12] ?>">
                <input type="submit" value="A4" class="btn done-btn">
                <input type="number" min="0" max="4" name="D_2" placeholder="B4の数字を入力してください　例：３" value="<?= $sudoku[13] ?>">
                <input type="submit" value="B4" class="btn done-btn">
                <input type="number" min="0" max="4" name="D_3" placeholder="C4の数字を入力してください　例：３" value="<?= $sudoku[14] ?>">
                <input type="submit" value="C4" class="btn done-btn">
                <input type="number" min="0" max="4" name="D_4" placeholder="D4の数字を入力してください　例：３" value="<?= $sudoku[15] ?>">
                <input type="submit" value="D4" class="btn done-btn">
                <!-- <input type="submit" value="解答" class="btn submit-btn"> -->

            </form>
            <form action="seikai_task.php" method="post">
                <input type="submit" value="正解" class="btn submit-btn">
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