// 1. Seleção dos elementos HTML
    const form = document.getElementById('itinerary-form');
    const submitButton = document.getElementById('generate-button');
    const loadingSpinner = document.getElementById('loading-spinner');
    const resultDiv = document.getElementById('itinerary-result');
    const buttonText = document.getElementById('button-text');
    
    // Verifica se o formulário foi encontrado antes de continuar
    if (form) {
        // --- 2. Adiciona um "escutador" de evento de submissão ao formulário ---
        form.addEventListener('submit', function(event) {
            
            // 3. Impede o comportamento padrão de recarregar a página
            event.preventDefault(); 
            
            // 4. Inicia a simulação
            simulateItineraryGeneration();
        });
    }

    // Função que simula o envio do formulário
    function simulateItineraryGeneration() {
        
        // Esconde o botão e mostra o spinner
        submitButton.classList.add('hidden');
        loadingSpinner.classList.remove('hidden');
        resultDiv.classList.add('hidden'); // Garante que o resultado anterior está escondido

        // Simula o tempo de processamento da IA (3 segundos)
        setTimeout(() => {
            
            // 1. Esconde o spinner
            loadingSpinner.classList.add('hidden');
            
            // 2. Mostra a mensagem de resultado
            resultDiv.classList.remove('hidden');
            
            // 3. Volta o botão ao normal
            submitButton.classList.remove('hidden');

            // 4. (Opcional, mas útil) Limpa o formulário
            form.reset();

        }, 3000); // O valor 3000 representa 3000 milissegundos (3 segundos)
    }


// ARQUIVO: passeios-lazer.js
// Script específico para a página Passeios & Lazer


// 2. FORÇA OVERLAY PRETO NAS IMAGENS - VERSÃO ULTRA AGRESSIVA

function forceBlackOverlayAggressively() {
    const styleId = 'ultra-force-black-overlay';
    
    // Remove estilo anterior se existir
    const oldStyle = document.getElementById(styleId);
    if (oldStyle) oldStyle.remove();
    
    const style = document.createElement('style');
    style.id = styleId;
    style.textContent = `
        /* FORÇA overlay preto com máxima prioridade */
        .card-hover-efeito::after {
            content: '' !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background-color: rgba(0, 0, 0, 0.5) !important;
            transition: background-color 0.4s ease !important;
            z-index: 1 !important;
        }
        
        .card-hover-efeito:hover::after {
            background-color: rgba(0, 0, 0, 0.7) !important;
        }
        
        /* Remove qualquer outro overlay colorido */
        .item-inspira::after,
        .div-separa::after {
            background: rgba(0, 0, 0, 0.5) !important;
        }
        
        .item-inspira:hover::after,
        .div-separa:hover::after {
            background: rgba(0, 0, 0, 0.7) !important;
        }
    `;
    document.head.appendChild(style);
}

// Executa IMEDIATAMENTE
forceBlackOverlayAggressively();

// Executa novamente após tudo carregar
window.addEventListener('load', forceBlackOverlayAggressively);

// Executa quando o Tailwind terminar de carregar
setTimeout(forceBlackOverlayAggressively, 100);
setTimeout(forceBlackOverlayAggressively, 500);
setTimeout(forceBlackOverlayAggressively, 1000);

