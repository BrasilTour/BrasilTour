// ARQUIVO: ../js/script.js

// ------------------------------------
// 1. FUNÇÕES DO ALERTA CUSTOMIZADO
// ------------------------------------

/**
 * Exibe uma caixa de diálogo customizada.
 * @param {string} title - O título da mensagem.
 * @param {string} text - O texto detalhado da mensagem.
 */
function showMessage(title, text) {
    const messageBox = document.getElementById('message-box');
    document.getElementById('message-title').textContent = title;
    document.getElementById('message-text').textContent = text;
    messageBox.classList.remove('hidden');
    messageBox.classList.add('flex');
}

/**
 * Fecha a caixa de diálogo customizada.
 */
window.closeMessage = function() {
    const messageBox = document.getElementById('message-box');
    messageBox.classList.add('hidden');
    messageBox.classList.remove('flex');
}

// ------------------------------------
// 2. LÓGICA DO FORMULÁRIO DE ROTEIRO
// ------------------------------------

document.getElementById('itinerary-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const button = document.getElementById('generate-button');
    const loading = document.getElementById('loading-spinner');
    const result = document.getElementById('itinerary-result');
    
    // Coleta dos dados (opcional, mas bom para simulação)
    const data = {
        originCity: document.getElementById('origin-city').value,
        destination: document.getElementById('destination').value,
        duration: document.getElementById('duration').value,
        budget: document.getElementById('budget').value,
        travelers: document.getElementById('travelers').value,
        preferences: document.getElementById('preferences').value,
    };

    // 2. Estado de Carregamento
    button.disabled = true;
    button.classList.add('opacity-50');
    loading.classList.remove('hidden');
    result.classList.add('hidden');
    document.getElementById('button-text').textContent = 'Processando...';

    // --- SIMULAÇÃO DE DELAY (3 SEGUNDOS) para a chamada da IA ---
    await new Promise(resolve => setTimeout(resolve, 3000));
    // --- FIM DA SIMULAÇÃO ---

    // 3. Reverte o estado de carregamento e mostra o resultado
    loading.classList.add('hidden');
    result.classList.remove('hidden');
    button.disabled = false;
    button.classList.remove('opacity-50');
    document.getElementById('button-text').textContent = 'Gerar Roteiro Personalizado';
    
    // Exibir feedback ao usuário
    showMessage("Sucesso!", "Seu roteiro mágico foi gerado com base nas suas preferências! Verifique a seção de resultados.");
});

// Função para abrir o modal
function abrirModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
    document.body.style.overflow = 'hidden';
}

// Função para fechar o modal
function fecharModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Fechar o modal se o usuário clicar fora dele
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
}

// Fechar o modal com a tecla ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            if (modal.style.display === 'block') {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    }
});

const botoesPlano = document.querySelectorAll('.botao-plano');
const modal = document.getElementById('modal-plano');
const tituloModal = document.getElementById('titulo-modal-plano');

botoesPlano.forEach(botao => {
    botao.addEventListener('click', () => {
        const plano = botao.parentElement.querySelector('.titulo-plano').textContent;
        tituloModal.textContent = plano + " - Instruções";
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });
});

// Fechar modal
function fecharModalPlano() {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Fecha ao clicar fora
window.onclick = function(e) {
    if (e.target === modal) fecharModalPlano();
}

// ------------------------------------
// 3. ANIMAÇÕES AO SCROLL (INTERSECTION OBSERVER)
// ------------------------------------

// Observer para animações de fade-in ao scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const animateOnScroll = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-visible');
        }
    });
}, observerOptions);

// Adiciona classe de animação aos elementos quando a página carrega
document.addEventListener('DOMContentLoaded', () => {
    // Elementos que devem ter animação de fade-in
    const fadeElements = document.querySelectorAll(
        '.card-experiencia, .card-pacote, .card-depoimento, .box-vantagem, .box-img, .stat-item'
    );
    
    fadeElements.forEach(el => {
        el.classList.add('animate-on-scroll');
        animateOnScroll.observe(el);
    });

    // Animação especial para cards em sequência
    const experienciaCards = document.querySelectorAll('.card-experiencia');
    experienciaCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    const pacoteCards = document.querySelectorAll('.card-pacote');
    pacoteCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.15}s`;
    });

    const depoimentoCards = document.querySelectorAll('.card-depoimento');
    depoimentoCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
});

// ------------------------------------
// 4. ANIMAÇÃO DO HEADER AO SCROLL
// ------------------------------------

let lastScroll = 0;
const header = document.querySelector('.header-principal');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    // Adiciona sombra ao header quando scrollar
    if (currentScroll > 50) {
        header.classList.add('header-scrolled');
    } else {
        header.classList.remove('header-scrolled');
    }
    
    lastScroll = currentScroll;
});

// ------------------------------------
// 5. CONTADOR ANIMADO DAS ESTATÍSTICAS
// ------------------------------------

function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + '+';
        }
    }, 16);
}

// Observer para iniciar contadores quando visíveis
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
            entry.target.classList.add('counted');
            const text = entry.target.textContent;
            const number = parseInt(text.replace(/\D/g, ''));
            
            if (text.includes('k')) {
                animateCounter(entry.target, number, 2000);
            } else if (text.includes('.')) {
                entry.target.textContent = '0.0';
                let count = 0;
                const timer = setInterval(() => {
                    count += 0.1;
                    if (count >= 5.0) {
                        entry.target.textContent = '5.0';
                        clearInterval(timer);
                    } else {
                        entry.target.textContent = count.toFixed(1);
                    }
                }, 40);
            } else {
                animateCounter(entry.target, number, 2000);
            }
        }
    });
}, { threshold: 0.5 });

document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.stat-numero');
    counters.forEach(counter => counterObserver.observe(counter));
});

// ------------------------------------
// 6. SMOOTH SCROLL PARA LINKS INTERNOS
// ------------------------------------

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href !== '#' && href !== '') {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                const headerOffset = 80;
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

// ------------------------------------
// 7. ANIMAÇÃO DE HOVER NOS BOTÕES
// ------------------------------------

document.querySelectorAll('.btn-principal, .btn-card, .btn-detalhes').forEach(button => {
    button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
    });
    
    button.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});