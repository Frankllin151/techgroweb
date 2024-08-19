<?php 

require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$emails = filter_var($_POST["emails"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$assunto = filter_var($_POST["assunto"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mensagem = filter_var($_POST["mensagem"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


// Filtra e sanitiza os dados recebidos do formulário
$emails = filter_var($_POST["emails"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$assunto = filter_var($_POST["assunto"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mensagem = filter_var($_POST["mensagem"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Cria uma instância do PHPMailer e habilita exceções
$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Habilita saída de depuração detalhada
    $mail->isSMTP();                                            // Envia usando SMTP
    $mail->Host       = 'smtp.example.com';                     // Define o servidor SMTP para enviar
    $mail->SMTPAuth   = true;                                   // Habilita autenticação SMTP
    $mail->Username   = 'user@example.com';                     // Nome de usuário SMTP
    $mail->Password   = 'secret';                               // Senha SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Habilita criptografia TLS implícita
    $mail->Port       = 465;                                    // Porta TCP para conectar; use 587 se tiver configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Destinatários
    $emailsArray = explode(',', $emails);                       // Divide a string de emails em um array
    foreach ($emailsArray as $email) {
        $mail->addAddress(trim($email));                        // Adiciona cada email como destinatário
    }

    // Conteúdo
    $mail->isHTML(true);                                        // Define o formato do email como HTML
    $mail->Subject = $assunto;                                  // Define o assunto do email
    $mail->Body    = $mensagem;                                 // Define o corpo da mensagem em HTML
    $mail->AltBody = strip_tags($mensagem);                     // Define o corpo alternativo em texto puro

    // Envia o email
    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "A mensagem não pôde ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
}