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

function formatarPreco(input) {
    let valor = input.value.replace(/\D/g, '');
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    input.value = valor;
 }

 function formatarCPF(input) {
    let valor = input.value.replace(/\D/g, '');
    if (valor.length > 3) {
        valor = valor.slice(0, 3) + '.' + valor.slice(3);
    }
    if (valor.length > 7) {
        valor = valor.slice(0, 7) + '.' + valor.slice(7);
    }
    if (valor.length > 11) {
        valor = valor.slice(0, 11) + '-' + valor.slice(11, 13);
    }
    input.value = valor;
}
function formatarCEP(input) {
    let valor = input.value.replace(/\D/g, '');
    if (valor.length > 5) {
        valor = valor.slice(0, 5) + '-' + valor.slice(5, 8);
    }
    input.value = valor;
}
function formatarTelefone(input) {
    let valor = input.value.replace(/\D/g, '');
    if (valor.length > 2) {
        valor = '(' + valor.slice(0, 2) + ') ' + valor.slice(2);
    }
    if (valor.length > 9) {
        valor = valor.slice(0, 10) + '-' + valor.slice(10);
    }
    if (valor.length > 15) {
        valor = valor.slice(0, 15);
    }
    input.value = valor;
}
