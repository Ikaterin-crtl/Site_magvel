<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // Configurações do email
    $to = "contato@magvel.com.br"; 
    $subject = "Nova Solicitação de Manutenção";
    $body = "Nome: $name\nEmail: $email\nTelefone: $phone\nServiço: $service\nMensagem: $message";
    $headers = "From: $email";

    // Envio do email
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha ao enviar mensagem.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
