
<?php ob_start(); ?>


<a href="/admin/ongs/create" class="btn btn-purple">Cadastrar</a>
<div class="card mt-4">
    <div class="card-header">
        <h2>Ongs</h2>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($ongs)) : ?>
                    <tr>
                        <td colspan="7" class="text-center">Nenhuma ong cadastrada</td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($ongs as $ong) : ?>
                    <tr>
                        <td><?= $ong['id'] ?></td>
                        <td><?= normalizeFullName($ong['name']) ?></td>
                        <td><?= $ong['cnpj'] ?></td>
                        <td><?= $ong['email'] ?></td>
                        <td><?= $ong['phone'] ?></td>
                        <td><?= fullAddress($ong) ?></td>
                        <td>
                            <a href="/admin/ongs/edit/<?= $ong['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <button onclick="destroy('ongs/<?= $ong['id'] ?>')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout/layout.php'; ?>