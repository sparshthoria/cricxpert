document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('signup-form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const firstNameInput = document.getElementById('first-name');
        const firstNameValue = firstNameInput.value.trim();
        const firstNameRegex = /^[A-Za-z]+$/;
        
        if (!firstNameRegex.test(firstNameValue)) {
            alert('Please enter a valid first name.');
            return;
        }

        const lastNameInput = document.getElementById('last-name');
        const lastNameValue = lastNameInput.value.trim();
        const lastNameRegex = /^[A-Za-z]+$/;
        
        if (!lastNameRegex.test(lastNameValue)) {
            alert('Please enter a valid last name.');
            return;
        }

        const emailInput = document.getElementById('email');
        const emailValue = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!emailRegex.test(emailValue)) {
            alert('Please enter a valid email address.');
            return;
        }

        const passwordInput = document.getElementById('password');
        const passwordValue = passwordInput.value.trim();
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
        
        if (!passwordRegex.test(passwordValue)) {
            alert('Password must be at least 8 characters long and contain at least one uppercase letter, one digit, and one special character.');
            return;
        }

        window.location.href = './CricXpert.html';
    });
});
