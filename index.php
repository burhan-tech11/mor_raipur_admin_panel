<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mor Raipur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="main-wrapper">
        <div class="login-card-container">
            <!-- Left Side: Solid blue panel -->
            <div class="brand-panel">
                <img 
                    src="mr_bg.jpg" 
                    alt="Mor Raipur" 
                    class="brand-image"
                    onerror="this.src='https://via.placeholder.com/220?text=Mor+Raipur'"
                >
            </div>

            <!-- Right Side: Form panel -->
            <div class="form-panel">
                <div class="form-header">
                    <h2 class="title">Welcome back to Admin Panel</h2>
                    <p class="subtitle">Enter the credentials to access the portal</p>
                </div>

                <div id="error-message" class="error-toast">
                    Invalid credentials.
                </div>

                <form id="loginForm" class="login-form">
                    <div class="input-group">
                        <label class="input-label">USERNAME</label>
                        <input type="text" id="username" required placeholder="Enter username" class="custom-input">
                    </div>

                    <div class="input-group">
                        <label class="input-label">PASSWORD</label>
                        <input type="password" id="password" required placeholder="••••••••" class="custom-input">
                    </div>

                    <!-- Captcha Section -->
                    <div class="input-group">
                        <label class="input-label">VERIFICATION</label>
                        <div class="captcha-row">
                            <div id="captcha-display" class="captcha-box">Loading...</div>
                            <button type="button" id="refresh-captcha" class="refresh-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path><path d="M21 3v5h-5"></path><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path><path d="M8 16H3v5"></path></svg>
                            </button>
                        </div>
                        <input type="text" id="captcha-input" required placeholder="Enter code" class="custom-input mt-2">
                    </div>

                    <div class="form-footer">
                        <label class="remember-me">
                            <input type="checkbox" id="remember">
                            <span>Remember me</span>
                        </label>
                    </div>

                    <div class="action-area">
                        <button type="submit" id="submitBtn" class="login-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="index.js"></script>
</body>
</html>