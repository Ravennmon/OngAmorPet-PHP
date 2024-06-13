
<?php ob_start(); ?>

<style>
    footer {
        position: absolute;
    }
</style>

<section id="cadastrosucess" class="init login-form content-center">
    <img src="resources/img/cat.svg" alt="" width="" height="">
    <div>
        <h2>Usuario cadastrado com sucesso</h2>
        <p>
            Caso você tenha alguma dúvida, sobre a ONG, como trabalhamos, como adotar e como pode nos ajudar
            com nossos gastos de cuidados, pode entrar em contato, pelo nosso whatsapp
            <a href="https://wa.me/5504196888888" target="_blank">AQUI</a>. E também temos instagram
            <a href="http://instagram.com/crazycatgang" target="_blank"> CrazyCatGang</a>
        </p>
        <div>
            <a href="/login" class="botao">
                Voltar para tela de login
            </a>
        </div>
            
    </div>
</section>


<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>