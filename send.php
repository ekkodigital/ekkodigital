<?php

$data = [
    'status' => ''
];

//Variaveis de POST, Alterar somente se necessário 
//====================================================
$nome = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['telephone']; 
$assunto = $_POST['subject']; 
$mensagem = $_POST['mensagem'];
//====================================================

//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
//==================================================== 
$email_remetente = "contato@ekko.digital"; // deve ser uma conta de email do seu dominio 
//====================================================

//Configurações do email, ajustar conforme necessidade
//==================================================== 
$email_destinatario = "contato@ekko.digital"; // pode ser qualquer email que receberá as mensagens
$email_reply = "$email"; 
$email_assunto = $assunto; // Este será o assunto da mensagem
//====================================================

//Monta o Corpo da Mensagem
//====================================================
$email_conteudo = "Nome = $nome \n"; 
$email_conteudo .= "Email = $email \n";
$email_conteudo .= "Telefone = $telefone \n";
$email_conteudo .= "Assunto = $assunto \n"; 
$email_conteudo .= "Mensagem = $mensagem \n"; 
//====================================================

//Seta os Headers (Alterar somente caso necessario) 
//==================================================== 
$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
//====================================================

//Enviando o email 
//==================================================== 
if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
    $data['status'] = 200;
    echo json_encode($data);
}else{
    $data['status'] = 404;
    echo json_encode($data);
}