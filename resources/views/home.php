
<?php ob_start(); ?>

<section id="inicio" class="init fade fade-right">

    <img src="resources/img/alimentos_pet.svg">
    <div>
        <h1>Garanta uma casa ou cuidados até um lar doce chegar, para os pequeninos.</h1>
        <p>A AmorPet é uma plataforma criada por desenvolvedores inesperientes, mas que querem de alguma forma
            ajudar a causa de resgate e cuidado de animais, especializados em amar seus pets, criamos a plataforma
            para o registro de ongs e tutores, para que o match ocorra da melhor forma possível.</p>
        <a class="botao" href="https://wa.me/55041996888888" target="_blank">Agende uma visita</a>
        <a class="botao" href="/register" target="_blank">Cadastre-se</a>
    </div>

    <div>
        <img class="absolute" src="resources/img/shape_roxo.svg" alt="">
    </div>
</section>

<section id="cachorros" class="init fade fade-left">
    <img src="resources/img/Menina_e_cachorro.svg" alt="Cães" width="" height="" loading="lazy">
    <div>
        <h2>Conheça nossos cãezinhos.</h2>
        <p>
            Cachorros abandonados são um problema sério e lamentável que afeta muitas regiões do mundo. Esse
            tipo de situação é prejudicial tanto para os cães quanto para a sociedade como um todo. Aqui
            somos especializados no resgate e reabilitação dos mesmos, para a adoção, correta e assistida
            inicialmente.
        </p>
        <a class="cachorrinhos" href="https://www.instagram.com/institutoficacomigo_" target="_blank">Conheça alguns
            cachorrinhos</a>
    </div>
</section>

<section id="gatos" class="fade fade-right">
    <img src="resources/img/menina_e_gato.svg" alt="Gatos" width="" height="" loading="lazy">

    <div>
        <h2>Conheça nossos gatinhos.</h2>
        <p>
            Gatos abandonados, muitas vezes referidos como gatos de rua ou gatos vadios, enfrentam desafios
            semelhantes aos cachorros abandonados, embora haja diferenças notáveis em sua natureza e nas formas
            de abordar o problema.
        </p>
        <a class="gatinhos" href="https://www.instagram.com/grazycatgang" target="_blank">Conheça alguns gatinhos</a>
    </div>
</section>

<section class="fade fade-left content-center">
    <img src="resources/img/cat.svg" alt="" width="" height="" loading="lazy">
    <div>
        <h2>Quer ajudar, adotar ou ser lar temporario? Entre em contato.</h2>
        <p>
            Caso você tenha alguma dúvida, sobre as ONGs, como trabalham, como adotar e como pode ajudar
            com com os gastos dfas ONGs parceiras, pode entrar em contato, pelo nosso whatsapp
            <a href="https://wa.me/5504196888888" target="_blank">AQUI</a>. E também temos instagram
            <a href="http://instagram.com/crazycatgang" target="_blank"> CrazyCatGang</a>
        </p>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>