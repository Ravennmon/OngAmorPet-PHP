<?php $title = 'Cadastro de Ongs'; ?>
<?php ob_start(); ?>

<h2>Cadastro</h2>
<form id="ong-form">
    <?php
    $fields = [
        'name' => 'Nome',
        'email' => 'Email',
        'cnpj' => 'CNPJ',
        'phone' => 'Telefone',
        'zipcode' => 'CEP',
        'state' => 'Estado',
        'city' => 'Cidade',
        'address' => 'Endereço',
        'number' => 'Número',
        'complement' => 'Complemento'
    ];

    foreach ($fields as $name => $placeholder) {
        echo '<div class="mb-3">';
        echo '<input type="text" class="form-control" name="' . $name . '" placeholder="' . $placeholder . '">';
        echo '</div>';
    }
    ?>

    <h3>Animais</h3>
    <div id="animalsList">
        <!-- Animal entries will be added here -->
    </div>
    <button type="button" class="btn btn-secondary" onclick="addAnimal()">Adicionar Animal</button>
    <button type="button" class="btn btn-primary" onclick="createOng()">Criar</button>
</form>

<script>
    const addAnimal = () => {
        const animalIndex = document.querySelectorAll('#animalsList .animal-entry').length;
        const animalEntry = document.createElement('div');
        animalEntry.classList.add('animal-entry', 'mb-3');
        animalEntry.innerHTML = `
            <input type="text" class="form-control" name="animals[${animalIndex}]" placeholder="Nome do Animal">
        `;
        document.getElementById('animalsList').appendChild(animalEntry);
    }

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