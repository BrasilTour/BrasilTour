
    // Dados dos planos para o modal
    const planosData = {
        bronze: {
            nome: "Pacote Bronze",
            icone: '<i class="fa-regular fa-gem"></i>',
            passos: [
                'Faça login na sua conta BrasilTour ou cadastre-se.',
                'Escolha o destino e as datas da sua viagem.',
                'Na finalização, selecione a opção "Pacote Bronze".',
                'Prossiga para o pagamento e confirme a reserva.',
            ]
        },
        prata: {
            nome: "Pacote Prata",
            icone: '<i class="fa-solid fa-shield"></i>',
            passos: [
                'Confirme sua identidade com a nossa central de reservas.',
                'Faremos um pré-agendamento do seu passeio guiado particular.',
                'Escolha o destino, o período e os detalhes da sua hospedagem.',
                'Finalize a reserva com a confirmação do Upgrade de Quarto (se disponível).',
            ]
        },
        ouro: {
            nome: "Pacote Ouro",
            icone: '<i class="fa-solid fa-crown"></i>',
            passos: [
                'Entre em contato com o Concierge pessoal (24/7) para iniciar o planejamento.',
                'Defina suas preferências de experiência exclusiva (ex: voo de balão).',
                'O Concierge cuidará do transfer privativo e de todos os detalhes.',
                'Aproveite um roteiro 100% flexível e ajustável a qualquer momento.',
            ]
        }
    };

    /**
     * Abre o modal e preenche com os dados do plano clicado.
     * @param {string} planoId - O ID do plano (bronze, prata, ouro).
     */
    function abrirModalPlano(planoId) {
        const plano = planosData[planoId];
        if (!plano) return;

        // Elementos do Modal
        const modal = document.getElementById('modal-plano');
        const tituloModal = document.getElementById('titulo-modal-plano');
        const iconeModal = document.getElementById('icone-modal-plano');
        const nomePlanoModal = document.getElementById('nome-plano-modal');
        const listaPassos = document.getElementById('lista-passos-modal');

        // 1. Atualiza o conteúdo
        tituloModal.textContent = plano.nome;
        iconeModal.innerHTML = plano.icone;
        nomePlanoModal.textContent = plano.nome;

        // 2. Limpa e preenche a lista de passos
        listaPassos.innerHTML = '';
        plano.passos.forEach(passo => {
            const li = document.createElement('li');
            li.innerHTML = `<i class="fas fa-check-circle"></i> ${passo}`;
            listaPassos.appendChild(li);
        });

        // 3. Exibe o modal
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    /**
     * Fecha o modal.
     */
    window.fecharModalPlano = function() {
        const modal = document.getElementById('modal-plano');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Fechar o modal ao clicar fora (reutilizando a lógica existente, mas focando no modal-plano)
    window.onclick = function(event) {
        const modal = document.getElementById('modal-plano');
        if (event.target === modal) {
            fecharModalPlano();
        }
    }

    // Fechar o modal com a tecla ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('modal-plano');
            if (modal.style.display === 'flex') {
                fecharModalPlano();
            }
        }
    });