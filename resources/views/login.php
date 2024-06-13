
<?php ob_start(); ?>

<section id="login" class="init login-form fade fade-right">
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <input type="text" name="email" class="form-input" placeholder="Email">
            <input type="password" name="password" class="form-input mb-4" placeholder="Senha">
            <label>
                <input type="checkbox" name="remember">
                Lembrar-me
            </label>
            <button type="button" class="btn-login" onclick="login()">Login</button>
            <a href="register">Cadastrar-se</a>
        </div>
    </div>
</section>

<script>
    const login = () => {
        const email = document.querySelector('input[name="email"]').value;
        const password = document.querySelector('input[name="password"]').value;
        const remember = document.querySelector('input[name="remember"]').checked;

        fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email,
                password,
                remember
            }),
        })
        .then(response => response.json())
        .then(data => {
            if(data === true){
                window.location.href = '/admin/tutors';
            } else {
                setErrors(data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    const setErrors = (errors) => {
        const formElements = document.querySelectorAll('.form-input');
        formElements.forEach(element => {
            element.classList.remove('is-invalid');

        });

        const errorDivs = document.querySelectorAll('.invalid-feedback');
        errorDivs.forEach(errorDiv => errorDiv.remove());

        if (errors) {
            Object.keys(errors).forEach(error => {
                const element = document.querySelector(`[name="${error}"]`);
                element.classList.add('is-invalid');
                
                const errorDiv = document.createElement('div');
                errorDiv.classList.add('invalid-feedback');
                errorDiv.innerHTML = errors[error];
                element.insertAdjacentElement('afterend', errorDiv);
            });
        }
    }
</script>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>