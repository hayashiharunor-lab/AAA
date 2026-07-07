<?php

require_once "../../config/database.php";

$keyword = $_GET['keyword'] ?? '';
$gender  = $_GET['gender'] ?? '';
$job     = $_GET['job'] ?? '';
$japanese_level = $_GET['japanese_level'] ?? '';

$page = max(1, isset($_GET['page']) ? (int)$_GET['page'] : 1);
$limit = 10;
$offset = ($page - 1) * $limit;

$sql = "
    SELECT * FROM students
    WHERE (name LIKE :keyword OR furigana LIKE :keyword)
";

$params = [
    ':keyword' => "%$keyword%"
];

if ($gender != '') {
    $sql .= " AND gender = :gender";
    $params[':gender'] = $gender;
}

if ($job != '') {
    $sql .= " AND job LIKE :job";
    $params[':job'] = "%$job%";
}

if ($japanese_level != '') {
    $sql .= " AND japanese_level = :japanese_level";
    $params[':japanese_level'] = $japanese_level;
}

$sql .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);

foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}

$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

$countSql = "
    SELECT COUNT(*) FROM students
    WHERE (name LIKE :keyword OR furigana LIKE :keyword)
";

$countParams = [
    ':keyword' => "%$keyword%"
];

if ($gender != '') {
    $countSql .= " AND gender = :gender";
    $countParams[':gender'] = $gender;
}

if ($job != '') {
    $countSql .= " AND job LIKE :job";
    $countParams[':job'] = "%$job%";
}

if ($japanese_level != '') {
    $countSql .= " AND japanese_level = :japanese_level";
    $countParams[':japanese_level'] = $japanese_level;
}

$countStmt = $pdo->prepare($countSql);
$countStmt->execute($countParams);

$totalStudents = $countStmt->fetchColumn();

$totalPages = ceil($totalStudents / $limit);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>生徒一覧</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

<h1>👥 生徒一覧</h1>

<form method="GET" action="list.php">

    <!-- 名前検索 -->
    <input type="text" name="keyword"
           value="<?= htmlspecialchars($keyword) ?>"
           placeholder="名前で検索"><br><br>

    <!-- 性別フィルター -->
    <select name="gender">
        <option value="">性別（全て）</option>
        <option value="男性" <?= $gender == "男性" ? "selected" : "" ?>>男性</option>
        <option value="女性" <?= $gender == "女性" ? "selected" : "" ?>>女性</option>
    </select><br><br>

    <!-- 職種フィルター -->
    <input type="text" name="job"
           value="<?= htmlspecialchars($job) ?>"
           placeholder="職種で検索"><br><br>

    <!-- 日本語レベル -->
    <select name="japanese_level">
        <option value="">日本語レベル（全て）</option>
        <option value="N5" <?= $japanese_level == "N5" ? "selected" : "" ?>>N5</option>
        <option value="N4" <?= $japanese_level == "N4" ? "selected" : "" ?>>N4</option>
        <option value="N3" <?= $japanese_level == "N3" ? "selected" : "" ?>>N3</option>
        <option value="N2" <?= $japanese_level == "N2" ? "selected" : "" ?>>N2</option>
        <option value="N1" <?= $japanese_level == "N1" ? "selected" : "" ?>>N1</option>
    </select><br><br>

<!-- 検索ボタン -->
<button type="submit">検索</button>

</form>

<p>検索結果：<?= $totalStudents ?> 件</p>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>氏名</th>
    <th>フリガナ</th>
    <th>性別</th>
    <th>日本語</th>
    <th>所属場所</th>
    <th>操作</th>
</tr>

<?php foreach($students as $student): ?>

<tr>
    <td><?= $student["id"] ?></td>
    <td><?= htmlspecialchars($student["name"]) ?></td>
    <td><?= htmlspecialchars($student["furigana"]) ?></td>
    <td><?= htmlspecialchars($student["gender"]) ?></td>
    <td><?= htmlspecialchars($student["japanese_level"]) ?></td>
    <td><?= htmlspecialchars($student["location"]) ?></td>

    <td>
        <a href="edit.php?id=<?= $student['id'] ?>">
        ✏️ 編集
        </a>  
        <a href="../../process/delete_student.php?id=<?= $student['id'] ?>" style="color:red; font-weight:bold;">
    ★削除テスト
</a>
        </a>
    </td>
</tr>

<?php endforeach; ?>

</table>

<div style="margin-top:20px;">

<?php for ($i = 1; $i <= $totalPages; $i++): ?>

<a href="?page=<?= $i ?>&keyword=<?= urlencode($keyword) ?>&gender=<?= urlencode($gender) ?>&job=<?= urlencode($job) ?>&japanese_level=<?= urlencode($japanese_level) ?>">
    <?= $i ?>
</a>

<?php endfor; ?>

</div>

<br>

<a href="index.php">← 生徒管理メニューへ戻る</a>

</body>
</html>