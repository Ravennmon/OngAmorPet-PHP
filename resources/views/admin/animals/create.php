<?php $title = 'Cadastro de Animais'; ?>
<?php ob_start(); ?>

<h2>Cadastro</h2>
<form id="animal-form">
    <div class="form-floating mb-3">
        <input type="text" class="form form-control" name="name" placeholder="Nome">
        <label for="name">Nome</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select form-floating mb-3" name="specie">
            <option selected value="">Selecione a espécie</option>
            <option value="C">Cachorro</option>
            <option value="G">Gato</option>
            <option value="O">Outros</option>
        </select>
        <label for="specie">Espécie</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form form-control" name="breed" placeholder="Raça">
        <label for="breed">Raça</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form form-control" name="birth_date" placeholder="Data de Nascimento">
        <label for="birth_date">Data de Nascimento</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select form-floating mb-3" name="size">
            <option selected value="">Selecione o tamanho</option>
            <?php foreach ($sizes as $key => $value) : ?>
                <option value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
        </select>
        <label for="size">Porte</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select form-floating mb-3" name="sex">
            <option selected value="">Selecione o sexo</option>
            <?php foreach ($sexes as $key => $value) : ?>
                <option value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
        </select>
        <label for="sex">Sexo</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select form-floating mb-3" name="ong_id">
            <option selected value="">Selecione a Ong</option>
            <?php foreach ($ongs as $ong) : ?>
                <option value="<?= $ong['id'] ?>"><?= $ong['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="ong_id">Ong</label>
    </div>


    <button type="button" class="btn btn-primary" onclick="createAnimal()">Criar</button>
</form>

<script>
    const createAnimal = () => {
        const formElements = document.querySelectorAll('#animal-form .form');
        let formData = {};

        formElements.forEach(element => {
            if(element.name.includes('ong_id')){
                formData[element.name] = element.value ? parseInt(element.value) : null;
            } else {
                formData[element.name] = element.value;
            }
            
        });

        fetch('/admin/animals', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => response.json())
        .then(data => {
            if(data.id){
                window.location.href = '/admin/animals';
            } else {
                setErrors(data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    const setErrors = (errors) => {
        const formElements = document.querySelectorAll('#animal-form .form');
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
<?php include __DIR__ . '/../layout/layout.php'; ?>