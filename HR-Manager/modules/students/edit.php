<?php
require_once "../../config/database.php";

// ID取得
$id = $_GET['id'] ?? null;

if (!$id) {
    die("IDが指定されていません");
}

// データ取得
$sql = "SELECT * FROM students WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("データが見つかりません");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集</title>
</head>

<body>

<h1>✏️ 生徒編集</h1>

<form method="POST" action="../../process/update.php">

    <input type="hidden" name="id" value="<?= $student['id'] ?>">

    <!-- 名前 -->
    <p>
        名前：<br>
        <input type="text" name="name"
               value="<?= htmlspecialchars($student['name']) ?>" required>
    </p>

    <!-- フリガナ -->
    <p>
        フリガナ：<br>
        <input type="text" name="furigana"
               value="<?= htmlspecialchars($student['furigana']) ?>">
    </p>

    <!-- 性別 -->
    <p>
        性別：<br>
        <select name="gender">
            <option value="男性" <?= $student['gender']=="男性" ? "selected" : "" ?>>男性</option>
            <option value="女性" <?= $student['gender']=="女性" ? "selected" : "" ?>>女性</option>
        </select>
    </p>

    <!-- 職種 -->
    <p>
        職種：<br>
        <input type="text" name="job"
               value="<?= htmlspecialchars($student['job']) ?>">
    </p>

    <!-- 日本語レベル -->
    <p>
        日本語レベル：<br>
        <select name="japanese_level">
            <?php
            $levels = ["N5","N4","N3","N2","N1"];
            foreach ($levels as $level):
            ?>
                <option value="<?= $level ?>"
                    <?= $student['japanese_level']==$level ? "selected" : "" ?>>
                    <?= $level ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <!-- 所属 -->
    <p>
        所属場所：<br>
        <input type="text" name="location"
               value="<?= htmlspecialchars($student['location']) ?>">
    </p>

    <button type="submit">更新する</button>

</form>

<br>

<a href="list.php">← 一覧へ戻る</a>

</body>
</html>