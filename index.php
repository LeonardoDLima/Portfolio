<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifólio | Leonardo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/assets/bootstrap-icons/fonts/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

</head>
<body>
    <header class="header">
        <a href="#" class="logo">Portifólio</a>

        <i class="bi bi-list" id="menu-icones"></i>

        <nav class="navbar">
            <a href="#inicio" class="ativo">Inicio</a>
            <a href="#sobre">Sobre</a>
            <a href="#servicos">Serviços</a>
            <a href="#portifolio">Portifólio</a>
            <a href="#contato">Contato</a>
            
        </nav>
    </header>
        <section class="inicio" id="inicio">
            <div class="inicio-content">
                <h3>Olá, Eu sou</h3>
                <h1><span class="multiple-text"></h1>
                <h3>E eu sou estudante de Engenharia de Software!</span></h3>
                <p>Uma mente que se abre a uma nova ideia, jamais voltará ao seu tamanho original. 
"Albert Einstein"</p>
                <div class="midia-social">
                    <a href="https://www.facebook.com/leonardo.duartedelima.1"><i class="bi bi-facebook"></i></a>
                    <a href="https://x.com/LeoDuarteLima"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.instagram.com/leoduartel/"><i class="bi bi-instagram"></i></a>
                </div>
                <a href="#" class="btn">Download CV</a>
            </div>

            <div class="inicio-img">
                <img src="imagens/foto perfil3.png" alt="">
            </div>
        </section>

        <section class="sobre" id="sobre">
            <div class="sobre-img">
                <img src="imagens/ponto interrogacao verde.png" alt="">
            </div>
            <div class="sobre-content">
                <h2 class="cabecario">Sobre <span>Mim</span></h2>
                <h3>Grande sonhador!</h3>
                <p>Uma pessoa dedicada e batalhadora, sempre procurando melhorar minhas habilidades para ser um bom profissional, rapido para aprender novas habilidades e muito focado, sou bem sociavel e não meço esforços para atingir meus objetivos.</p>
                <a href="#" class="btn">Consulte Mais informação</a>
            </div>
        </section>

        <section class="servicos" id="servicos">
            <h2 class="cabecario">Meus <span>serviços</span></h2>
            
            <div class="servicos-container">
                <div class="servicos-box">
                    <i class="bi bi-filetype-php"></i>
                    <h3>PHP</h3>
                    <p>texto aqui</p>
                </div>
        
                <div class="servicos-box">
                    <i class="bi bi-filetype-css"></i>
                    <h3>CSS</h3>
                    <p>texto aqui</p>
                </div>
        
                <div class="servicos-box">
                    <i class="bi bi-filetype-js"></i>
                    <h3>JAVASCRIPT</h3>
                    <p>texto aqui</p>
                </div>
            </div>            
        </section>

        <section class="portifolio" id="portifolio">
            <h2 class="cabecario">Projetos <span>mais recente</span></h2>

            <div class="portifolio-banner">

                <div class="portifolio-slider" style="--quantity: 4">
                    <div class="item" style="--position: 1">
                        <a href="minigame/pacman.html"><img src="imagens/portifolio1.png" alt=""></a>
                    </div>
                    <div class="item" style="--position: 2">
                    <a href="portifolio02.php"><img src="imagens/portifolio2.png" alt=""></a>
                    </div>
                    <div class="item" style="--position: 3">
                        <img src="imagens/portifolio3.png" alt="">
                    </div>
                    <div class="item" style="--position: 4">
                        <img src="imagens/portifolio4.png" alt="">
                    </div>
                </div>
            </div>
            <div class="bataoFoto">
                <button class="btnAnteFt" id="fotoAnterior"><i class="bi bi-arrow-left-circle-fill"></i>  Anterior</button>
                <button class="btnProxFt" id="proximaFoto" >Proximo  <i class="bi bi-arrow-right-circle-fill"></i></button>
            </div>
        </section>

        <section class="contato" id="contato">
            <h2 class="cabecario">Meu <span>contato!</span></h2>

            <form action="envio.php" method="POST">
                <div class="input-box">
                    <input type="text" placeholder="Seu nome" name="nome">
                    <input type="email" placeholder="Seu Email" name="email">
                </div>
                <div class="input-box">
                    <input type='tel' placeholder="Telefone" maxlength="15" onkeyup="identificadorTelefone(event)">            
                    <input type="text" placeholder="Assunto do Email">
                </div>
                <textarea name="mensagem" id="" cols="30" rows="10" placeholder="Sua mensagem"></textarea>
                <input type="submit" value="Enviar mensagem" class="btn" name="enviar">
            </form>

        </section>

        <footer class="rodape">
            <div class="texto-rodape">
                <p>Copyright &copy; 2024 by Leonardo Duarte de Lima | All Rights Reserved.</p>
            </div>
            <div class="rodape-iconTop">
                <a href="#inicio"><i class="bi bi-caret-up-fill"></i></a>
            </div>
        </footer>
      
</body>
</html>

<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script> 
<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
<script src="typed.js@2.0.12.js"></script>
<script src="scrollreveal.js"></script>
<script src="script.js"> </script>

