
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

<div class="modal fade" id="animais-modal" tabindex="-1" aria-labelledby="animais-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="animais-modalLabel">Animais Vinculados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Animais
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($animals as $animal) : ?>
                            <li class="list-group-item"><?= $animal['name'] ?> - <?= getSpecie($animal['specie']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/layout.php'; ?>