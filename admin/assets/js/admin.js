document.addEventListener('DOMContentLoaded', function () {
    document.body.classList.add('page-loaded');

    const forms = document.querySelectorAll('form');
    const inputs = document.querySelectorAll('.form-group input');

    inputs.forEach((input) => {
        input.addEventListener('blur', function () {
            validateField(input);
        });

        input.addEventListener('input', function () {
            if (input.classList.contains('input-error')) {
                validateField(input);
            }
        });
    });

    document.querySelectorAll('input[type="password"]').forEach((input) => {
        const wrapper = document.createElement('div');
        wrapper.className = 'password-wrap';

        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);

        const toggle = document.createElement('button');
        toggle.type = 'button';
        toggle.className = 'password-toggle';
        toggle.setAttribute('aria-label', 'Show password');
        toggle.innerHTML = '👁';

        toggle.addEventListener('click', function () {
            const isPassword = input.getAttribute('type') === 'password';
            input.setAttribute('type', isPassword ? 'text' : 'password');
            toggle.innerHTML = isPassword ? '🙈' : '👁';
        });

        wrapper.appendChild(toggle);
    });

    forms.forEach((form) => {
        form.addEventListener('submit', function (e) {
            let firstInvalid = null;
            const currentInputs = form.querySelectorAll('input[required]');

            currentInputs.forEach((input) => {
                const valid = validateField(input);
                if (!valid && !firstInvalid) {
                    firstInvalid = input;
                }
            });

            const password = form.querySelector('input[name="password"]');
            const confirmPassword = form.querySelector('input[name="confirm_password"]');

            if (password && confirmPassword) {
                if (password.value.trim() !== '' && confirmPassword.value.trim() !== '' && password.value !== confirmPassword.value) {
                    setError(confirmPassword);
                    if (!firstInvalid) firstInvalid = confirmPassword;
                }
            }

            if (firstInvalid) {
                e.preventDefault();
                const card = document.querySelector('.login-container, .register-container');
                if (card) {
                    card.classList.remove('shake');
                    void card.offsetWidth;
                    card.classList.add('shake');
                }
                firstInvalid.focus();
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.dataset.originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = 'Please wait...';
            }
        });
    });

    function validateField(input) {
        const type = input.getAttribute('type');
        const name = input.getAttribute('name');
        const value = input.value.trim();

        if (input.hasAttribute('required') && value === '') {
            setError(input);
            return false;
        }

        if (type === 'email') {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(value)) {
                setError(input);
                return false;
            }
        }

        if (name === 'password' && value !== '' && value.length < 6) {
            setError(input);
            return false;
        }

        clearError(input);
        return true;
    }

    function setError(input) {
        input.classList.remove('input-valid');
        input.classList.add('input-error');
    }

    function clearError(input) {
        input.classList.remove('input-error');
        if (input.value.trim() !== '') {
            input.classList.add('input-valid');
        } else {
            input.classList.remove('input-valid');
        }
    }
});