// 3. LÓGICA DO FORMULÁRIO DE ROTEIRO

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('itinerary-form');
    const loading = document.getElementById('loading-spinner');
    const result = document.getElementById('itinerary-result');
    
    // Garante que loading e resultado estejam ocultos ao carregar
    if (loading) loading.style.display = 'none';
    if (result) result.style.display = 'none';
    
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const button = document.getElementById('generate-button');
            const buttonText = document.getElementById('button-text');
            
            // Coleta dos dados do formulário
            const data = {
                originCity: document.getElementById('origin-city').value,
                destination: document.getElementById('destination').value,
                duration: document.getElementById('duration').value,
                budget: document.getElementById('budget').value,
                travelers: document.getElementById('travelers').value,
                preferences: document.getElementById('preferences').value,
            };

            // Validação básica
            if (!data.originCity || !data.destination) {
                alert('Por favor, preencha a cidade de origem e o destino.');
                return;
            }

            // Estado de Carregamento
            button.disabled = true;
            button.style.opacity = '0.5';
            button.style.cursor = 'not-allowed';
            loading.style.display = 'block';
            result.style.display = 'none';
            buttonText.textContent = 'Processando...';

            // Simulação de chamada de API (3 segundos)
            await new Promise(resolve => setTimeout(resolve, 3000));

            // Reverte o estado e mostra resultado
            loading.style.display = 'none';
            result.style.display = 'block';
            button.disabled = false;
            button.style.opacity = '1';
            button.style.cursor = 'pointer';
            buttonText.textContent = 'Gerar Roteiro Personalizado';
            
            // Scroll suave até o resultado
            setTimeout(() => {
                result.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        });
    }
});


// 4. ANIMAÇÃO DO HEADER AO SCROLL

let lastScroll = 0;
const header = document.querySelector('.header-principal');

if (header) {
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        // Adiciona sombra ao header quando scrollar
        if (currentScroll > 50) {
            header.style.boxShadow = '0 4px 10x rgba(0, 0, 0, 0.1)';
        } else {
            header.style.boxShadow = 'none';
        }
        
        lastScroll = currentScroll;
    });
}


// 5. ANIMAÇÕES DOS CARDS DE INSPIRAÇÃO
const observerOptions = {
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
};

const animateOnScroll = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Aplica animação aos cards de inspiração
document.addEventListener('DOMContentLoaded', () => {
    const inspiracaoCards = document.querySelectorAll('.item-inspira');
    
    inspiracaoCards.forEach((card, index) => {
        // Estado inicial
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        card.style.transitionDelay = `${index * 0.1}s`;
        
        // Observa para animar
        animateOnScroll.observe(card);
    });

    // Animação do card principal "Por que escolher"
    const mainCard = document.querySelector('.centro-conteudo .card');
    if (mainCard) {
        mainCard.style.opacity = '0';
        mainCard.style.transform = 'translateY(30px)';
        mainCard.style.transition = 'all 0.8s ease';
        animateOnScroll.observe(mainCard);
    }

    // Animação do formulário
    const formCard = document.querySelector('.card-tailwind');
    if (formCard) {
        formCard.style.opacity = '0';
        formCard.style.transform = 'translateY(30px)';
        formCard.style.transition = 'all 0.8s ease';
        formCard.style.transitionDelay = '0.2s';
        animateOnScroll.observe(formCard);
    }
});


// 6. ANIMAÇÕES DA SEÇÃO HERO AO CARREGAR

document.addEventListener('DOMContentLoaded', () => {
    const heroSection = document.querySelector('.secao-hero');
    const heroTitle = document.querySelector('.titulo-pagina');
    const heroDescription = document.querySelector('.descricao-hero');
    
    // Animação do título
    if (heroTitle) {
        heroTitle.style.opacity = '0';
        heroTitle.style.transform = 'translateY(-50px)';
        heroTitle.style.transition = 'all 1s ease';
        
        setTimeout(() => {
            heroTitle.style.opacity = '1';
            heroTitle.style.transform = 'translateY(0)';
        }, 300);
    }
    
    // Animação da descrição
    if (heroDescription) {
        heroDescription.style.opacity = '0';
        heroDescription.style.transform = 'translateY(30px)';
        heroDescription.style.transition = 'all 1s ease';
        
        setTimeout(() => {
            heroDescription.style.opacity = '1';
            heroDescription.style.transform = 'translateY(0)';
        }, 600);
    }
    
    // Efeito parallax no scroll
    if (heroSection) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxSpeed = 0.5;
            heroSection.style.backgroundPositionY = `${scrolled * parallaxSpeed}px`;
        });
    }
});


