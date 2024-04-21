//CONFIRM DO LOGOUT

function confirmLogout(event) {
    var shouldLogout = confirm("Deseja sair da sua conta?");

    if (!shouldLogout) {
        event.preventDefault();
        console.log("Logout cancelado pelo usuário.");
    } else {
        window.location.href = '../app/includes/logout.php';
    }
}

//FIM CONFIRM LOGOUT

//CONFIRM EXCLUIR/APROVAR ANUNCIO

function confirmarExclusao(event) {
    var confirmar = confirm("Tem certeza de que deseja excluir este anúncio?");

    if (!confirmar) {
        event.preventDefault();
    }
}

function confirmarAprovacao(event) {
    var confirmar = confirm("Tem certeza de que deseja aprovar este anúncio?");

    if (!confirmar) {
        event.preventDefault();
    }
}

//FIM CONFIRM EXCLUIR/APROVAR ANUNCIO

