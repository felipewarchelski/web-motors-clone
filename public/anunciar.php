<?php
include '../app/includes/config.php';
include '../app/Session/UserWebMotors.php';
use App\Session\UserWebMotors as SessionUserWebMotors;

if(!SessionUserWebMotors::isLogged()){
    echo '<script>alert("Você precisa fazer login. Por favor, tente novamente!");window.location.href ="login.php";</script>';
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anunciar'])) {
        
    $info_user = SessionUserWebMotors::getInfo();

    $id_usuario = $info_user['id'];

    echo $id_usuario;

    $imagens = $_FILES['imagens'];

    move_uploaded_file($imagens['tmp_name'], '../imgs/anuncio/' . $imagens['name']);

    $endereco_imagem = '../imgs/anuncio/' . $imagens['name'];

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $versao = $_POST['versao'];
    $cor = $_POST['cor'];
    $blindado = "N";
    $km = $_POST['km'];
    $descricao_inicial = $_POST['descricao_inicial'];
    $descricao_completa = $_POST['descricao_completa'];
    $preco = $_POST['preco'];
    $anuncio_liberado = "N";

    if (isset($_POST['blindado'])) {
        $blindado = "S";
    }

    $query = "INSERT INTO anuncio (marca, modelo, ano_lancamento, ano_fabricacao, versao, cor, blindado, km, descricao_inicial, descricao_completa,
                                  preco, anuncio_liberado,imagem_anuncio, id_usuario) VALUES ('$marca', '$modelo', '$ano_lancamento', 
                                  '$ano_fabricacao', '$versao', '$cor', '$blindado', '$km', '$descricao_inicial', '$descricao_completa', '$preco', 
                                  '$anuncio_liberado', '$endereco_imagem', '$id_usuario');";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("Veículo anunciado com sucesso!");window.location.href ="meus_anuncios.php";</script>';
    } else {
        echo '<script>alert("Não foi possível cadastrar o veículo. Por favor, verifique os dados tente novamente!");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/anunciar.css">
    <title>Cadastro Anuncio</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href="index.php"><img src="../imgs/webmotors-logo-8.png" alt=""></a>
        </div>
        <div class="buttons-header"></div>
        <div class="login-header"></div>
    </section>
    <section class="title-register">
        <div class="title-content">
            <div class="image-container">
                <img src="../imgs/car.png" alt="">
            </div>
            <h1>Cadastre seu veículo</h1>
        </div>
    </section>
    <section class="main">
        <div class="div-formulario">
            <h1>Vamos começar seu anúncio?</h1>
            <div class="container-form">
                <form action="#" method="post" enctype="multipart/form-data">
                    <p>Campos com asterisco (*) são obrigatórios</p>
                    <label for="marca">Marca*</label>
                    <select name="marca" id="marcaSelect">
                        <option value="" disabled selected>Escolha uma marca</option>
                        <option value="Fiat">Fiat</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Ford">Ford</option>
                        <option value="Honda">Honda</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Volvo">Volvo</option>
                    </select>
                    <label for="modelo" id="modeloLabel">Modelo*</label>
                    <select name="modelo" id="modeloSelect" disabled>
                        <option value="" disabled selected>Escolha um modelo</option>
                        <option value="c70">c70</option>
                        <option value="c80">c80</option>
                        <option value="CX90">XC90</option>
                        <option value="c150">c150</option>
                    </select>
                    <div class="ano-fabricacao-modelo">
                        <div class="ano">
                            <label for="ano" id="">Ano de lançamento*</label>
                            <select name="ano_lancamento" id="anoSelect" disabled>
                                <option value="" disabled selected>Escolha um ano</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                        <div class="fabricacao">
                            <label for="fabricacao" id="">Ano de Fabricação*</label>
                            <select name="ano_fabricacao" id="fabricacaoSelect" disabled>
                                <option value="" disabled selected>Escolha um ano</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </div>
                    <label for="versao" id="">Versão*</label>
                    <select name="versao" id="versaoSelect" disabled>
                        <option value="" disabled selected>Escolha uma versão</option>
                        <option value="Completa">Completa</option>
                    </select>
                    <label for="cor" id="">Cor*</label>
                    <select name="cor" id="corSelect" disabled>
                        <option value="" disabled selected>Escolha uma cor</option>
                        <option value="Verde">Verde</option>
                        <option value="Azul">Azul</option>
                        <option value="Vermelho">Vermelho</option>
                        <option value="Preto">Preto</option>
                        <option value="Cinza Escuro">Cinza Escuro</option>
                        <option value="Prata">Prata</option>
                    </select>
                    <div class="blindado"><input type="checkbox" name="blindado" id="blindadoCheckbox">
                        <p>Blindado</p>
                    </div>
                    <label for="km" id="" >Quilometragem(KM)*</label>
                    <input type="number" name="km" id="" placeholder="Digite a quilometragem do seu veículo" required>
                    <label for="descricaoinical" id="">Descrição Inicial*(máx 40)</label>
                    <input type="text" name="descricao_inicial" id="" maxlength="40" placeholder="Conte brevemente sobre seu veículo" required>
                    <label for="descricaocompleta" id="">Descrição Completa</label>
                    <textarea id="descricao" name="descricao_completa" maxlength="500" placeholder="Nos conte com detalhes sobre seu veículo" required></textarea>
                    <label for="preco" id="" >Preço</label>
                    <input type="text" name="preco" id="preco" maxlength="11" oninput="formatarPreco(this)" placeholder="Digite o preço do seu veículo" required>
                    <script>
                        function formatarPreco(input) {
                            let valor = input.value.replace(/\D/g, '');
                            valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                            input.value = valor;
                         }
                    </script>
                    <div class="form-group">
                        <label for="imagens ">Imagens*</label>
                        <input type="file" class="form-control-file" id="imagens" name="imagens" accept="image/*" required>
                        <small class="form-text text-muted">Selecione uma imagem para o anúncio nos formatos de imagem (jpg, png, gif, etc.) até 16MB.</small>
                    </div>
                    <div class="box-attention">
                        <img src="../imgs/information white.png" alt="" width="20">
                        <h2>Atenção: Não é possível editar os dados do veículo após criar o anúncio. Confirme os dados antes de continuar.</h2>
                    </div>
                    <div class="div-buttons">
                        <div class="continuar-container">
                            <button class="continuar" name="anunciar">Anunciar<img src="../imgs/arrow-white.png" alt="" width="16px"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        //Apenas selecionar o proximo caso haja selecionado o anterior
        document.addEventListener("DOMContentLoaded", function() {
            const selects = document.querySelectorAll("select");

            selects.forEach((select, index) => {
                select.addEventListener("change", () => {
                    const selectedOption = select.options[select.selectedIndex];
                    const isValidOption = selectedOption.value !== "" && !selectedOption.disabled;

                    if (isValidOption && index < selects.length - 1) {
                        selects[index + 1].removeAttribute("disabled");
                    } else {
                        for (let i = index + 1; i < selects.length; i++) {
                            selects[i].setAttribute("disabled", true);
                            selects[i].selectedIndex = 0;
                        }
                    }
                });
            });
        }); //fim selecionar
    </script>
</body>

</html>