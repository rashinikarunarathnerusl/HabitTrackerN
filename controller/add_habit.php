<?php
session_start();
require_once 'db_connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo json_encode(['success' => false, 'error' => 'Not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['habit_text'])) {
    $user_id = $_SESSION['user_id'];
    $habit_text = trim($_POST['habit_text']);
    
    if (empty($habit_text)) {
        echo json_encode(['success' => false, 'error' => 'Habit text cannot be empty']);
        exit();
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO habits (user_id, habit_text) VALUES (?, ?)");
        $stmt->execute([$user_id, $habit_text]);
        $habit_id = $pdo->lastInsertId();
        echo json_encode(['success' => true, 'habit_id' => $habit_id]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>