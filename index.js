document.addEventListener('DOMContentLoaded', () => {

    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');
    const errorMessage = document.getElementById('error-message');
    const captchaDisplay = document.getElementById('captcha-display');
    const captchaInput = document.getElementById('captcha-input');
    const refreshBtn = document.getElementById('refresh-captcha');

    let currentCaptcha = "";

    // 🔐 Generate Captcha
    const generateCaptcha = () => {
        const chars = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
        let result = "";
        for (let i = 0; i < 6; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        currentCaptcha = result;
        if (captchaDisplay) captchaDisplay.innerText = currentCaptcha;
    };

    generateCaptcha();

    // 🔄 Refresh Captcha
    if (refreshBtn) {
        refreshBtn.addEventListener('click', () => {
            generateCaptcha();
            if (captchaInput) captchaInput.value = "";
        });
    }

    // 🟢 Login Submit
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const usernameValue = document.getElementById('username').value;
        const passwordValue = document.getElementById('password').value;
        const userCaptcha = captchaInput ? captchaInput.value.trim().toUpperCase() : "";

        // 1️⃣ Captcha Validation
        if (captchaInput && userCaptcha !== currentCaptcha) {
            showError("Invalid verification code.");
            generateCaptcha();
            captchaInput.value = "";
            return;
        }

        // 2️⃣ Loading UI
        setLoading(true);

        try {

            const formData = new FormData();
            formData.append('username', usernameValue);
            formData.append('password', passwordValue);

            const response = await fetch('auth_login.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {

                // ✅ Redirect to SESSION PROTECTED DASHBOARD
                window.location.href = 'main.php';

            } else {

                setLoading(false);
                showError(result.message || "Invalid username or password.");
                generateCaptcha();
                if (captchaInput) captchaInput.value = '';
                document.getElementById('password').value = '';
            }

        } catch (error) {

            setLoading(false);
            showError("Server error. Please check your connection.");
            console.error("Auth Error:", error);
        }
    });

    // ❌ Error Message + Shake Effect
    function showError(msg) {
        errorMessage.innerText = msg;
        errorMessage.style.display = 'block';

        loginForm.style.transition = 'transform 0.1s';
        loginForm.style.transform = 'translateX(8px)';
        setTimeout(() => loginForm.style.transform = 'translateX(-8px)', 100);
        setTimeout(() => loginForm.style.transform = 'translateX(0)', 200);
    }

    // ⏳ Loading Button
    function setLoading(isLoading) {
        if (isLoading) {
            submitBtn.innerText = 'Verifying...';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
            errorMessage.style.display = 'none';
        } else {
            submitBtn.innerText = 'Login';
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
        }
    }

});