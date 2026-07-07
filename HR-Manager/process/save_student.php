<?php

require_once "../config/database.php";

$sql = "INSERT INTO students
(name, furigana, gender, birth_date, phone, email, address, job, japanese_level, location, remarks)
VALUES
(:name, :furigana, :gender, :birth_date, :phone, :email, :address, :job, :japanese_level, :location, :remarks)";

$stmt = $pdo->prepare($sql);

$stmt->execute([

    ':name' => $_POST['name'],
    ':furigana' => $_POST['furigana'],
    ':gender' => $_POST['gender'],
    ':birth_date' => $_POST['birth_date'],
    ':phone' => $_POST['phone'],
    ':email' => $_POST['email'],
    ':address' => $_POST['address'],
    ':job' => $_POST['job'],
    ':japanese_level' => $_POST['japanese_level'],
    ':location' => $_POST['location'],
    ':remarks' => $_POST['remarks']

]);

echo "<h2>登録が完了しました！🎉</h2>";

echo '<a href="../pages/register.php">続けて登録する</a><br><br>';

echo '<a href="../pages/menu.php">メニューへ戻る</a>';