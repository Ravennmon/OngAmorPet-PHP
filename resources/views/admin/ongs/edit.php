
<?php ob_start(); ?>

<h2>Editar Ong</h2>

<?php if (isset($_SESSION['success_message'])) : ?>
    <div class="alert alert-success" role="alert" id="sucess-message">
        <h4 class="alert-heading">Sucesso!</h4>
        <hr>
        <p class="mb-0"><?= showSuccessMessage() ?></p>
    </div>
<?php endif; ?>

<div class="text-right">
    <button type="button" class="btn btn-purple mb-4 " data-bs-toggle="modal" data-bs-target="#animais-modal">
        Visualizar Animais
    </button>
</div>

<form id="edit-form">
    <?php foreach ($fields as $key => $value) : ?>
        <div class="form-floating mb-3">
            <input type="text" class="form form-control" name="<?= $key ?>" id="<?= $key ?>" value="<?= $ong[$key] ?>">
            <label for="<?= $key ?>"><?= $value ?></label>
        </div>
    <?php endforeach; ?>

    <button type="button" class="btn btn-purple" onclick="update('ongs/<?php echo $ong['id'] ?>')">Salvar</button>
</form>

<?php include __DIR__ . '/../modals/animals.php'; ?>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/layout.php'; ?>