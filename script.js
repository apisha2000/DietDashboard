document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const showLoginBtn = document.getElementById('show-login');
    const showSignupBtn = document.getElementById('show-signup');

    // Function to show login form and hide signup form
    function showLogin() {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
    }

    // Function to show signup form and hide login form
    function showSignup() {
        signupForm.style.display = 'block';
        loginForm.style.display = 'none';
    }

    // Event listeners for the buttons
    showLoginBtn.addEventListener('click', showLogin);
    showSignupBtn.addEventListener('click', showSignup);

    // Initially show login form
    showLogin();
});
