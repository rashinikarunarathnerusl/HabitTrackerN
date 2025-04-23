<?php
session_start();
require_once 'db_connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged آبین']) {
    echo json_encode(['success' => false, 'error' => 'Not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['habit_id'])) {
    $user_id = $_SESSION['user_id'];
    $habit_id = (int)$_POST['habit_id'];
    
    try {
        // Ensure the habit belongs to the user
        $stmt = $pdo->prepare("DELETE FROM habits WHERE id = ? AND user_id = ?");
        $stmt->execute([$habit_id, $user_id]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Habit not found or not owned by user']);
        }
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>