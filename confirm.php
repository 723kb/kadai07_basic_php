<?php
// これだと空文字として送信されてメッセージがでない
// $name = isset($_POST['name']) ? $_POST['name'] : '入力されていません';
// $email = isset($_POST['email']) ? $_POST['email'] : '入力されていません';

// empty関数で変数が空(空文字,'0',null,false,空配列)でないかを確認  issetでは無理だった
$name = !empty($_POST['name']) ? $_POST['name'] : ' - ';
$email = !empty($_POST['email']) ? $_POST['email'] : ' - ';
// isset関数で変数がセットされておりかつnullではないかを確認 !emptyでもいけた
$gender = isset($_POST['gender']) ? $_POST['gender'] : ' - ';
$age = isset($_POST['age']) ? $_POST['age'] : ' - ';
$address = isset($_POST['address']) ? $_POST['address'] : ' - ';
$marriage = !empty($_POST['marriage']) ? $_POST['marriage'] : ' - ';
$children = !empty($_POST['children']) ? $_POST['children'] : ' - ';
$childsAge = isset($_POST['childsAge']) ? $_POST['childsAge'] : ' - ';
// $transportation = foreach($_POST['transportation'] as $transportation);  これだとエラー

// 複数選択の値は配列として送られてくるので空配列を定義
$transportation = [];
if (isset($_POST['transportation'])) {
  foreach ($_POST['transportation'] as $value) {  // foreachで各値を処理
    $transportation[] = $value;  // ループ文で処理した内容を配列に格納
  }
} else {
  $transportation[] = ' - ';
}
// うまく表示させるために、配列内の要素をカンマ区切りの文字列として連結(implode)
$transportation_str = implode(", ", $transportation);
// range input の値を受け取る
$problems = isset($_POST['problems']) ? $_POST['problems'] . '%' : ' - '; // パーセント表記に変換
$story = !empty($_POST['story']) ? $_POST['story'] : ' - ';
?>

<html>

<head>
  <meta charset="utf-8">
  <title>確認画面</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- ファビコン -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <!-- アイコン -->
  <link rel="apple-touch-icon" href="img/apple-touch-icon-180x180.png" sizes="180x180">
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <h1>確認画面</h1>
      <form method="post" action="write.php">
        <p class="label_title">お名前</p>
        <span><?php echo htmlspecialchars($name); ?></span>
        <p class="label_title">メールアドレス</p>
        <span><?php echo htmlspecialchars($email); ?></span>
        <p class="label_title">性別</p>
        <span><?php echo htmlspecialchars($gender); ?></span>
        <p class="label_title">年齢</p>
        <span><?php echo htmlspecialchars($age); ?></span>
        <p class="label_title">居住地</p>
        <span><?php echo htmlspecialchars($address); ?></span>
        <p class="label_title">家族構成</p>
        <span><?php echo htmlspecialchars($marriage); ?></span>
        <p class="label_title">お子様の有無</p>
        <span><?php echo htmlspecialchars($children); ?></span>
        <p class="label_title">お子様の年齢</p>
        <span><?php echo htmlspecialchars($childsAge); ?></span>
        <p class="label_title">普段の移動手段（複数選択可）</p>
        <span><?php echo htmlspecialchars($transportation_str); ?></span>
        <p class="label_title">移動手段での困りごとはあるか</p>
        <span>ある<?php echo htmlspecialchars($problems); ?></span>
        <p class="label_title">どんなことに困っていますか？</p>
        <span><?php echo htmlspecialchars($story); ?></span>

        <!-- 隠しフィールドによる選択肢の送信 -->
        <input type="hidden" name="name" value=" <?php echo htmlspecialchars($name); ?>">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <input type="hidden" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
        <input type="hidden" name="age" value="<?php echo htmlspecialchars($age); ?>">
        <input type="hidden" name="address" value="<?php echo htmlspecialchars($address); ?>">
        <input type="hidden" name="marriage" value="<?php echo htmlspecialchars($marriage); ?>">
        <input type="hidden" name="children" value="<?php echo htmlspecialchars($children); ?>">
        <input type="hidden" name="childsAge" value="<?php echo htmlspecialchars($childsAge); ?>">
        <input type="hidden" name="transportation[]" value="<?php echo htmlspecialchars($transportation_str); ?>">
        <input type="hidden" name="problems" value="<?php echo htmlspecialchars($problems); ?>">
        <input type="hidden" name="story" value="<?php echo htmlspecialchars($story); ?>">

        <div class="btn_area">
          <input type="button" class="back_btn" value="戻る" onClick="history.back()">
          <input type="submit" class="submit_btn" value="送信する">
        </div>
      </form>
    </div>
    <footer>
      <p>2024©なっちゃん</p>
    </footer>
  </div>
</body>

</html>