<?php
require_once "../../config/database.php";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
</head>

<body>

<h1>👤 生徒 新規登録</h1>

<form method="POST" action="../../process/store_create.php">

    <!-- 名前 -->
    <p>
        名前：<br>
        <input type="text" name="name" required>
    </p>

    <!-- フリガナ -->
    <p>
        フリガナ：<br>
        <input type="text" name="furigana">
    </p>

    <!-- 性別 -->
    <p>
        性別：<br>
        <select name="gender">
            <option value="男性">男性</option>
            <option value="女性">女性</option>
        </select>
    </p>

    <!-- 生年月日 -->
<p>
    生年月日：<br>
    <input type="date" name="birth_date">
</p>

<p>
    電話番号：<br>
    <input type="text" name="phone">
</p>

<p>
    メールアドレス：<br>
    <input type="email" name="email">
</p>

<p>
    住所：<br>
    <input type="text" name="address">
</p>

    <!-- 職種 -->
    <p>
        職種：<br>
        <input type="text" name="job">
    </p>

    <!-- 日本語レベル -->
    <p>
        日本語レベル：<br>
        <select name="japanese_level">
            <option value="N5">N5</option>
            <option value="N4">N4</option>
            <option value="N3">N3</option>
            <option value="N2">N2</option>
            <option value="N1">N1</option>
        </select>
    </p>

<p>
    所属場所：<br>
    <input type="text" name="location">
</p>

    <p>
    備考：<br>
    <textarea name="remarks" rows="5" cols="40"></textarea>
</p>

    <button type="submit">登録する</button>

</form>

<br>

<a href="list.php">← 一覧へ戻る</a>

</body>
</html>