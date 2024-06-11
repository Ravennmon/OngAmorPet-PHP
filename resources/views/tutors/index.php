<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>


<div class="card">
    <div class="card-header">
        <h2>Users</h2>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($tutors as $tutor) : ?>
                    <tr>
                        <td><?= $tutor['id'] ?></td>
                        <td><?= $tutor['name'] ?></td>
                        <td><?= $tutor['email'] ?></td>
                        <td><?= $tutor['phone'] ?></td>
                        <td><?= $tutor['address'] ?></td>
                        <td>
                            <a href="/tutors/edit/<?= $tutor['id'] ?>" class="btn btn-warning">Editar</a>
                            <button onclick="deleteTutor(<? echo $tutor['id'] ?>)" class="btn btn-danger">Remover</button>
                        </td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/admin_layout.php'; ?>