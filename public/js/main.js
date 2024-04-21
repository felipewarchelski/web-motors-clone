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
