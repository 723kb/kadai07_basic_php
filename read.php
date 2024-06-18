<?php
// テキストファイルからデータを読み込む
$data = file_get_contents('data/data.txt');

// 改行で各行を分割
$rows = explode("\n", $data);

// 移動手段の集計用配列
$transportation = [
  "自家用車" => 0,
  "電車" => 0,
  "バス" => 0,
  "自転車" => 0,
  "徒歩" => 0
];

// 年齢の集計用配列
$age = [
  "10代" => 0,
  "20代" => 0,
  "30代" => 0,
  "40代" => 0,
  "50代" => 0,
  "60代以上" => 0
];

// 各行をループしてデータを集計
foreach ($rows as $row) {
  // 空の行をスキップ
  if (trim($row) == '') {
    continue;
  }

  // スラッシュで各フィールドを分割
  $fields = explode("/", $row);

  // 移動手段のデータの処理
  if (isset($fields[9])) {
    // 9番目のフィールドをカンマで分割し、配列に格納
    $transports = explode(",", trim($fields[9]));

    // 各移動手段についてループ処理
    foreach ($transports as $transport) {
      $transport = trim($transport); // 前後の空白を削除

      // 移動手段が$transportation配列に存在する場合にカウントを増やす
      if (isset($transportation[$transport])) {
        $transportation[$transport]++;
      }
    }
  }

  // 年齢のデータの処理
  if (isset($fields[4])) {
    // 4番目のフィールドから年齢の値を取得し、整数に変換して $ageValue に格納
    $ageValue = intval(trim($fields[4]));

    // 年齢の範囲ごとに条件分岐し、該当する年代のカウントをインクリメントする
    if ($ageValue >= 10 && $ageValue < 20) {
      $age["10代"]++;
    } elseif ($ageValue >= 20 && $ageValue < 30) {
      $age["20代"]++;
    } elseif ($ageValue >= 30 && $ageValue < 40) {
      $age["30代"]++;
    } elseif ($ageValue >= 40 && $ageValue < 50) {
      $age["40代"]++;
    } elseif ($ageValue >= 50 && $ageValue < 60) {
      $age["50代"]++;
    } elseif ($ageValue >= 60) {
      $age["60代以上"]++;
    }
  }
}

// HTMLテーブルの開始タグを出力
echo "<table border='1'>";

// テーブルヘッダーを定義
$headers = ["登録日時", "名前", "Email", "性別", "年齢", "居住地", "家族構成", "子どもの有無", "子どもの年齢", "移動手段", "移動での困りごと", "困りごと"];

// テーブルヘッダーの開始タグを出力
echo "<tr>";
foreach ($headers as $header) {
  echo "<th>" . htmlspecialchars($header) . "</th>";
}
echo "</tr>";

// 各行をループしてテーブルの行を作成
foreach ($rows as $row) {
  // 空の行をスキップ
  if (trim($row) == '') {
    continue;
  }
  // スラッシュで各フィールドを分割
  $fields = explode("/", $row);

  // テーブルの行の開始タグを出力
  echo "<tr>";

  // 各フィールドをループしてテーブルのデータセルを作成
  foreach ($fields as $index => $field) {
    // 名前とEmailの列の場合、代替の文字列を表示
    if ($index == 1 || $index == 2) {
      echo "<td>非表示</td>";
    } else {
      // テーブルのデータセルを出力
      echo "<td>" . htmlspecialchars($field) . "</td>";
    }
  }

  // テーブルの行の終了タグを出力
  echo "</tr>";
}

// HTMLテーブルの終了タグを出力
echo "</table>";
?>
<html>

<head>
  <meta charset="utf-8">
  <title>登録データ表示</title>
  <link rel="stylesheet" href="css/graph.css">
  <!-- ファビコン -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <!-- アイコン -->
  <link rel="apple-touch-icon" href="img/apple-touch-icon-180x180.png" sizes="180x180">
</head>

<body>
  <div id="chart-container">
    <canvas id="myChart"></canvas>
    <canvas id="ageChart"></canvas>
  </div>
  <div class="link">
    <a href="index.php" class="home_btn bgright"><span>最初に戻る</span></a>
  </div>

  <!-- Chart.jsの読み込み -->
  <!-- なぜかプラグイン動かない -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
  <script>
    // PHPからデータを受け取る
    // エスケープする文字を指定し、JSON形式の文字列として格納
    var transportationData = <?php echo json_encode(array_values($transportation), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    var ageData = <?php echo json_encode(array_values($age), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;

    console.log("Transportation Data: ", transportationData);
    console.log("Age Data: ", ageData);

    // Chart.jsを使って円グラフを描画
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["自家用車", "電車", "バス", "自転車", "徒歩"],
        datasets: [{
          label: '移動手段',
          data: transportationData,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: false,
        maintainAspectRatio: false, // アスペクト比を維持する
        layout: {
          padding: {
            bottom: 20
          }
        },
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              padding: 10
            }
          },
          title: {
            display: true,
            text: '普段の移動手段（複数選択可）',
            position: 'top',
            padding: {
              top: 20,
              bottom: 20
            }
          },
          datalabels: { // なぜか効いていない
            formatter: (value, context) => {
              const total = context.dataset.data.reduce((a, b) => a + b, 0);
              const percentage = ((value / total) * 100).toFixed(0) + '%';
              return `${context.chart.data.labels[context.dataIndex]}: ${value} (${percentage})`;
            },
            display: true,
            color: '#000',
            font: {
              weight: 'bold'
            }
          }
        }
      }
    });

    // Chart.jsを使って年齢の棒グラフを描画
    var ctxAge = document.getElementById("ageChart").getContext('2d');
    var ageChart = new Chart(ctxAge, {
      type: 'bar',
      data: {
        labels: ['10代', '20代', '30代', '40代', '50代', '60代以上'],
        datasets: [{
          label: '年齢分布',
          data: ageData,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: false,
        maintainAspectRatio: false, // アスペクト比を維持する
        scales: {
          x: {
            display: true, // x軸のラベルを表示
          },
          y: {
            beginAtZero: true,
            display: false // y軸のラベルを非表示にする
          }
        },
        plugins: {
          legend: {
            display: false
          },
          title: {
            display: true,
            text: '年齢分布',
            position: 'top',
            padding: {
              top: 20,
              bottom: 20
            }
          },
          datalabels: {
            anchor: 'end',
            align: 'end',
            formatter: (value) => `${value}人`,
            display: true,
            color: '#000',
            font: {
              weight: 'bold'
            }
          }
        }
      }
    });
  </script>
</body>

</html>

<!-- explode -->
<!-- intval -->