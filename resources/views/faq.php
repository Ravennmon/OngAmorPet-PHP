<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<section id="duvidas" class="fade fade-right active">
    <div class="h-100vh">
        <img src="resources/img/dog2.svg" alt="" loading="lazy">
    </div>
    <div class="h-100vh">
        <h2>Duvidas mais frequêntes, antes de entrar em contato.</h2>
        <p>
            Muitas pessoas possuem duvidas, de como funciona uma adoção, atráves de uma ONG.
            Segue as principais, caso tenha mais alguma, pode nos contatar.
        </p>
        <div class="duvida">
            <h3>Podemos visitar a ONG para ver os pequeninos?</h3>
            <img src="resources/img/down-arrow.svg" alt="" width="30" height="30" loading="lazy">
            <p class="paragrafo">Sim! Você pode nos visitar, contanto que marque uma visita prévia, em caso de
                escolha de gatinhos
                ou cãezinhos que estejam em lar temporario, precisamos marcar com antecedencia, ara poder
                agendar com os tutores temporarios.
            </p>
        </div>
        <div class="duvida">
            <h3>Qualquer um pode adotar?</h3>
            <img src="resources/img/down-arrow.svg" alt="" width="30" height="30" loading="lazy">
            <p class="paragrafo">Sim! Seguindo algumas regras.
                Precisa ser maior de 18 anos, possuir telas nas janelas de seu apartamento/casa e dar muito amor
                e carinho.
            </p>
        </div>
        <div class="duvida">
            <h3>Como posso ser um Tutor temporario?</h3>
            <img src="resources/img/down-arrow.svg" alt="" width="30" height="30" loading="lazy">
            <p class="paragrafo"> Para ser um tutor temporario, precisa seguir as mesmas diretrizes para ser um
                tutor, lembrando
                que a ONG lhe ajuda-ra nos gastos com os pequeninos, sua maior função, é cuidar e proteger os
                pequeninos, até ganhem um lar definitivo.
            </p>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>