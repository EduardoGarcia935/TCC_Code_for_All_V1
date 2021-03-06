<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Code for All</title>

     <!-- LINKS DAS FONTES USADAS -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">

     <!-- LINK DO CSS -->
    <link rel="stylesheet" href="css/style-home.css">

    <script>
        function aviso(){
            window.alert("O capítulo ainda não está disponível");
        }

        function avisoFeature(){
            window.alert("Alunos não possuem acesso à essa funcionalidade");
        }
    </script>

</head>
<body>
    <header>
        <!-- NAV -->
        <nav>
            <div class="nome-site">
                Code For All
            </div>
            <div class="links-nav">
                <a href="home.php">HOME</a>
                <a href="duvidas.php">DÚVIDAS</a>
                <a href="contato.php">CONTATO</a>
                <a href="respostas.php">RESPOSTAS</a>
                <a href="sair.php">SAIR</a>
            </div>
        </nav>
    </header>
    <main>
        <?php
            $conexao=mysqli_connect("localhost","root","","tcc");

            $idAluno = $_SESSION['id'];

            $nomeAluno = mysqli_query($conexao,"SELECT nome FROM usuarios WHERE id = '$idAluno'");

            $nome = '';
            $email = '';

            while($row_alunos = mysqli_fetch_assoc($nomeAluno)){

                $nome = $row_alunos['nome'];
                
            }

            $emailAluno = mysqli_query($conexao,"SELECT email FROM usuarios WHERE id = '$idAluno'");

            while($row_alunosEmail = mysqli_fetch_assoc($emailAluno)){

                $email = $row_alunosEmail['email'];
                
            }

            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            
        ?>
        <!-- PARTE ESCRITA DA MAIN -->
        <section class="apresentacao">
            <div class="txt-apresentacao">
                <p>Seja bem vindo <span><?php echo $nome ?></span> ao</p>
                <h1>Incrível Mundo da informática</h1>
                <button class="btn1"><a href="#capitulos">Veja os capítulos</a></button>
            </div>
            <!-- IMAGEM DA MAIN -->
            <div class="img-apresentacao">
                <img src="img/home.png" alt="">
            </div>
        </section>
        <!-- SESSÃO DOS CAPÍTULOS -->
        <section class="capitulos" id="capitulos">

            <!-- CARD 1 -->
            <div class="card">
                <div class="card-img">
                    <img src="img/card1.png" alt="" class="img-card-1">
                </div>
                <h2>Capítulo 1</h2>
                <p>Neste capítulo você irá aprender sobre o que é a informática, suas áreas, o que um técnico em infomrática faz e muitos outros conceitos.</p>
                <br><br>
                <a href="capitulo1.html" class="a-1">Acesse já</a>
            </div>

            <!-- CARD 2 -->
            <div class="card">
                <div class="card-img">
                    <img src="img/card2.png" alt="" class="img-card-2">
                </div>
                <h2>Capítulo 2</h2>
                <p>Neste capítulo você irá aprender sobre HTML5 e, dará seu primeiro passo na construção de páginas web.</p>
                <br>
                <br>
                <br>
                <a href="#" class="a-2" onclick="return aviso()">Acesse já</a>
            </div>

            <!-- CARD 3 -->
            <div class="card">
                <div class="card-img">
                    <img src="img/card3.png" alt="" class="img-card-3">
                </div>
                <h2>Capítulo 3</h2>
                <p>Neste capítulo você irá aprender sobre CSS3, uma ferramenta de estilização de HMTL5 e, começará a estilizar suas páginas web.</p>
                <br><br><br>
                <a href="#" class="a-3" onclick="return aviso()">Acesse já</a>
            </div>

            <!-- CARD 4 -->
            <div class="card">
                <div class="card-img">
                    <img src="img/card4.jpeg" alt="" class="img-card-4">
                </div>
                <h2>Em breve</h2>
                <p>A ferramenta Code For All não é estática, isso significa que ela estará sempre se atualizando para entregar conteúdos diversificados para você estudante.</p>
                <br>
                <br>
                <div class="link-container">
                    <a href="#" class="a-4" onclick="return aviso()">Acesse já</a>
                </div>
            </div>
        </section>
    </main>
    <!-- FOOTER DA PÁGINA -->
    <footer>
        <section class="copyright">
        Copyright © 2021 Eduardo Garcia. Todos direitos reservados
            <br>
        </section>
    </footer>
</body>
</html>