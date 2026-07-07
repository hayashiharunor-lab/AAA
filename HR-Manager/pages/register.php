<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>人材登録</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<h1>人材登録</h1>

<form action="../process/save_student.php" method="post">

<label>氏名</label><br>
<input type="text" name="name"><br><br>

<label>フリガナ</label><br>
<input type="text" name="furigana"><br><br>

<label>性別</label><br>
<select name="gender">
    <option value="">選択してください</option>
    <option value="男性">男性</option>
    <option value="女性">女性</option>
</select><br><br>

<label>生年月日</label><br>
<input type="date" name="birth_date"><br><br>

<label>電話番号</label><br>
<input type="text" name="phone"><br><br>

<label>メールアドレス</label><br>
<input type="email" name="email"><br><br>

<label>住所</label><br>
<input type="text" name="address"><br><br>

<label>希望職種</label><br>
<input type="text" name="job"><br><br>

<label>日本語レベル</label><br>
<select name="japanese_level">
    <option value="">選択してください</option>
    <option value="N5">N5</option>
    <option value="N4">N4</option>
    <option value="N3">N3</option>
    <option value="N2">N2</option>
    <option value="N1">N1</option>
</select><br><br>

<label>所属場所</label><br>
<input type="text" name="location"><br><br>

<label>備考</label><br>
<textarea name="remarks" rows="5" cols="40"></textarea><br><br>

<button type="submit">登録</button>

</form>

<p><a href="menu.php">← メニューへ戻る</a></p>

</body>

</html>