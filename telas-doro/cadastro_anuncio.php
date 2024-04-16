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
                        <option value="fiat">Fiat</option>
                        <option value="chevrolet">Chevrolet</option>
                        <option value="volkswagen">Volkswagen</option>
                        <option value="ford">Ford</option>
                        <option value="honda">Honda</option>
                        <option value="toyota">Toyota</option>
                        <option value="nissan">Nissan</option>
                    </select>
                    <div class="ano-fabricacao-modelo">
                        <div class="ano">
                            <label for="ano" id="">Ano do modelo*</label>
                            <select name="ano" id="anoSelect" disabled>
                                <option value="" disabled selected>Escolha um ano</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                            </select>
                        </div>
                        <div class="fabricacao">
                            <label for="fabricacao" id="">Ano de Fabricação*</label>
                            <select name="fabricacao" id="fabricacaoSelect" disabled>
                                <option value="" disabled selected>Escolha um ano</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                            </select>
                        </div>
                    </div>
                    <label for="versao" id="">Versão*</label>
                    <select name="versao" id="versaoSelect" disabled>
                        <option value="" disabled selected>Escolha uma versão</option>
                        <option value="c70">c70</option>
                        <option value="c80">c80</option>
                        <option value="c90">c90</option>
                        <option value="c150">c150</option>
                    </select>
                    <label for="cor" id="">Cor*</label>
                    <select name="cor" id="corSelect" disabled>
                        <option value="" disabled selected>Escolha uma cor</option>
                        <option value="verde">Verde</option>
                        <option value="azul">Azul</option>
                        <option value="vermelho">Vermelho</option>
                        <option value="preto">Preto</option>
                    </select>
                    <div class="blindado"><input type="checkbox" name="blindado" id="blindadoCheckbox">
                        <p>Blindado</p>
                    </div>
                    <div class="box-attention">
                        <img src="../imgs/information white.png" alt="" width="20">
                        <h2>Atenção: Não é possível editar os dados do veículo após criar o anúncio. Confirme os dados antes de continuar.</h2>
                    </div>
                    <div class="div-buttons">
                        <div class="voltar-container">
                            <a href="" class="voltar"><img src="../imgs/arrow.png" alt="" width="16px">Voltar</a>
                        </div>
                        <div class="continuar-container">
                            <a href="" class="continuar">Continuar<img src="../imgs/arrow-white.png" alt="" width="16px"></a>
                            <input type="submit" value="botao" name="botao">
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