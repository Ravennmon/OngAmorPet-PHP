<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>


<a href="/admin/animals/create" class="btn btn-info">Cadastrar</a>
<div class="card mt-4">
    <div class="card-header">
        <h2>Animais</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Tamanho</th>
                    <th>Sexo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($ongs)) : ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum animal cadastrado</td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($animals as $animal) : ?>
                    <tr>
                        <td><?= $animal['id'] ?></td>
                        <td><?= normalizeFullName($animal['name']) ?></td>
                        <td><?= $animal['specie'] ?></td>
                        <td><?= $animal['breed'] ?></td>
                        <td><?= $animal['size'] ?></td>
                        <td><?= $animal['sex'] ?></td>
                        <td>
                            <a href="/admin/animals/edit/<?= $animal['id'] ?>" class="btn btn-warning">Editar</a>
                            <button onclick="deleteAnimal(<?= $animal['id'] ?>)" class="btn btn-danger">Remover</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const deleteAnimal = (id) => {
        fetch(`/admin/animals/${id}`, {
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