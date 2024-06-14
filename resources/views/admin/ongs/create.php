<?php $title = 'Cadastro de Ongs'; ?>
<?php ob_start(); ?>

<h2>Cadastro</h2>
<form id="ong-form">
    <?php foreach($fields as $key => $value): ?>
        <div class="form-floating mb-3">
            <input type="text" class="form form-control" name="<?= $key ?>"  id="<?= $key ?>" placeholder="<?= $value ?>">
            <label for="<?= $key ?>"><?= $value ?></label>
        </div>
    <?php endforeach; ?>

    <button type="button" class="btn btn-purple" onclick="store('ongs')">Criar</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/layout.php'; ?>