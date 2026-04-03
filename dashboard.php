<?php
session_start();

// Security check: Redirect to index.html if user hasn't signed in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Mor Raipur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-2xl shadow-lg text-center max-w-sm w-full">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-600 mb-6">Welcome back, <span class="text-blue-600 font-semibold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</p>
        
        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6 font-medium">
            Login Successful!
        </div>
        
        <div class="border-t pt-6">
            <a href="index.html" class="text-sm text-gray-400 hover:text-blue-600 transition">Return to Login</a>
        </div>
    </div>
</body>
</html>