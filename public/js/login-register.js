const form = document.querySelector('form');
const emailField = form.querySelector('.email-field');
const emailInput = emailField.querySelector('.email');
const passField = form.querySelector('.create-password');
const passInput = passField.querySelector('.password');
const showHideIcons = passField.querySelectorAll('.show-hide');

showHideIcons.forEach((showHideIcon) => {
    showHideIcon.addEventListener('click', () => {
        const passwordInput = showHideIcon.parentElement.querySelector('.password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showHideIcon.classList.replace('bx-hide', 'bx-show');
        } else {
            passwordInput.type = 'password';
            showHideIcon.classList.replace('bx-show', 'bx-hide');
        }
    });
});


emailInput.addEventListener('input', checkEmail);
passInput.addEventListener('input', createPass);
cPassInput.addEventListener('input', confirmPass);

function checkEmail() {
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailInput.value.match(emailPattern)) {
        emailField.classList.add('invalid');
    } else {
        emailField.classList.remove('invalid');
    }
}

function createPass() {
    const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!passInput.value.match(passPattern)) {
        passField.classList.add('invalid');
    } else {
        passField.classList.remove('invalid');
    }
}

function confirmPass() {
    if (passInput.value !== cPassInput.value || cPassInput.value === '') {
        cPassField.classList.add('invalid');
    } else {
        cPassField.classList.remove('invalid');
    }
}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    checkEmail();
    createPass();
    confirmPass();

    if (!emailField.classList.contains('invalid') && 
        !passField.classList.contains('invalid') && 
        !cPassField.classList.contains('invalid')) {
        location.href = form.getAttribute('action');
    }
});
