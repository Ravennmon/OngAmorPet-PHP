<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>


<h2>Cadastro</h2>
<form id="cadastroForm">
    <div class="mb-3">
        <input type="text" class="form-control" name="name" placeholder="Nome">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="phone" placeholder="Telefone">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="zipcode" placeholder="CEP">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="address" placeholder="Endereço">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="city" placeholder="Cidade">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="state" placeholder="Estado">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="number" placeholder="Número">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="complement" placeholder="Complemento">
    </div>
    <button type="button" class="btn btn-primary" onclick="createTutor()">Cadastrar</button>
</form>

<script>
    const createTutor = () => {
        const name = document.querySelector('input[name="name"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const phone = document.querySelector('input[name="phone"]').value;
        const zipcode = document.querySelector('input[name="zipcode"]').value;
        const address = document.querySelector('input[name="address"]').value;
        const city = document.querySelector('input[name="city"]').value;
        const state = document.querySelector('input[name="state"]').value;
        const number = document.querySelector('input[name="number"]').value;
        const complement = document.querySelector('input[name="complement"]').value;

        fetch('/tutors', {
            method: 'POST',
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
            console.log('Success:', data);
        })
        .catch((error) => {
            console.log('Error:', error);
        });
    }
</script>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/admin_layout.php'; ?>