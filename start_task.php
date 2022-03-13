<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

$sudoku =[4, 0, 0, 0, 0, 0, 0, 0, 1, 0, 4, 0, 0, 0, 0, 2];
// var_dump($sudoku);

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
</body>
