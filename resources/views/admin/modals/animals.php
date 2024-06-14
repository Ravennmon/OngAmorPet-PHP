
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