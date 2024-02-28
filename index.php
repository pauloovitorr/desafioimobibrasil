<?php 


include_once('./conexao.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous" defer></script>
    
    <title>Document</title>
</head>
<body>

    <main class="container">
        <div class="corretor">

            <h1>Fale com nosso corretor</h1>

            <div id="frase">
                <p>Encontre sua casa dos sonhos! Dê o primeiro passo para a sua vida nova.</p>
            </div>

            <div class="nome_img">

                <div class="div_img">
                    <img src="./img/correto.png" alt="corretor">
                </div>

                <div class="div_nome">
                    <h2>Rafael Gomes</h2>
                    <p>Corretor</p>
                </div>

            </div>
                
            <p style="margin-top: 10px;">Escolha seu meio de contato. Estou pronto para ouvir !</p>

            <div class="container_icone">
                <h3>Whatsapp</h3>
                <div class="icones">
                    <i class="fa-brands fa-whatsapp"></i>
                    <p>+55 (11) 8888-88888</p>
                </div>
            </div>

            <div class="container_icone">
                <h3>Telefone</h3>
                <div class="icones">
                    <i class="fa-solid fa-phone"></i>
                    <p>+55 (11) 8888-88888</p>
                </div>
            </div>

            <div class="container_icone">
                <h3>Email</h3>
                <div class="icones">
                    <i class="fa-solid fa-envelope"></i>
                    <p>rafaelc@contato.com</p>
                </div>
            </div>
        </div>

        <div class="crud">

            <div class="img_casas">
                <img src="./img/ilustracao-casas.png" alt="desenho de casas">
            </div>

            <div class="div_form">
                
                <form action="" method="post">
                    <div class="div_input">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Seu nome">
                    </div>

                    <div class="div_input">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="contato@exemplo.com">
                    </div>

                    <div class="div_input">
                        <label for="tel">Telefone</label>
                        <input type="text" id="tel" name="tel" placeholder="Seu telefone">
                    </div>

                    <div class="div_input">
                        <label for="msg">Mensagem</label>
                        <textarea name="msg" id="msg" name="msg" cols="25" rows="5" placeholder="Como posso te ajudar"></textarea>
                    </div>

                    <div class="div_input">
                        <input id="btn_enviar" type="submit" name="btn_input" value="Enviar">
                    </div>

                </form>

                <div class="img_aviao">
                    <img src="./img/ilustracao-aviao.png" alt="desenho de casas">
                </div>

            </div>

        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){


            let obj={
                nome: $('#nome').val()
            }
             




            $('#btn_enviar').click(function(){
                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify(obj),
                    success: function(dado){
                        $('#nome').val('sucesso')
                    }
                })
            })
        })
    </script>
</body>
</html>