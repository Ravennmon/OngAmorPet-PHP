<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<h2>Cadastro</h2>
<form id="cadastro-form">
    <?php
    $fields = [
        'name' => 'Nome',
        'email' => 'Email',
        'phone' => 'Telefone',
        'zipcode' => 'CEP',
        'address' => 'Endereço',
        'city' => 'Cidade',
        'state' => 'Estado',
        'number' => 'Número',
        'complement' => 'Complemento'
    ];
    
    foreach ($fields as $name => $placeholder) {
        echo '<div class="mb-3">';
        echo '<input type="text" class="form-control" name="' . $name . '" placeholder="' . $placeholder . '">';
        echo '</div>';
    }
    ?>
    <button type="button" class="btn btn-primary" onclick="createTutor()">Cadastrar</button>
</form>

<script>
    const createTutor = () => {
        const formElements = document.querySelectorAll('#cadastro-form .form-control');
        let formData = {};

        formElements.forEach(element => {
            formData[element.name] = element.value;
        });

        fetch('/admin/tutors', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => response.json())
        .then(data => {
            if(data.id){
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
        const formElements = document.querySelectorAll('#cadastro-form .form-control');
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
<?php include __DIR__ . '/../layout/layout.php'; ?>
