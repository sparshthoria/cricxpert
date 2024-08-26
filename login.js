document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('login-form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const emailInput = document.getElementById('emailInput');
        const emailValue = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!emailRegex.test(emailValue)) {
            alert('Please enter a valid email address.');
            return;
        }

        const passwordInput = document.getElementById('passwordInput');
        const passwordValue = passwordInput.value.trim();
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
        
        if (!passwordRegex.test(passwordValue)) {
            alert('Password must be at least 8 characters long and contain at least one uppercase letter, one digit, and one special character.');
            return;
        }

        window.location.href = './CricXpert.html';
    });
});
