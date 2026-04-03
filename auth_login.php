<?php
header('Content-Type: application/json');
require_once 'db_config.php'; // Ensure this file exists with your PDO connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (empty($user) || empty($pass)) {
        echo json_encode(['success' => false, 'message' => 'Please fill all fields.']);
        exit;
    }

    try {
        // 1. Prepare SQL to find user
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$user]);
        $userData = $stmt->fetch();

        // 2. Verify existence and password
        // In professional apps, use password_verify($pass, $userData['password'])
        // For your current setup where you inserted plain text:
        if ($userData && $pass === $userData['password']) {
            
            // Start session and store user info
            session_start();
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>