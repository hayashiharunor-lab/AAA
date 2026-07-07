<?php

require_once "../config/database.php";

// フォームから受け取る
$name            = $_POST['name'] ?? '';
$furigana        = $_POST['furigana'] ?? '';
$gender          = $_POST['gender'] ?? '';
$birth_date      = $_POST['birth_date'] ?? '';
$phone           = $_POST['phone'] ?? '';
$email           = $_POST['email'] ?? '';
$address         = $_POST['address'] ?? '';
$job             = $_POST['job'] ?? '';
$japanese_level  = $_POST['japanese_level'] ?? '';
$location        = $_POST['location'] ?? '';
$remarks         = $_POST['remarks'] ?? '';

// バリデーション（最低限）
if ($name == '') {
    die("名前は必須です");
}

// SQL
$sql = "
INSERT INTO students
(
    name,
    furigana,
    gender,
    birth_date,
    phone,
    email,
    address,
    job,
    japanese_level,
    location,
    remarks
)
VALUES
(
    :name,
    :furigana,
    :gender,
    :birth_date,
    :phone,
    :email,
    :address,
    :job,
    :japanese_level,
    :location,
    :remarks
)
";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':name'             => $name,
    ':furigana'         => $furigana,
    ':gender'           => $gender,
    ':birth_date'       => $birth_date,
    ':phone'            => $phone,
    ':email'            => $email,
    ':address'          => $address,
    ':job'              => $job,
    ':japanese_level'   => $japanese_level,
    ':location'         => $location,
    ':remarks'          => $remarks
]);

// 登録後リダイレクト
header("Location: ../modules/students/list.php");
exit;
?>