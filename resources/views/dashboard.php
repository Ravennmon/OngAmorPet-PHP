<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<section>
    <img src="resources/img/menina_e_gato.svg" alt="Gatos" width="" height="" loading="lazy">

    <h1>
        Usuário criado com sucesso
    </h1>
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>