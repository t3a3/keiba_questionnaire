<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">入力画面へ</a>
    <?php
    $fp = fopen("data/data.csv", "r");
    // テーブルタグを作成し、テーブルヘッダーで見出しを作る
    echo '<table border="1">
      <tr>
      <th>名前</th>
      <th>馬名</th>
      <th>理由</th>
      </tr>';

    // while文でCSVファイルのデータを1つずつ繰り返し読み込む
    while ($data = fgetcsv($fp)) {

        // テーブルセルに配列の値を格納
        echo '<tr>';
        echo '<td>' . $data[0] . '</td>';
        echo '<td>' . $data[1] . '</td>';
        echo '<td>' . $data[2] . '</td>';
        echo '</tr>';
    }

    // テーブルの閉じタグ
    echo '</table>';

    // 開いたファイルを閉じる
    fclose($fp);
    ?>
</body>

</html>