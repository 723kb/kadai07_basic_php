<?php
// confirm.phpでもデータの処理方法は書いてるが、write.phpでも書かないとデータの書き込みができない
$name = !empty($_POST['name']) ? $_POST['name'] : ' - ';
$email = !empty($_POST['email']) ? $_POST['email'] : ' - ';
$gender = isset($_POST['gender']) ? $_POST['gender'] : ' - ';
$age = isset($_POST['age']) ? $_POST['age'] : ' - ';
$address = isset($_POST['address']) ? $_POST['address'] : ' - ';
$marriage = !empty($_POST['marriage']) ? $_POST['marriage'] : ' - ';
$children = !empty($_POST['children']) ? $_POST['children'] : ' - ';
$childsAge = isset($_POST['childsAge']) ? $_POST['childsAge'] : ' - ';
$transportation = [];
if (isset($_POST['transportation'])) {
    foreach ($_POST['transportation'] as $value) {
        $transportation[] = $value;
    }
} else {
    $transportation[] = ' - ';
}
$transportation_str = implode(", ", $transportation);
// var_dump($_POST['transportation']);
$problems = isset($_POST['problems']) ? $_POST['problems'] : ' - ';   // ここでは％に直さなくていい ダブってしまう
$story = !empty($_POST['story']) ? $_POST['story'] : ' - ';

//日本のタイムゾーンに設定
date_default_timezone_set('Asia/Tokyo');

// ファイルに書き込み
$time = date('Y-m-d H:i:s');
//文字作成
// $data = $time . 'test' . "\n";  // \nで改行される
$data = $time . "/" . $name .  "/" . $email . "/" . $gender . "/" . $age .  "/" . $address . "/" . $marriage . "/" . $children .  "/" . $childsAge . "/" . $transportation_str . "/" . $problems . "/" . $story . "\n";

// file_put_contentsはメソッド 第一引数:保存先 第二引数:保存するもの 第三引数:方法(FILE_APPENDは上書き)
file_put_contents('data/data.txt',  $data, FILE_APPEND);

// var_dump($_POST);
?>

<html>

<head>
    <meta charset="utf-8">
    <title>完了画面</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- ファビコン -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- アイコン -->
    <link rel="apple-touch-icon" href="img/apple-touch-icon-180x180.png" sizes="180x180">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>完了画面</h1>
            <h2>データが送信されました。</h2>
            <div class="link">
                <a href="input.php" class="home_btn bgright"><span>最初に戻る</span></a>
                <a href="read.php" class="read_btn bgleft"><span>データをみる</span></a>
            </div>
        </div>
        <footer>
            <p>2024©なっちゃん</p>
        </footer>
    </div>
</body>

</html>


<!-- isset関数 変数がセットされておりかつnullではないかを確認 -->
<!-- implode関数 配列内の要素をカンマ区切りの文字列として連結  -->
<!-- empty関数 変数が空(空文字,'0',null,false,空配列)でないかを確認 -->
<!-- 連想配列 -->