<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        
        $(document).ready(function(){

            // Inicio das validações
           
            $('#nome').on('input',()=>{
                let nome = $('#nome').val()
                let mascaraNome = /^\D+$/
              
                if(mascaraNome.test(nome)){
                    $('#nome').removeClass('vermelho')
                }else{
                    $('#nome').addClass('vermelho')
                }
            })

            $('#email').on('blur',()=>{
                let email = $('#email').val()
                let mascaraEmail = /^[a-zA-Z0-9._-]+@[a-z]+\.[a-z]{2,}$/;

                if(mascaraEmail.test(email)){
                    $('#email').removeClass('vermelho')
                }else{
                    $('#email').addClass('vermelho')
                }
            })
            $('#tel').mask('(99)99999-9999');
            $('#tel').on('blur',()=>{
                let tamanho  =  $('#tel').val()

                if(tamanho.length <= 13){
                    $('#tel').addClass('vermelho')
                }else{
                    $('#tel').removeClass('vermelho')
                }
            })

            // Fim das validações

            $('#btn_enviar').click((event)=>{
                event.preventDefault()

                if($('.vermelho').length === 0){

                    $.ajax({
                    url: 'requisicoes.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        nome: $('#nome').val(),
                        tel:$('#tel').val(),
                        msg: $('#msg').val(),
                        email: $('#email').val()
                    },
                    success: function(res){
                        
                        if(res.success){
                            Swal.fire({
                                title: 'Sucesso!',
                                text: res.message,
                                icon: 'success',
                                confirmButtonText: 'Confirmar'
                                })
                               $('#nome').val(''),
                               $('#tel').val(''),
                               $('#msg').val(''),
                               $('#email').val('')
                        }else{
                            Swal.fire({
                                title: 'Error!',
                                text: res.message,
                                icon: 'error',
                                confirmButtonText: 'Fechar'
                                })
                        }
                    },
                    error: function(res){
                        Swal.fire({
                                title: 'Error!',
                                text: res.message,
                                icon: 'error',
                                confirmButtonText: 'Fechar'
                                })
                    },
                })
                }else{
                    Swal.fire({
                                title: 'Error!',
                                text: 'Preencha todos os campos com dados válidos',
                                icon: 'error',
                                confirmButtonText: 'Fechar'
                                })
                                $('.vermelho').val('')
                }
            })

        })
    </script>
  
    
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
                
                <form action="">
                    <div class="div_input">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" maxlength=120 placeholder="Seu nome" required>
                    </div>

                    <div class="div_input">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" maxlength=100 placeholder="contato@exemplo.com" required>
                    </div>

                    <div class="div_input">
                        <label for="tel">Telefone</label>
                        <input type="text" id="tel" name="tel" placeholder="Seu telefone" required>
                    </div>

                    <div class="div_input">
                        <label for="msg">Mensagem</label>
                        <textarea name="msg" id="msg" name="msg" cols="25" rows="5" maxlength=250 placeholder="Como posso te ajudar" required></textarea>
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

        <p id="oi"></p>
    </main>


</body>
</html>