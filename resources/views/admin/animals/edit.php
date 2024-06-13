<?php $title = 'Cadastro de Animais'; ?>
<?php ob_start(); ?>

<h2>Cadastro</h2>
<form id="animal-form">
    <div class="mb-3">
        <input type="text" class="form form-control" name="name" placeholder="Nome" value="<?= $animal['name'] ?>">
    </div>

    <select class="form form-select mb-3" name="specie">
        <?php foreach ($species as $key => $value) : ?>
            <option <?php if($value == $animal['specie']) :?> selected <?php endif ?> value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>

    </select>

    <div class="mb-3">
        <input type="text" class="form form-control" name="breed" placeholder="Raça" value="<?= $animal['breed'] ?>">
    </div>

    <div class="mb-3">
        <input type="date" class="form form-control" name="birth_date" placeholder="Data de Nascimento" value="<?= $animal['birth_date'] ?>">
    </div>

    <select class="form form-select mb-3" name="size">
        <?php foreach ($sizes as $key => $value) : ?>
            <option <?php if($value == $animal['size']) :?> selected <?php endif ?> value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
    </select>

    <select class="form form-select mb-3" name="sex">
        <?php foreach ($sexes as $key => $value) : ?>
            <option <?php if($value == $animal['sex']) :?> selected <?php endif ?>  value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
    </select>

    <select class="form form-select mb-3" name="tutor_id">
        <?php foreach ($tutors as $tutor) : ?>
            <option  value="<?= $tutor['id'] ?>"><?= $tutor['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <select class="form form-select mb-3" name="ong_id" disabled>
            <option selected value="<?= $ong['id'] ?>"><?= $ong['name'] ?></option>
    </select>


    <button type="button" class="btn btn-primary" onclick="editAnimal(<?= $animal['id'] ?>)">Salvar</button>
</form>

<script>
    const editAnimal = (animalId) => {
        const formElements = document.querySelectorAll('#animal-form .form');
        let formData = {};

        formElements.forEach(element => {
            if(element.name.includes('_id')){
                formData[element.name] = +element.value;
            } else {
                formData[element.name] = element.value;
            }
            
        });

        fetch(`/admin/animals/${animalId}`, {
            method: 'PUT',
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
<?php include __DIR__ . '/../layout/layout.php'; ?>