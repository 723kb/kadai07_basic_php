<?php
// empty関数で変数が空(空文字,'0',null,false,空配列)でないかを確認  issetでは無理だった
$name = !empty($_GET['name']) ? $_GET['name'] : '入力されていません';
$email = !empty($_GET['email']) ? $_GET['email'] : '入力されていません';

// isset関数で変数がセットされておりかつnullではないかを確認 !emptyでもいけた
$gender = isset($_GET['gender']) ? $_GET['gender'] : 'チェックされていません';
$age = isset($_GET['age']) ? $_GET['age'] : '入力されていません';
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
?>


<html>
<meta charset="utf-8">

<head></head>

<body>

  <h1>確認画面</h1>

  <form method="GET" action="write.php">

    お名前: <?php echo htmlspecialchars($name); ?><br>
    メールアドレス: <?php echo htmlspecialchars($email); ?><br>
    性別: <?php echo htmlspecialchars($gender); ?><br>
    年齢: <?php echo htmlspecialchars($age); ?><br>
    普段の移動手段（複数選択可）: <?php echo htmlspecialchars($transportation_str); ?><br>

    <!-- 隠しフィールドによる選択肢の送信 -->
    <input type="hidden" name="name" value=" <?php echo htmlspecialchars($name); ?>">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="hidden" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
    <input type="hidden" name="age" value="<?php echo htmlspecialchars($age); ?>">
    <input type="hidden" name="transportation[]" value="<?php echo htmlspecialchars($transportation_str); ?>">

    <input type="button" value="戻る" onClick="history.back()">
    <input type="submit" value="送信する">

  </form>

</body>

</html>