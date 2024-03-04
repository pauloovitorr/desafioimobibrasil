<?php 

include_once('./conexao.php');


if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nome'] && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['msg']) )){
   $nome = $conexao->escape_string($_POST['nome']);
   $email = $conexao->escape_string($_POST['email']);
   $tel = $conexao->escape_string($_POST['tel']);
   $msg = $conexao->escape_string($_POST['msg']);

   $sql = 'INSERT INTO clientes(nome,tel,msg,email) VALUES (?,?,?,?)';

   $comando = $conexao->prepare($sql);
   $comando->bind_param('ssss', $nome,$tel,$msg,$email);
   $comando->execute();

   if ($comando->error) {
      $response = array('success' => false, 'message' => 'Erro ao inserir dados no banco: ' . $comando->error);
  } else {
      $response = array('success' => true, 'message' => 'Mensagem enviada ao corretor');
  }
  
    echo json_encode($response);
}
else{
    $response = array('success' => false, 'message' => 'Preencha todos os campos do formulário');
    echo json_encode($response);
}

?>