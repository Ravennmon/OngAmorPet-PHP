
<?php ob_start(); ?>

<section id="duvidas" class="fade fade-right active">
    <div class="h-100vh">
        <img src="resources/img/dog2.svg" alt="" loading="lazy">
    </div>
    <div class="h-100vh">
        <h2>Duvidas mais frequêntes, antes de entrar em contato.</h2>
        <p>
            Muitas pessoas possuem duvidas, de como funciona uma adoção, atráves de uma ONG ou de um protetor iondividual.
            Segue abaixo as principais, caso possua alguma que não se encontre por aqui, pode nos contatar.
        </p>
        <div class="duvida">
            <h3>Podemos visitar a ONG para ver os pequeninos?</h3>
            <img src="resources/img/down-arrow.svg" alt="" width="30" height="30" loading="lazy">
            <p class="paragrafo">Sim! Você pode nos visitar, contanto que marque uma visita prévia, em caso de
                escolha de gatinhos
                ou cãezinhos que estejam em lar temporario, precisamos marcar com antecedencia, para poder
                agendar com os tutores temporarios a visita, já que os animais se encontram nas casas dos mesmos.
            </p>
        </div>
        <div class="duvida">
            <h3>Qualquer um pode adotar?</h3>
            <img src="resources/img/down-arrow.svg" alt="" width="30" height="30" loading="lazy">
            <p class="paragrafo">Sim! Seguindo algumas regras.
                Precisa ser maior de 18 anos, possuir telas nas janelas de seu apartamento/casa, responsabilidade e dar muito amor
                e carinho. E claro, antes de uma adoção tenha conciencia de que o animal não é um objeto que pode ser devolvido a qualquer momento,
                apenas porque sim, tenha muita certeza antes de fazer sua adoção.
            </p>
        </div>
        <div class="duvida">
            <h3>Como posso ser um Tutor temporario?</h3>
            <img src="resources/img/down-arrow.svg" alt="" width="30" height="30" loading="lazy">
            <p class="paragrafo"> Para ser um tutor temporario, precisa seguir as mesmas diretrizes para ser um
                tutor, lembrando que a <strong>ONG</strong> lhe ajuda-ra nos gastos com os pequeninos, sua maior função, é cuidar e proteger os
                pequenos, até ganharem um lar definitivo.
            </p>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>