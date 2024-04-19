<?php
include '../app/includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anunciar'])) {

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
    $anuncio_liberado = "S";

    if (isset($_POST['blindado'])) {
        $blindado = "S";
    }

    $query = "INSERT INTO anuncio (marca, modelo, ano_lancamento, ano_fabricacao, versao, cor, blindado, km, descricao_inicial, descricao_completa,
                                  preco, anuncio_liberado,imagem_anuncio) VALUES ('$marca', '$modelo', '$ano_lancamento', 
                                  '$ano_fabricacao', '$versao', '$cor', '$blindado', '$km', '$descricao_inicial', '$descricao_completa', '$preco', 
                                  '$anuncio_liberado', '$endereco_imagem');";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Anunciado!";
    } else {
        echo "Erro ao anunciar: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro_anuncio.css">
    <title>Cadastro Anuncio</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href=""><img src="../imgs/webmotors-logo-8.png" alt=""></a>
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
                <form action="#" method="post">
                    <p>Campos com asterisco (*) são obrigatórios</p>
                    <label for="marca">Marca*</label>
                    <select name="marca" id="marcaSelect">
                        <option value="" disabled selected>Escolha uma marca</option>
                        <option value="fiat">Fiat</option>
                        <option value="chevrolet">Chevrolet</option>
                        <option value="volkswagen">Volkswagen</option>
                        <option value="ford">Ford</option>
                        <option value="honda">Honda</option>
                        <option value="toyota">Toyota</option>
                        <option value="nissan">Nissan</option>
                    </select>
                    <label for="modelo" id="modeloLabel">Modelo*</label>
                    <select name="modelo" id="modeloSelect" disabled>
                        <option value="" disabled selected>Escolha um modelo</option>
                        <option value="fiat">Uno</option>
                        <option value="chevrolet">Onix</option>
                        <option value="volkswagen">Fusca</option>
                        <option value="ford">Focus</option>
                        <option value="honda">Civic</option>
                        <option value="toyota">Hilux</option>
                        <option value="nissan">Frontier</option>
                    </select>
                    <div class="ano-fabricacao-modelo">
                        <div class="ano">
                            <label for="ano" id="">Ano do modelo*</label>
                            <select name="ano_lancamento" id="modeloSelect" disabled>
                                <option value="" disabled selected>Escolha um ano</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                            </select>
                        </div>
                        <div class="fabricacao">
                            <label for="fabricacao" id="">Ano de Fabricação*</label>
                            <select name="ano_fabricacao" id="modeloSelect" disabled>
                                <option value="" disabled selected>Escolha um ano</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                            </select>
                        </div>
                    </div>
                    <label for="versao" id="">Versão*</label>
                    <select name="versao" id="modeloSelect" disabled>
                        <option value="" disabled selected>Escolha uma versão</option>
                        <option value="c70">c70</option>
                        <option value="c80">c80</option>
                        <option value="c90">c90</option>
                        <option value="c150">c150</option>
                    </select>
                    <label for="cor" id="">Cor*</label>
                    <select name="cor" id="modeloSelect" disabled>
                        <option value="" disabled selected>Escolha uma cor</option>
                        <option value="verde">Verde</option>
                        <option value="azul">Azul</option>
                        <option value="vermelho">Vermelho</option>
                        <option value="preto">Preto</option>
                    </select>
                    <div class="blindado"><input type="checkbox" name="blindado" id="blindadoCheckbox">
                        <p>Blindado</p>
                    </div>
                    <label for="km" id="">Quilometragem(KM)*</label>
                    <input type="text" name="km" id="" placeholder="Digite a quilometragem do seu veículo" oninput="formatarPreco(this)" maxlength="9">
                    <label for="descricaoinical" id="">Descrição Inicial*</label>
                    <input type="text" name="descricao_inicial" id="" maxlength="14" placeholder="Conte brevemente sobre seu veículo">
                    <label for="descricaocompleta" id="">Descrição Completa</label>
                    <textarea id="descricao" name="descricao_completa" maxlength="200" placeholder="Nos conte com detalhes sobre seu veículo"></textarea>
                    <label for="preco" id="">Preço*</label>
                    <input type="text" name="preco" id="" placeholder="Digite o preço do seu veículo" oninput="formatarPreco(this)" maxlength="15">
                    <script>
                        function formatarPreco(input) {
                            let valor = input.value.replace(/\D/g, '');
                            valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                            input.value = valor;
                        }
                    </script>
                    <div class="form-group">
                        <label for="imagens ">Imagens*</label>
                        <input type="file" class="form-control-file" id="imagens" name="imagens" required>
                        <small class="form-text text-muted">Selecione uma imagem para o anúncio nos formatos de imagem (jpg, png, gif, etc.) até 16MB.</small>
                    </div>
                    <div class="box-attention">
                        <img src="../imgs/information white.png" alt="" width="20">
                        <h2>Atenção: Não é possível editar os dados do veículo após criar o anúncio. Confirme os dados antes de continuar.</h2>
                    </div>
                    <div class="div-buttons">
                        <div class="voltar-container">
                            <a href="index.php" class="voltar"><img src="../imgs/arrow.png" alt="" width="16px">Voltar</a>
                        </div>
                        <div class="continuar-container">
                            <input type="submit" value="Cadastrar" name="anunciar">
                            <img src="../imgs/arrow-white.png" alt="" width="18">
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