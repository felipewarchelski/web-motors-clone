<script>
    // Captura o elemento <select> da marca e o elemento <select> do modelo
        const marcaSelect = document.getElementById('marcaSelect');
        const modeloLabel = document.getElementById('modeloLabel');
        const modeloSelect = document.getElementById('modeloSelect');

        // Adiciona um event listener para escutar mudanças na seleção da marca
        marcaSelect.addEventListener('change', function() {
        const selectedMarca = marcaSelect.value;

        // Verifica se uma marca foi selecionada
        if (selectedMarca) {
            // Habilita o campo de seleção de modelo
            modeloLabel.style.display = 'block';
        modeloSelect.style.display = 'block';

        // Lógica para popular o campo de seleção de modelo com opções específicas para cada marca
        // Aqui você pode adicionar opções de modelo com base na marca selecionada
        modeloSelect.innerHTML = ''; // Limpa as opções atuais

        switch (selectedMarca) {
                case 'fiat':
        modeloSelect.innerHTML += '<option value="palio">Palio</option>';
        modeloSelect.innerHTML += '<option value="uno">Uno</option>';
        break;
        case 'chevrolet':
        modeloSelect.innerHTML += '<option value="onix">Onix</option>';
        modeloSelect.innerHTML += '<option value="prisma">Prisma</option>';
        break;
        // Adicione mais cases conforme necessário para outras marcas
        default:
        modeloSelect.innerHTML += '<option value="" disabled selected>Escolha um modelo</option>';
        break;
            }
        } else {
            // Desabilita o campo de seleção de modelo se nenhuma marca for selecionada
            modeloLabel.style.display = 'none';
        modeloSelect.style.display = 'none';
        modeloSelect.innerHTML = '<option value="" disabled selected>Escolha um modelo</option>'; // Limpa as opções
        }
    });
    </script>
