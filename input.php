<html>

<head>
    <meta charset="utf-8">
    <title>課題テンプレート</title>
</head>

<body>
    <form action="confirm.php" method="get">
        お名前 : <input type="text" name="name" placeholder="お名前">
        Email : <input type="email" name="email" placeholder="Email">
        <p>性別 :
            <label><input type="radio" name="gender" value="男性">男性</label>／
            <label><input type="radio" name="gender" value="女性">女性</label>
        </p>
        <p>年齢 :
            <select name="age">
            <option disabled selected>選択してください</option>
                <option value="10代">10代</option>
                <option value="20代">20代</option>
                <option value="30代">30代</option>
                <option value="40代">40代</option>
                <option value="50代">50代</option>
                <option value="60代以上">60代以上</option>
            </select>
        </p>
        <p>普段の移動手段（複数選択可）</p>
        <p>
            <label><input type="checkbox" name="transportation[]" value="自家用車">自家用車</label><br>
            <label><input type="checkbox" name="transportation[]" value="電車">電車</label><br>
            <label><input type="checkbox" name="transportation[]" value="バス">バス</label><br>
            <label><input type="checkbox" name="transportation[]" value="自転車">自転車</label><br>
            <label><input type="checkbox" name="transportation[]" value="徒歩">徒歩</label><br>
        </p>
        <input type="submit" value="確認する">
    </form>

</body>

</html>