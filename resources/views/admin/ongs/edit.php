<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<h2>Editar</h2>
<form id="edit-form">
    <?php foreach($fields as $key => $value): ?>
        <div class="mb-3">
            <input type="text" class="form-control" name="<?= $key ?>"  id="<?= $key ?>" value="<?= $ong[$key] ?>">
        </div>
    <?php endforeach; ?>

    <button type="button" class="btn btn-primary" onclick="saveTutor(<?php echo $ong['id'] ?>)">Salvar</button>
</form>

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
        .then(() => {
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/layout.php'; ?>
