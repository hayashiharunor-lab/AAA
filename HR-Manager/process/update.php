<?php

require_once "../config/database.php";

// POSTデータ取得
$id             = $_POST['id'] ?? null;
$name           = $_POST['name'] ?? '';
$furigana       = $_POST['furigana'] ?? '';
$gender         = $_POST['gender'] ?? '';
$job            = $_POST['job'] ?? '';
$japanese_level = $_POST['japanese_level'] ?? '';
$location       = $_POST['location'] ?? '';

if (!$id) {
    die("IDがありません");
}

// UPDATE
$sql = "
    UPDATE students
    SET
        name = :name,
        furigana = :furigana,
        gender = :gender,
        job = :job,
        japanese_level = :japanese_level,
        location = :location
    WHERE id = :id
";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id'             => $id,
    ':name'           => $name,
    ':furigana'       => $furigana,
    ':gender'         => $gender,
    ':job'            => $job,
    ':japanese_level' => $japanese_level,
    ':location'       => $location
]);

// 戻る
header("Location: ../modules/students/list.php");
exit;