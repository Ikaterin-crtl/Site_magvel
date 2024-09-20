<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $service = htmlspecialchars(trim($_POST['service']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validações básicas
    if (empty($name) || empty($email) || empty($service) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Preencha todos os campos corretamente.";
        exit;
    }

    // Configurações do e-mail
    $to = "contato@magvel.com.br";
    $subject = "Nova Solicitação de Manutenção de: $name";
    $body = "Nome: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Telefone: $phone\n";
    $body .= "Serviço: $service\n";
    $body .= "Mensagem: $message\n";

    // Cabeçalhos do e-mail
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente mais tarde.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
