<?php

require_once "../config/database.php";

if (!isset($_GET['id'])) {
    exit("IDがありません");
}

$id = (int)$_GET['id'];

$sql = "DELETE FROM students WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

header("Location: ../modules/students/list.php");
exit;