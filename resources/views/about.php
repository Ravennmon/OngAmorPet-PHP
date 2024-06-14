<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<section id="Francyne" class="init profile fade fade-left">
    <img class="img-profile" src="resources/img/Francyne.png">
    <div>
        <h2>Francyne Leocadio</h2>
        <p>Francyne tem 27 anos, cursa o 3º semestre de ADS (Analise e desenvolvimento de Sistemas), já tem uma formação em designer gráfico e fez 3 anos de Física na UFPR.</p>
        <a class="botao" href="https://github.com/Ravennmon" target="_blank">GitHub</a>
    </div>
</section>

<section id="Henrique" class="init profile fade fade-left">
    <img class="img-profile" src="resources/img/Henrique.png">
    <div>
        <h1>Henrique Onorato</h1>
        <p>Henrique tem ** anos, cursa o 3º semestre de ADS (Analise e desenvolvimento de Sistemas) e já esta no mercadode tecnologia,como desenvolvedor fullstack em JAVA (junior).</p>
        <a class="botao" href="https://github.com/Henryk212" target="_blank">GitHub</a>
    </div>
</section>


<section id="Pedro" class="init profile fade fade-right">
    <img class="img-profile" src="resources/img/Pedro.png">
    <div>
        <h1>Pedro Dawybida</h1>
        <p>Pedro tem 23 anos, cursa o 3º semestre de ADS (Analise e desenvolvimento de Sistemas) e esta se aprimorando para o mercado de dados.</p>
        <a class="botao" href="https://github.com/pedrodawybida" target="_blank">GitHub</a>
    </div>
</section>


<section id="Renan" class="profile fade fade-right">
    <img class="img-profile" src="resources/img/Renan.png">
    <div>
        <h2>Renan dos Santos</h2>
        <p>Renan tem 27 anos, cursa o 3º semestre de ADS (Analise e desenvolvimento de Sistemas), e já esta no mercado de tecnologia a 4 anos, 3 deles como Back-End com PHP, e hoje é fullstack.</p>
        <a class="botao" href="https://github.com/rnnrls97" target="_blank">GitHub</a>
    </div>
</section>


<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>