// 7. FUNÇÃO PARA O BOTÃO SAIR (LOGOUT)

document.addEventListener('DOMContentLoaded', () => {
    const logoutButton = document.querySelector('.btn-sair');
    
    if (logoutButton) {
        logoutButton.addEventListener('click', function(e) {
            e.preventDefault(); // Previne o link de agir, se houver
            
            // 1. Confirmação
            const isConfirmed = confirm('Tem certeza que deseja sair?');
            
            if (isConfirmed) {
                // 2. Simulação de limpeza de sessão/usuário
                const userNameElement = document.querySelector('.texto-ola');
                if (userNameElement) {
                    userNameElement.textContent = 'Visitante';
                }
                
                // 3. Feedback visual
                alert('Você saiu da sua conta. Redirecionando para a Home.');
                
                // 4. Simulação de Redirecionamento (Volta para a home.html)
                // Usamos 100ms para o usuário ler o alert
                setTimeout(() => {
                    window.location.href = '../home.html'; 
                }, 100); 
            }
        });
    }
});

// 8. SMOOTH SCROLL PARA LINKS INTERNOS

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href !== '#' && href !== '') {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                const headerOffset = 100;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }
    });
});


// 9. GERENCIAMENTO DE DROPDOWNS

document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('.dropdown-menu');
    
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const content = dropdown.querySelector('.dropdown-conteudo');
        
        if (toggle && content) {
            // Previne o comportamento padrão do link
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
            });
            
            // Fecha outros dropdowns ao abrir um
            dropdown.addEventListener('mouseenter', () => {
                dropdowns.forEach(other => {
                    if (other !== dropdown) {
                        const otherContent = other.querySelector('.dropdown-conteudo');
                        if (otherContent) {
                            otherContent.style.display = 'none';
                        }
                    }
                });
            });
        }
    });
});


// 10. ANIMAÇÃO DE HOVER NOS BOTÕES COM BRILHO

document.addEventListener('DOMContentLoaded', () => {
    const gradientButton = document.querySelector('.gradient-button');
    
    if (gradientButton) {
        // Adiciona efeito de brilho no hover
        gradientButton.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.transition = 'all 0.3s ease';
            this.style.boxShadow = '0 0 25px rgba(30, 64, 175, 0.7), 0 0 50px rgba(16, 185, 129, 0.5), 0 8px 20px rgba(0, 0, 0, 0.2)';
            this.style.filter = 'brightness(1.15)';
        });
        
        gradientButton.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
            this.style.filter = 'brightness(1)';
        });
        
        // Efeito de pulse ao clicar
        gradientButton.addEventListener('click', function() {
            this.style.animation = 'pulse 0.5s ease';
            setTimeout(() => {
                this.style.animation = '';
            }, 500);
        });
    }
    
    // Animação para outros botões
    const otherButtons = document.querySelectorAll('.btn-sair');
    otherButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});


// 11. VALIDAÇÃO E FORMATAÇÃO DOS INPUTS

document.addEventListener('DOMContentLoaded', () => {
    // Limita o número de dias e viajantes
    const durationInput = document.getElementById('duration');
    const travelersInput = document.getElementById('travelers');
    
    if (durationInput) {
        durationInput.addEventListener('input', function() {
            if (this.value > 365) this.value = 365;
            if (this.value < 1) this.value = 1;
        });
    }
    
    if (travelersInput) {
        travelersInput.addEventListener('input', function() {
            if (this.value > 50) this.value = 50;
            if (this.value < 1) this.value = 1;
        });
    }
});

// 12. MENSAGEM DE BOAS-VINDAS

window.addEventListener('load', () => {
    const userGreeting = document.querySelector('.texto-ola');
    if (userGreeting) {
        // Animação suave de entrada
        userGreeting.style.opacity = '0';
        setTimeout(() => {
            userGreeting.style.transition = 'opacity 0.5s ease';
            userGreeting.style.opacity = '1';
        }, 500);
    }
});

