<?php
// Recebe os dados do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $mensagem = $_POST['message'];

    // Dados para os dois números de WhatsApp
    $whatsapp1 = '55<numero_do_whatsapp_1>'; // Substitua pelo número real
    $whatsapp2 = '55<numero_do_whatsapp_2>'; // Substitua pelo número real

    // Monta a mensagem
    $texto = "Novo pedido de manutenção:\n\n";
    $texto .= "Nome: $nome\n";
    $texto .= "E-mail: $email\n";
    $texto .= "Telefone: $telefone\n";
    $texto .= "Mensagem: $mensagem\n";

    // URL da API do WhatsApp (exemplo com Twilio)
    $apiUrl = 'https://api.twilio.com/2010-04-01/Accounts/<ACCOUNT_SID>/Messages.json'; // Substitua <ACCOUNT_SID> e <AUTH_TOKEN>
    $accountSid = '<ACCOUNT_SID>'; // Substitua com seu SID
    $authToken = '<AUTH_TOKEN>'; // Substitua com seu token

    // Envia mensagem para o primeiro número
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'To' => 'whatsapp:' . $whatsapp1,
        'From' => 'whatsapp:<seu_numero_twilio>', // Substitua pelo número do Twilio
        'Body' => $texto
    ]));
    curl_setopt($ch, CURLOPT_USERPWD, $accountSid . ':' . $authToken);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Erro: ' . curl_error($ch);
    }
    curl_close($ch);

    // Envia mensagem para o segundo número
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'To' => 'whatsapp:' . $whatsapp2,
        'From' => 'whatsapp:<seu_numero_twilio>', // Substitua pelo número do Twilio
        'Body' => $texto
    ]));
    curl_setopt($ch, CURLOPT_USERPWD, $accountSid . ':' . $authToken);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Erro: ' . curl_error($ch);
    }
    curl_close($ch);

    echo "Formulário enviado com sucesso!";
} else {
    echo "Método de requisição inválido.";
}
?>
