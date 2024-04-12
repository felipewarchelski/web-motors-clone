<?php
$info = \App\Session\User::getInfo();



?>


<h1>Logado - WebMotors</h1>

    <div class="foto_perfil">
        <img src="<?=$info['picture']?>">
    </div>
<p>Olá, <b><?=$info['name']?></b>. Seja muito bem-vindo ao WebMotors!</p>
<button onclick="window.location.href = '../app/includes/logout.php'">Sair</button>

