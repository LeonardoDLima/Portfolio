/*========================= alterna a barra de navegação do ícone ========================================*/
let menuIcon = document.querySelector('#menu-icones');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bi-x');
    navbar.classList.toggle('ativo');
};
/*============================== rolar seleções links ativos =============================================*/
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');
        
        if( top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('ativo')
                document.querySelector('header nav a[href*=' + id + ']').classList.add('ativo');
            });            
        };
    });
/*============================== guardar navbar =============================================*/
    let header = document.querySelector('header');

    header.classList.toggle('guardar', window.scrollY > 100);
/*============ remova o ícone de alternância e navebar ao clicar no link navebar (scroll) =====================*/
    menuIcon.classList.remove('bi-x');
    navbar.classList.remove('ativo');
};
/*============================== Animação das letras =============================================*/
ScrollReveal({
    //reset: true,
    distance: '80px',
    duration: 2000,
    delay: 200
});

ScrollReveal().reveal('.inicio-content, .cabecario', {  origin: 'top'});
ScrollReveal().reveal('.inicio-img, .servicos-container, .portfolio-box, .contato form, #mapid', {  origin: 'bottom'});
ScrollReveal().reveal('.inicio-content h1, .sobre-img, #txtDistancia', {  origin: 'left'});
ScrollReveal().reveal('.inicio-content p, .sobre-content, #distancia', {  origin: 'right'});
/*============================== animação de texto digitado js =============================================*/
const typed =new Typed('.multiple-text', {
    strings: ['Leonardo Duarte de Lima'],
    typeSpeed: 100,
    //backSpeed: 50,
    //backDelay: 1500,
    //loop: true
});

/*============================= botào navegação portfolio =========================*/

const btnProx = document.querySelector(".btnProxFt");
const btnAnte = document.querySelector(".btnAnteFt");
const slider = document.querySelector(".portfolio-slider");

let rotateDeg = 0;
btnAnte.addEventListener('click', () => {
    rotateDeg = rotateDeg + 90;
    slider.style.transform = 'perspective(1000px) rotateX(-9deg) rotateY('+rotateDeg+'deg)';
});
btnProx.addEventListener('click', () => {
    rotateDeg = rotateDeg - 90;
    slider.style.transform = 'perspective(1000px) rotateX(-9deg) rotateY('+rotateDeg+'deg)';
});

/*========================== acionamento por teclado ==============================*/
document.addEventListener("keypress", function (e) {

    if(e.key === "d") {

        const btn2 = document.querySelector("#proximaFoto");

        btn2.click();
    }
    if(e.key === "a") {

        const btn1 = document.querySelector("#fotoAnterior");

        btn1.click();
    }
});

/*========================= Mascara telefone ==================================*/
const identificadorTelefone = (event) => {
    let input = event.target
    input.value = mascaraTelefone(input.value)
  }
  
  const mascaraTelefone = (value) => {
    if (!value) return ""
    value = value
    .replace(/\D/g,'')        // (\D) localiza tudo que não é numero e (g,'') para ser global e substituir por vazil
    .replace(/(\d{2})(\d)/,"($1) $2") 
    .replace(/(\d)(\d{4})$/,"$1-$2")
    return value
  }

  /*======================== envio ===================================*/
  document.getElementById('form-contato').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const nome = form.nome.value.trim();
    const email = form.email.value.trim();
    const telefone = form.telefone.value.trim();
    const assunto = form.assunto.value.trim();
    const mensagem = form.mensagem.value.trim();

    const status = document.getElementById('mensagem-status');
    const loader = document.getElementById('loader');

    if (nome && email && assunto && mensagem) {
        // Mostrar loader
        loader.style.display = 'block';
        status.style.opacity = 0;

        // Simulando envio (2 segundos)
        setTimeout(() => {
            // Ocultar loader
            loader.style.display = 'none';

            // Exibir mensagem de sucesso com fade-in
            status.innerText = 'Mensagem enviada com sucesso!';
            status.style.color = 'green';
            status.classList.add('fade');

            // Salvar no localStorage
            salvarMensagemLocal(nome, email, telefone, assunto, mensagem);

            // Limpar formulário
            form.reset();

            // Ocultar mensagem após 3 segundos (fade-out)
            setTimeout(() => {
                status.classList.remove('fade');
            }, 3000);

        }, 2000);
    } else {
        status.innerText = 'Por favor, preencha todos os campos obrigatórios.';
        status.style.color = 'red';
        status.classList.add('fade');

        setTimeout(() => {
            status.classList.remove('fade');
        }, 3000);
    }
});

// Função para salvar a mensagem no localStorage
function salvarMensagemLocal(nome, email, telefone, assunto, mensagem) {
    const mensagensSalvas = JSON.parse(localStorage.getItem('mensagens')) || [];

    const novaMensagem = {
        nome: nome,
        email: email,
        telefone: telefone,
        assunto: assunto,
        mensagem: mensagem,
        data: new Date().toLocaleString()
    };

    mensagensSalvas.push(novaMensagem);
    localStorage.setItem('mensagens', JSON.stringify(mensagensSalvas));
}