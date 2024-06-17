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

// 各行をループしてデータを集計
foreach ($rows as $row) {
  // 空の行をスキップ
  if (trim($row) == '') {
    continue;
  }
  // スラッシュで各フィールドを分割
  $fields = explode("/", $row);

  // 移動手段のデータが6番目のフィールドにあると仮定
  $transports = explode(",", trim($fields[5])); // 移動手段がカンマ区切り

  // 移動手段を集計
  foreach ($transports as $transport) {
    $transport = trim($transport); // 前後の空白を削除
    if (isset($transportation[$transport])) {
      $transportation[$transport]++;
    }
  }
}

// HTMLテーブルの開始タグを出力
echo "<table border='1'>";

// テーブルヘッダーを定義
$headers = ["登録日時", "お名前", "Email", "性別", "年齢", "移動手段"];

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
  foreach ($fields as $field) {
    // テーブルのデータセルを出力
    echo "<td>" . htmlspecialchars($field) . "</td>";
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
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #content {
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table, th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    #chart-container {
      width: 100%;
      max-width: 800px;
      margin: auto;
      text-align: center;
    }

    canvas {
      margin: auto;
    }
  </style>
</head>

<body>
  <div id="chart-container">
    <canvas id="myChart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
  <script>
    var array = <?php echo json_encode(array_values($transportation), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    console.log(array);

    // Chart.jsを使って円グラフを描画
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["自家用車", "電車", "バス", "自転車", "徒歩"],
        datasets: [{
          label: '移動手段',
          data: array,
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
        responsive: true,
        maintainAspectRatio: false,
        layout: {
          padding: {
            bottom: 20 // グラフと凡例の間に余白を追加
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
          datalabels: { // なぜか％表示ができない
            formatter: (value, context) => {
              const total = context.dataset.data.reduce((a, b) => a + b, 0);
              const percentage = ((value / total) * 100).toFixed(0) + '%';
              return `${context.label}: ${value} (${percentage})`;
            },
            display: true,
            color: '#000', // テキストの色
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