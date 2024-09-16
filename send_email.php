<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    $to = 'destinatario1@example.com, destinatario2@example.com'; // Substitua pelos e-mails dos destinatários
    $subject = 'Novo Formulário Recebido';
    $body = "Novo formulário recebido:\n\nNome: $name\nEmail: $email\nTelefone: $phone\nServiço de Interesse: $service\nMensagem: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo 'E-mail enviado com sucesso!';
    } else {
        echo 'Erro ao enviar o e-mail.';
    }
}
?>
