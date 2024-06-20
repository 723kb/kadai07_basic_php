<html>

<head>
    <meta charset="utf-8">
    <title>日常の移動手段に関するアンケート - 入力画面</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- ファビコン -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- アイコン -->
    <link rel="apple-touch-icon" href="img/apple-touch-icon-180x180.png" sizes="180x180">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>日常の移動手段に関するアンケート</h1>
            <form action="confirm.php" method="post" class="form">
                <h2>基本情報</h2>
                <!-- Q 名前 -->
                <div class="q_box">
                    <label for="name">お名前 <span class="add_text">(ニックネーム可)</span> <span class="any">任意</span> </label>
                    <input type="text" name="name" id="name" placeholder="山田 太郎">
                </div>
                <!-- Q Email -->
                <div class="q_box">
                    <label for="email">Email <span class="any">任意</span> </label>
                    <input type="email" name="email" id="email" placeholder="test@test.com">
                </div>
                <!-- Q 性別 -->
                <div class="q_box">
                    <label for="gender">性別 <span class="required">必須</span> </label>
                    <span>
                        <input type="radio" name="gender" id="gender1" value="男性" required><label for="gender1">男性</label>
                        <input type="radio" name="gender" id="gender2" value="女性" required><label for="gender2">女性</label>
                    </span>
                </div>
                <!-- Q 年齢 -->
                <div class="q_box">
                    <label for="age" class="label_title">年齢 <span class="required">必須</span> </label>
                    <select name="age" id="age" required>
                        <option value="" disabled selected>選択してください</option>
                        <option value="10代">10代</option>
                        <option value="20代">20代</option>
                        <option value="30代">30代</option>
                        <option value="40代">40代</option>
                        <option value="50代">50代</option>
                        <option value="60代以上">60代以上</option>
                    </select>
                </div>
                <!-- Q 居住地 -->
                <div class="q_box">
                    <label for="address">居住地 <span class="required">必須</span> </label>
                    <select name="address" id="address" required>
                        <option value="" disabled selected>選択してください</option>
                        <optgroup label="北海道地方">
                            <option value="北海道">北海道</option>
                        </optgroup>
                        <optgroup label="東北地方">
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                        </optgroup>
                        <optgroup label="関東地方">
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                        </optgroup>
                        <optgroup label="中部地方">
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="岐阜県">岐阜県</option>
                        </optgroup>
                        <optgroup label="近畿地方">
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                        </optgroup>
                        <optgroup label="中国地方">
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                        </optgroup>
                        <optgroup label="四国地方">
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="高知県">高知県</option>
                        </optgroup>
                        <optgroup label="九州地方">
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </optgroup>
                    </select>
                </div>
                <h2>家族構成</h2>
                <!-- Q 婚姻ステータス -->
                <div class="q_box">
                    <label for="marriage">婚姻ステータス <span class="required">必須</span> </label>
                    <span>
                        <input type="radio" name="marriage" id="marriage1" value="未婚" required><label for="marriage1">未婚</label>
                        <input type="radio" name="marriage" id="marriage2" value="既婚（離死別含む）" required><label for="marriage2">既婚（離死別含む）</label>
                    </span>
                </div>
                <!-- Q 子どもの有無 -->
                <div class="q_box">
                    <label for="children">お子様の有無 <span class="required">必須</span> </label>
                    <span>
                        <input type="radio" name="children" id="children1" value="あり" required><label for="children1">あり</label>
                        <input type="radio" name="children" id="children2" value="なし" required><label for="children2">なし</label>
                    </span>
                </div>
                <!-- Q 子どもの年齢 -->
                <div class="q_box">
                    <label for="childsAge">お子様の年齢（複数選択可） <span class="any">任意</span> </label>
                    <select multiple name="childsAge" id="childsAge">
                        <option value="" disabled selected>選択してください</option>
                        <option value="子どもはいない">子どもはいない</option>
                        <option value="小学校入学前">小学校入学前</option>
                        <option value="小学生">小学生</option>
                        <option value="中学生">中学生</option>
                        <option value="高校生">高校生</option>
                        <option value="大学生">大学生</option>
                        <option value="社会人">社会人</option>
                    </select>
                </div>
                <h2>移動状況</h2>
                <!-- Q 普段の移動手段 -->
                <div class="q_box">
                    <label for="transportation">普段の移動手段（複数選択可） <span class="required">必須</span> </label>
                    <span>
                        <input type="checkbox" name="transportation[]" value="自家用車" id="自家用車"><label for="自家用車">自家用車
                        </label><br>
                        <input type="checkbox" name="transportation[]" value="電車" id="電車"><label for="電車">電車
                        </label><br>
                        <input type="checkbox" name="transportation[]" value="バス" id="バス"><label for="バス">バス
                        </label><br>
                        <input type="checkbox" name="transportation[]" value="自転車" id="自転車"><label for="自転車">自転車
                        </label><br>
                        <input type="checkbox" name="transportation[]" value="徒歩" id="徒歩"><label for="徒歩">徒歩
                        </label><br>
                    </span>
                    <p id="transportationError" style="color: red; display: none;">最低1つは選択してください</p>
                </div>
                <!-- Q 困っていること -->
                <div class="q_box">
                    <label for="problems">普段の移動で困りごとはありますか？ <span class="required">必須</span> </label>
                    <div>
                        ない (0%) <input type="range" name="problems" id="problems" min="0" max="100" value="0">(100%) ある
                        <div>現在の値は<span id="current-value"></span>%です</div>
                    </div>
                </div>
                <!-- Q 困っている内容 -->
                <div class="q_box">
                    <label for="story">困りごとがある方は、どんなことに困っていますか？ <span class="any">任意</span> </label>
                    <textarea name="story" id="story" rows="5" cols="33" placeholder="例)階段や坂の移動が大変です&#10;例)雨の日の移動がつらい"></textarea>
                </div>
                <div class="btn_area">
                    <input type="submit" class="confirm_btn" value="確認する">
                </div>
            </form>
        </div>
        <footer>
            <p>2024©なっちゃん</p>
        </footer>
    </div>

    <script>
        // rangeの現在地を取得する処理
        const inputElem = document.getElementById('problems');
        // 埋め込む先の要素
        const currentValueElem = document.getElementById('current-value');
        // 現在の値を埋め込む関数
        const setCurrentValue = (val) => {
            currentValueElem.innerText = val;
        }
        // inputイベント時に値をセットする関数
        const rangeOnChange = (e) => {
            setCurrentValue(e.target.value);
        }
        window.onload = () => {
            // 変更に合わせてイベントを発火する
            inputElem.addEventListener('input', rangeOnChange);
            // ページ読み込み時の値をセット
            setCurrentValue(inputElem.value);
        }

        // チェックボックスに未入力があったときのバリデーション
        const form = document.querySelector('.form'); // フォーム要素を取得
        form.addEventListener('submit', function(event) {
            const checkboxes = document.querySelectorAll('input[name="transportation[]"]');
            let checked = false;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checked = true;
                }
            });

            if (!checked) {
                event.preventDefault(); // フォーム送信をキャンセル
                document.getElementById('transportationError').style.display = 'block'; // エラーメッセージ表示
            }
        });
    </script>
</body>

</html>