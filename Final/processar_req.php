<?php
session_start();

// configuração do PHP Mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'autoload.php';
require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define uma variável de sessão para indicar sucesso
    $escolaNome = isset($_POST['escolaNome']) ? trim($_POST['escolaNome']) : '';
    $contatoNome = isset($_POST['contatoNome']) ? trim($_POST['contatoNome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';

    // Validação dos campos
    if (strlen($escolaNome) < 3 || strlen($contatoNome) < 3 || strlen($email) < 3 || strlen($mensagem) < 3) {
        $_SESSION['error'] = 'Todos os campos devem conter pelo menos 3 caracteres.';
        header('Location: plataforma.php');
        exit;
    }

    else {
        // Armazena os dados em variáveis de sessão
        $_SESSION['escolaNome'] = $escolaNome;
        $_SESSION['contatoNome'] = $contatoNome;
        $_SESSION['email'] = $email;
        $_SESSION['mensagem'] = $mensagem;

        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'c7b98bab02992a';                     //SMTP username
            $mail->Password   = '254fdd6652469b';                               //SMTP password
            $mail->Port = 2525;   

            // Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('peterlouraes@gmail.com', 'Peter');     //Name is optional
            $mail->CharSet = "UTF-8";
            $mail->Encoding = 'base64';

            // Envio do email para o servidor e para o requisitante
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Requisição da plataforma ManageMe';

            $formato = "Nome da escola: %s <br>Nome do contato: %s <br>Email do contato: %s <br>Mensagem: %s";
            $mail->Body    = sprintf($formato, $escolaNome, $contatoNome, $email, $mensagem);

            $mail->send();
            $_SESSION['success'] = 'Requisição enviada com sucesso!';
        }
        catch (Exception $e) {
            $_SESSION['error'] = sprintf('Erro: %s', $e);
        }
        // Redireciona para a página do formulário
        header('Location: plataforma.php'); 
    }
} else {
    // Se alguém acessar de forma direta este script (sem enviar o formulário), redireciona para o formulário
    header('Location: plataforma.php');
}
?>
