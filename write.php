<?php
// これだと空文字として送信されてメッセージがでない
// $name = isset($_GET['name']) ? $_GET['name'] : '入力されていません';
// $email = isset($_GET['email']) ? $_GET['email'] : '入力されていません';

// empty関数で変数が空(空文字,'0',null,false,空配列)でないかを確認  issetでは無理だった
$name = !empty($_GET['name']) ? $_GET['name'] : '入力されていません';
$email = !empty($_GET['email']) ? $_GET['email'] : '入力されていません';

// isset関数で変数がセットされておりかつnullではないかを確認 !emptyでもいけた
$gender = isset($_GET['gender']) ? $_GET['gender'] : 'チェックされていません';
$age = isset($_GET['age']) ? $_GET['age'] : '入力されていません';

// $transportation = foreach($_GET['transportation'] as $transportation);  これだとエラー
// 複数選択の値は配列として送られてくるので空配列を定義
$transportation = [];
if (isset($_GET['transportation'])) {
    foreach ($_GET['transportation'] as $value) {  // foreachで各値を処理
        $transportation[] = $value;  // ループ文で処理した内容を配列に格納
    }
} else {
    $transportation[] = 'チェックされていません';
}

// うまく表示させるために、配列内の要素をカンマ区切りの文字列として連結(implode)
$transportation_str = implode(", ", $transportation);

var_dump($_GET['transportation']);

//日本のタイムゾーンに設定
date_default_timezone_set('Asia/Tokyo'); 

// ファイルに書き込み
$time = date('Y-m-d H:i:s');
//文字作成
// $data = $time . 'test' . "\n";  // \nで改行される
$data = $time . "/" . $name .  "/" . $email . "/" . $gender . "/" . $age .  "/" .  $transportation_str . "\n";

// file_put_contentsはメソッド 第一引数:保存先 第二引数:保存するもの 第三引数:方法(FILE_APPENDは上書き)
file_put_contents('data/data.txt',  $data, FILE_APPEND);

var_dump($_GET);

?>


<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>

    <h1>書き込みしました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2>

    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="input.php">戻る</a></li>
    </ul>

</body>

</html>


<!-- isset関数 変数がセットされておりかつnullではないかを確認 -->
<!-- implode関数 配列内の要素をカンマ区切りの文字列として連結  -->
<!-- empty関数 変数が空(空文字,'0',null,false,空配列)でないかを確認 -->