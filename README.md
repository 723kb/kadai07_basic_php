# ①課題番号-プロダクト名

kadai07_basic_php 

## ②課題内容（どんな作品か）

- PHPを使ってアンケートフォームのデータを取得することができるアプリ。
- 取得したデータは表形式で表示＆Chart.jsによってグラフ化。
- レスポンシブ非対応。

## ③DEMO

http://723kb.sakura.ne.jp/kadai07_basic_php/

## ④作ったアプリケーション用のIDまたはPasswordがある場合

- ID: 今回はなし
- PW: 今回はなし

## ⑤工夫した点・こだわった点

- 様々なinput typeからデータを取得できるようにした。
- データ送信前に確認画面が表示されるようにし、修正したい場合は入力した内容を保持したまま前のページに戻ることができるように操作性を意識した。
- 取得したデータは表とグラフの2パターンで表示した。名前やEmailはあえて「非表示」と表示されるようにした。円グラフと棒グラフの2パターンを作成した。

## ⑥難しかった点・次回トライしたいこと(又は機能)

- 取得したデータをどう活用するかが難しいと思った。
- データを一つずつ表のセルに入れていく部分やグラフにデータを渡す部分など、取得したデータを処理する部分が難しかった。
- formのtextareaで改行があった場合、nl2brにすると確認画面の表示は改行が反映され意図した挙動になったが、データを取得し表として表示させる部分でセル内で改行タグが認識され勝手に改行されてしまった…。セル内での改行ができず、改行タグを空文字に置換することで対応した。→結局空文字を改行タグに、改行タグを\nに変換していけばセル内改行ができるようになった！
- グラフの細かな設定（棒グラフの横グリッド線が消えた、％表示できない）が思うようにできなかった。この部分に関してはjsの範疇なので復習が必要。

## ⑦質問・疑問・感想、シェアしたいこと等なんでも

- [感想]jsでやってきた配列のことなどが活かせ、楽しく取り組むことができた。今まで習ってきたことが少しずつ繋がってきたように思う。今回vanilla cssで久しぶりに書いたが、やっぱりcssは難しい。
- [参考記事]
  - 1. ラジオボタンやチェックボックスの値の取得・出力[https://x.gd/nF1KY] [https://x.gd/6SnZv]
  - 2. Chart.js[https://www.chartjs.org/docs/latest/]
  - 3. explode[https://x.gd/NyXZi] [https://x.gd/bzd4g]
  - 4. 連想配列[https://x.gd/o6jQ5]
  - 5. 改行の処理[https://x.gd/Rd5HV] [https://x.gd/G1RSN]