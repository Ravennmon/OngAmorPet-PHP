
<?php ob_start(); ?>

<style>
    footer {
        position: absolute;
    }
</style>

<section class="init login-form content-center">
    <img src="/resources/img/alimentos_pet.svg" alt="" width="" height="">
    <div>
        <h2>404</h2>
        <p>
            Página não encontrada
        </p>
        <div>
            <a href="/home" class="botao">
                Voltar para página inicial
            </a>
        </div>
    </div>
</section>


<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>