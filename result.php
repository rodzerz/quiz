<?php
session_start();
require_once 'db.php';

$user_id = $_SESSION['user_id'] ?? 1; // aizstāj ar reālu pieslēgušos lietotāju
$test_id = $_SESSION['test_id'];
$questions = $_SESSION['questions'];
$answers = $_POST['answers'] ?? [];

$correct = 0;

foreach ($questions as $q) {
    $qid = $q['id'];
    $user_answer = $answers[$qid] ?? 0;
    
    $sql = "SELECT is_correct FROM answers WHERE id = $user_answer";
    $res = $conn->query($sql);
    if ($res && $res->fetch_assoc()['is_correct']) {
        $correct++;
    }
}

// Rezultāta ieraksts
$total = count($questions);
$stmt = $conn->prepare("INSERT INTO results (user_id, test_id, correct_answers, total_questions) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiii", $user_id, $test_id, $correct, $total);
$stmt->execute();

echo "<h2>Tu atbildēji pareizi uz $correct no $total jautājumiem.</h2>";
