<?php $title = 'Cadastro de Ongs'; ?>
<?php ob_start(); ?>

<h2>Cadastro</h2>
<form id="ong-form">
    <?php foreach($fields as $key => $value): ?>
        <div class="mb-3">
            <input type="text" class="form-control" name="<?= $key ?>"  id="<?= $key ?>" placeholder="<?= $value ?>">
        </div>
    <?php endforeach; ?>

    <button type="button" class="btn btn-primary" onclick="createOng()">Criar</button>
</form>

<script>     
    const createOng = () => {
        const formElements = document.querySelectorAll('#ong-form .form-control');
        let formData = {};

        formElements.forEach(element => {
            if (element.name.startsWith('animals')) {
                if (!formData.animals) formData.animals = [];
                formData.animals.push(element.value);
            } else {
                formData[element.name] = element.value;
            }
        });

        fetch('/admin/ongs', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => response.json())
        .then(data => {
            if(data.id){
                window.location.href = '/admin/ongs';
            } else {
                setErrors(data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    const setErrors = (errors) => {
        const formElements = document.querySelectorAll('#ong-form .form-control');
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