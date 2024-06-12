<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>


<a href="/ongs/create" class="btn btn-info">Cadastrar</a>
<div class="card mt-4">
    <div class="card-header">
        <h2>Ongs</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($ongs as $ong) : ?>
                    <tr>
                        <td><?= $ong['id'] ?></td>
                        <td><?= $ong['name'] ?></td>
                        <td><?= $ong['email'] ?></td>
                        <td><?= $ong['phone'] ?></td>
                        <td><?= $ong['address'] ?></td>
                        <td>
                            <a href="/ongs/edit/<?= $ong['id'] ?>" class="btn btn-warning">Editar</a>
                            <button onclick="deleteTutor(<?= $ong['id'] ?>)" class="btn btn-danger">Remover</button>
                        </td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const deleteTutor = (id) => {
        fetch(`/ongs/${id}`, {
            method: 'DELETE'
        })
        .then(() => {
            window.location.reload();
        })
        .catch(err => console.error(err));

    }
</script>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/admin_layout.php'; ?>