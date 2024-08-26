<?php 

require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Filtra e sanitiza os dados recebidos do formulário
$emails = filter_var($_POST["emails"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$assunto = filter_var($_POST["assunto"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mensagem = filter_var($_POST["mensagem"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Cria uma instância do PHPMailer e habilita exceções
$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                         // Desabilita saída de depuração detalhada
    $mail->isSMTP();                                            // Envia usando SMTP
    $mail->Host       = 'smtp.hostinger.com';                   // Define o servidor SMTP da Hostinger
    $mail->SMTPAuth   = true;                                   // Habilita autenticação SMTP
    $mail->Username   = 'seu-email@seudominio.com';             // Nome de usuário SMTP
    $mail->Password   = 'sua-senha';                            // Senha SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilita criptografia TLS
    $mail->Port       = 587;                                    // Porta TCP para conectar (TLS)

    // Divide a string de emails em um array e envia um por um
    $emailsArray = explode(',', $emails);                       // Divide a string de emails em um array
    foreach ($emailsArray as $email) {
        $mail->addAddress(trim($email));                        // Adiciona cada email como destinatário

        // Conteúdo do email
        $mail->isHTML(true);                                    // Define o formato do email como HTML
        $mail->Subject = $assunto;                              // Define o assunto do email
        $mail->Body    = "<html>" . $mensagem .  "</html>";                             // Define o corpo da mensagem em HTML
        $mail->AltBody = strip_tags($mensagem);                 // Define o corpo alternativo em texto puro

        // Tenta enviar o email
        $mail->send();

        // Limpa os destinatários e anexos para o próximo envio
        $mail->clearAddresses();
        
        // Aguarda um tempo antes de enviar o próximo email para evitar bloqueios
        sleep(3); // Ajuste o tempo conforme necessário
    }

    echo 'Todas as mensagens foram enviadas com sucesso!';
} catch (Exception $e) {
    echo "A mensagem não pôde ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
}