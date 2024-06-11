<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>


<h2>Cadastro</h2>
<form id="cadastroForm">
    <div class="mb-3">
        <input type="text" class="form-control" name="name" placeholder="Nome" value="<?php echo $tutor['name'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $tutor['email'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="phone" placeholder="Telefone" value="<?php echo $tutor['phone'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="zipcode" placeholder="CEP" value="<?php echo $tutor['zipcode'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="address" placeholder="Endereço" value="<?php echo $tutor['address'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="city" placeholder="Cidade" value="<?php echo $tutor['city'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="state" placeholder="Estado" value="<?php echo $tutor['state'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="number" placeholder="Número" value="<?php echo $tutor['number'] ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="complement" placeholder="Complemento" value="<?php echo $tutor['complement'] ?>">
    </div>
    <button type="button" class="btn btn-primary" onclick="saveTutor(<?php echo $tutor['id'] ?>)">Salvar</button>
</form>

<script>
    const saveTutor = (tutorId) => {
        const name = document.querySelector('input[name="name"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const phone = document.querySelector('input[name="phone"]').value;
        const zipcode = document.querySelector('input[name="zipcode"]').value;
        const address = document.querySelector('input[name="address"]').value;
        const city = document.querySelector('input[name="city"]').value;
        const state = document.querySelector('input[name="state"]').value;
        const number = document.querySelector('input[name="number"]').value;
        const complement = document.querySelector('input[name="complement"]').value;

        fetch(`/tutors/${tutorId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name,
                email,
                phone,
                zipcode,
                address,
                city,
                state,
                number,
                complement,
            }),
        })
        .then(response => response.json())
        .then(data => {
            window.location.reload();
        })
        .catch((error) => {
            console.log('Error:', error);
        });
    }
</script>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/admin_layout.php'; ?>