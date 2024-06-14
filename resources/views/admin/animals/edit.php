<?php ob_start(); ?>

<h2>Editar Animal</h2>

<?php if(isset($_SESSION['success_message'])): ?>
    <div class="alert alert-success" role="alert" id="sucess-message">
        <h4 class="alert-heading">Sucesso!</h4>
        <hr>
        <p class="mb-0"><?= showSuccessMessage() ?></p>
    </div>
<?php endif; ?>

<form id="animal-form">
    <div class="form-floating mb-3">
        <input type="text" class="form form-control" name="name" placeholder="Nome" value="<?= $animal['name'] ?>">
        <label for="name">Nome</label>
    </div>

    <select class="form form-select mb-3" name="specie">
        <?php foreach ($species as $key => $value) : ?>
            <option <?php if($key == $animal['specie']) :?> selected <?php endif ?> value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
        <label for="specie">Espécie</label>
    </select>

    <div class="form-floating mb-3">
        <input type="text" class="form form-control" name="breed" placeholder="Raça" value="<?= $animal['breed'] ?>">
        <label for="breed">Raça</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form form-control" name="birth_date" placeholder="Data de Nascimento" value="<?= $animal['birth_date'] ?>">
        <label for="birth_date">Data de Nascimento</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select mb-3" name="size">
            <?php foreach ($sizes as $key => $value) : ?>
                <option <?php if($key == $animal['size']) :?> selected <?php endif ?> value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
        </select>
        <label for="size">Porte</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select mb-3" name="sex">
            <?php foreach ($sexes as $key => $value) : ?>
                <option <?php if($key == $animal['sex']) :?> selected <?php endif ?>  value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
            <label for="sex">Sexo</label>
        </select>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select mb-3" name="tutor_id">
            <?php foreach ($tutors as $tutor) : ?>
                <option  value="<?= $tutor['id'] ?>"><?= $tutor['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="tutor_id">Tutor</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form form-select mb-3" name="ong_id" disabled>
            <option selected value="<?= $ong['id'] ?>"><?= $ong['name'] ?></option>
        </select>
        <label for="ong_id">Ong</label>
    </div>

    <button type="button" class="btn btn-purple" onclick="update('animals/<?= $animal['id'] ?>')">Salvar</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/layout.php'; ?>