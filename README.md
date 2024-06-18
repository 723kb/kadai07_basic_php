# ①課題番号-プロダクト名

kadai07_basic_php 

## ②課題内容（どんな作品か）

- PHPを使ってアンケートフォームのデータを取得することができるアプリ。
- 取得したデータは表形式で表示＆Chart.jsによってグラフ化。
- レスポンシブ非対応。

## ③DEMO

https://723kb.sakura.ne.jp/kadai07_basic_php/input.php

## ④作ったアプリケーション用のIDまたはPasswordがある場合

- ID: 今回はなし
- PW: 今回はなし

## ⑤工夫した点・こだわった点

- 様々なinput typeからデータを取得できるようにした。
- データ送信前に確認画面が表示されるようにし、修正したい場合は入力した内容を保持したまま前のページに戻ることができるように操作性を意識した。
- 取得したデータは表とグラフの2パターンで表示した。名前やEmailは秘匿情報とし、あえて「非表示」と表示されるようにした。円グラフと棒グラフの2パターンを作成した。

## ⑥難しかった点・次回トライしたいこと(又は機能)

- 取得したデータをどう活用するかが難しいと思った。
- データを一つずつ表のセルに入れていく部分やグラフにデータを渡す部分など、取得したデータを処理する部分が難しかった。
- グラフの細かな設定（棒グラフの横グリッド線が消えた、％表示できない）が思うようにできなかった。この部分に関してはjsの範疇なので復習が必要。

## ⑦質問・疑問・感想、シェアしたいこと等なんでも

- [感想]jsでやってきた配列のことなどが活かせ、楽しく取り組むことができた。今まで習ってきたことが少しずつ繋がってきたように思う。今回vanilla cssで久しぶりに書いたが、やっぱりcssは難しい。
- [参考記事]
  - 1. ラジオボタンやチェックボックスの値の取得・出力[https://blanche-toile.com/web/php-form-radio-checkbox] [https://qiita.com/kunrenyouAcount/items/1c66ccee97c33f320fb2]
  - 2. Chart.js[https://www.chartjs.org/docs/latest/]
  - 3. explode[https://staff.persol-xtech.co.jp/hatalabo/it_engineer/468.html#_3-1-1] [https://x.gd/bzd4g]
  - 4. 連想配列[https://webukatu.com/wordpress/blog/13669/#KeyValue]