<?php $title = 'Cadastro de Animais'; ?>
<?php ob_start(); ?>

<h2>Cadastro</h2>
<form id="animal-form">
    <div class="mb-3">
        <input type="text" class="form form-control" name="name" placeholder="Nome">
    </div>

    <select class="form form-select mb-3" name="specie">
        <option selected>Selecione a espécie</option>
        <option value="C">Cachorro</option>
        <option value="G">Gato</option>
        <option value="O">Outros</option>
    </select>

    <div class="mb-3">
        <input type="text" class="form form-control" name="breed" placeholder="Raça">
    </div>

    <div class="mb-3">
        <input type="date" class="form form-control" name="birth_date" placeholder="Data de Nascimento">
    </div>

    <select class="form form-select mb-3" name="size">
        <option selected>Selecione o tamanho</option>
        <?php foreach ($sizes as $key => $value) : ?>
            <option value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
    </select>

    <select class="form form-select mb-3" name="sex">
        <option selected>Selecione o sexo</option>
        <?php foreach ($sexes as $key => $value) : ?>
            <option value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
    </select>

    <select class="form form-select mb-3" name="ong_id">
        <option selected>Selecione a Ong</option>
        <?php foreach ($ongs as $ong) : ?>
            <option value="<?= $ong['id'] ?>"><?= $ong['name'] ?></option>
        <?php endforeach; ?>
    </select>


    <button type="button" class="btn btn-primary" onclick="createAnimal()">Criar</button>
</form>

<script>
    const createAnimal = () => {
        const formElements = document.querySelectorAll('#animal-form .form');
        let formData = {};

        formElements.forEach(element => {
            if(element.name.includes('ong_id')){
                formData[element.name] = +element.value;
            } else {
                formData[element.name] = element.value;
            }
            
        });

        fetch('/animals', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => response.json())
        .then(data => {
            window.location.href = '/animals';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/admin_layout.php'; ?>