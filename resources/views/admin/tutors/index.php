<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>


<a href="/admin/tutors/create" class="btn btn-info">Cadastrar</a>

<div class="card mt-4">
    <div class="card-header">
        <h2>Tutores</h2>
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
                <?php if (empty($tutors)) : ?>
                    <tr>
                        <td colspan="6">Nenhum tutor cadastrado</td>
                    </tr>
                <?php endif; ?>
                
                <?php foreach ($tutors as $tutor) : ?>
                    <tr>
                        <td><?= $tutor['id'] ?></td>
                        <td><?= $tutor['name'] ?></td>
                        <td><?= $tutor['email'] ?></td>
                        <td><?= $tutor['phone'] ?></td>
                        <td><?= $tutor['address'] ?></td>
                        <td>
                            <a href="/admin/tutors/edit/<?= $tutor['id'] ?>" class="btn btn-warning">Editar</a>
                            <button onclick="deleteTutor(<?= $tutor['id'] ?>)" class="btn btn-danger">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const deleteTutor = (id) => {
        fetch(`/admin/tutors/${id}`, {
            method: 'DELETE'
        })
        .then(() => {
            window.location.reload();
        })
        .catch(err => console.error(err));

    }
</script>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/layout.php'; ?>