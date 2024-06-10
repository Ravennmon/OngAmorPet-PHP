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
                            <a href="/tutors/<?= $tutor['id'] ?>" class="btn btn-primary">View</a>
                            <a href="/tutors/edit/<?= $tutor['id'] ?>" class="btn btn-warning">Edit</a>
                            <form action="/tutors/<?= $tutor['id'] ?>" method="POST" style="display: inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout/admin_layout.php'; ?>