
<?php ob_start(); ?>

<section id="login" class="init login-form fade fade-right">
    <div class="login-container">
        <div class="login-box">
            <h2>Cadastro</h2>
            <input type="text" class="form" name="name" placeholder="Nome">
            <input type="text" class="form" name="email" placeholder="Email">
            <input type="password" class="form" name="password" placeholder="Senha">
            <button class="btn-login" onclick="register()">Cadastrar</button>

        </div>
    </div>
</section>


<script>
    const register = () => {
        const formElements = document.querySelectorAll('.form');
        let formData = {};

        formElements.forEach(element => {
            formData[element.name] = element.value;
        });

        fetch('/users', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => response.json())
        .then(data => {
            if(data?.id){
                window.location.href = '/registered';
            } else {
                setErrors(data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    const setErrors = (errors) => {
        const formElements = document.querySelectorAll('.form');
        formElements.forEach(element => {
            element.classList.remove('is-invalid');
        });

        const errorDivs = document.querySelectorAll('.invalid-feedback');
        errorDivs.forEach(errorDiv => errorDiv.remove());

        if (errors) {
            Object.keys(errors).forEach(error => {
                const element = document.querySelector(`[name="${error}"]`);

                if(element){
                    element.classList.add('is-invalid');
                
                    const errorDiv = document.createElement('div');
                    errorDiv.classList.add('invalid-feedback');
                    errorDiv.innerHTML = errors[error];
                    element.insertAdjacentElement('afterend', errorDiv);
                }
                
            });
        }
    }
</script>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>