// 13. ACESSIBILIDADE - NAVEGAÇÃO POR TECLADO

document.addEventListener('keydown', (e) => {
    // Fecha dropdowns com ESC
    if (e.key === 'Escape') {
        const dropdownContents = document.querySelectorAll('.dropdown-conteudo');
        dropdownContents.forEach(content => {
            content.style.display = 'none';
        });
    }
});

// 14. BOTÃO VOLTAR AO TOPO

function createBackToTopButton() {
    // Remove botão existente se houver
    const existingButton = document.getElementById('back-to-top');
    if (existingButton) {
        existingButton.remove();
    }
    
    const button = document.createElement('button');
    button.id = 'back-to-top';
    button.innerHTML = '<i class="fas fa-arrow-up"></i>';
    button.title = 'Voltar ao topo';
    button.setAttribute('aria-label', 'Voltar ao topo da página');
    
    // Estilos inline para garantir que funcione
    button.style.position = 'fixed';
    button.style.bottom = '30px';
    button.style.right = '30px';
    button.style.width = '55px';
    button.style.height = '55px';
    button.style.background = 'linear-gradient(135deg, #1e40af, #10b981)';
    button.style.color = 'white';
    button.style.border = 'none';
    button.style.borderRadius = '50%';
    button.style.fontSize = '22px';
    button.style.cursor = 'pointer';
    button.style.opacity = '0';
    button.style.visibility = 'hidden';
    button.style.transition = 'all 0.4s ease';
    button.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.3)';
    button.style.zIndex = '9999';
    button.style.display = 'flex';
    button.style.alignItems = 'center';
    button.style.justifyContent = 'center';
    
    document.body.appendChild(button);
    
    // Mostra/esconde o botão baseado no scroll
    function handleScroll() {
        if (window.pageYOffset > 300) {
            button.style.opacity = '1';
            button.style.visibility = 'visible';
        } else {
            button.style.opacity = '0';
            button.style.visibility = 'hidden';
        }
    }
    
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Chama uma vez para verificar posição inicial
    
    // Efeito de hover com brilho intenso
    button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-8px) scale(1.15)';
        this.style.boxShadow = '0 0 30px rgba(30, 64, 175, 0.8), 0 0 60px rgba(16, 185, 129, 0.6), 0 8px 25px rgba(0, 0, 0, 0.3)';
        this.style.filter = 'brightness(1.2)';
    });
    
    button.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
        this.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.3)';
        this.style.filter = 'brightness(1)';
    });
    
    // Efeito ao clicar
    button.addEventListener('click', function() {
        this.style.transform = 'scale(0.9)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 150);
        
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Cria o botão em múltiplos momentos para garantir que funcione
document.addEventListener('DOMContentLoaded', createBackToTopButton);
window.addEventListener('load', createBackToTopButton);

// Fallback: cria após 1 segundo se ainda não existir
setTimeout(() => {
    if (!document.getElementById('back-to-top')) {
        createBackToTopButton();
    }
}, 1000);

// 15. ADICIONA ANIMAÇÕES CSS

const addAnimationStyles = () => {
    const styleId = 'animation-styles';
    
    // Remove estilo anterior se existir
    const oldStyle = document.getElementById(styleId);
    if (oldStyle) oldStyle.remove();
    
    const style = document.createElement('style');
    style.id = styleId;
    style.textContent = `
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(0.95); }
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        /* Animação do overlay do hero */
        .secao-hero::before {
            animation: fadeIn 1.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
};




// Chama a função principal quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', initializePage);

// Chama funções globais que devem rodar imediatamente
forceBlackOverlayAggressively();
addAnimationStyles();
// createBackToTopButton() é chamada no load/DOMContentLoaded, então não precisa aqui.



// Adiciona os estilos
addAnimationStyles();

console.log('✈️ Script Passeios & Lazer carregado com sucesso!');
