<?php
$info = \App\Session\User::getInfo();



?>


<h1>Logado - WebMotors</h1>
<a href="../index.php">Ir para os anúncios</a>

    <div class="foto_perfil">
        <img src="<?=$info['picture']?>">
    </div>
<p>Olá, <b><?=$info['given_name']?></b>. Seja muito bem-vindo ao WebMotors!</p>
<button onclick="window.location.href = '../app/includes/logout.php'">Sair</button>

