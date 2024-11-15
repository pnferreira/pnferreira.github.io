<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Verifica se os campos estão preenchidos
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Configurações do e-mail
        $to = "poliana.nferreira@gmail.com"; // Substitua pelo seu endereço de e-mail
        $subject = "Novo Contato do Site";
        $body = "Nome: $name\nEmail: $email\nMensagem:\n$message";
        $headers = "From: $email";

        // Enviar o e-mail
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a mensagem. Tente novamente mais tarde.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Método inválido.";
}
?>
