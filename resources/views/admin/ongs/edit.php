
<?php ob_start(); ?>

<h2>Editar</h2>

<?php if (isset($_SESSION['success_message'])) : ?>
    <div class="alert alert-success" role="alert" id="sucess-message">
        <h4 class="alert-heading">Sucesso!</h4>
        <hr>
        <p class="mb-0"><?= showSuccessMessage() ?></p>
    </div>
<?php endif; ?>

<div class="text-right">
    <button type="button" class="btn btn-primary mb-4 " data-bs-toggle="modal" data-bs-target="#animais-modal">
        Visualizar Animais
    </button>
</div>

<form id="edit-form">
    <?php foreach ($fields as $key => $value) : ?>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="<?= $key ?>" id="<?= $key ?>" value="<?= $ong[$key] ?>">
            <label for="<?= $key ?>"><?= $value ?></label>
        </div>
    <?php endforeach; ?>

    <button type="button" class="btn btn-primary" onclick="saveTutor(<?php echo $ong['id'] ?>)">Salvar</button>
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

<script>
    const saveTutor = (ongId) => {
        const formElements = document.querySelectorAll('#edit-form .form-control');
        let formData = {};

        formElements.forEach(element => {
            formData[element.name] = element.value;
        });

        fetch(`/admin/ongs/${ongId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            })
            .then(response => response.json())
            .then(data => {
                if (data === true) {
                    window.location.reload();
                } else {
                    setErrors(data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    const setErrors = (errors) => {
        document.querySelector('#sucess-message').remove();
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