<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require '../clases_varios/PHPMailer/Exception.php';
require '../clases_varios/PHPMailer/PHPMailer.php';
require '../clases_varios/PHPMailer/SMTP.php';
require '../clases/Cliente.php';
$c_cliente = new Cliente();
$c_cliente->setIdCliente(filter_input(INPUT_GET, 'id_cliente'));
$c_cliente->obtener_datos();


//$body = file_get_contents("http://" . $_SERVER["HTTP_HOST"] . '/clientes/seaq/intranet/pages/email_acceso.php?ruc=' . $c_cliente->getRuc() . '&password=' . $c_cliente->getContrasena());

$url = "http://" . $_SERVER["HTTP_HOST"] . '/software/intranet/pages/email_acceso.php?ruc=' . $c_cliente->getRuc() . '&password=' . $c_cliente->getContrasena();
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);
if (curl_errno($ch)) {
  echo curl_error($ch);
  echo "\n<br />";
  $contents = '';
} else {
  curl_close($ch);
}

if (!is_string($contents) || !strlen($contents)) {
echo "Failed to get contents.";
$contents = '';
}

$body = $contents;

//$body = "mensaje de prueba";

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

//$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

function TildesHtml($cadena)
{
    return str_replace(array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ"), array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&ntilde;",
        "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Ntilde;"), $cadena);
}

try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.seaqsac.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '_mainaccount@seaqsac.com';                 // SMTP username
    $mail->Password = 'kl-au-ya-se-aq-15-10';                           // SMTP password
    //$mail->Username = 'facturacion@lunasystemsperu.com';                 // SMTP username
    //$mail->Password = '8=M}W(cNK9u5';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->SMTPDebug = 2; 
    //Recipients
    $message = $body;
    $subject = "ACCESO A INTRANET SEAQ SAC";

    $email_to = $c_cliente->getEmail();
    $email2_to = "";
    $email3_to = "";

    $mail->setFrom('may06sed@seaqsac.com', 'Robot - SEAQ SAC');
    $mail->addAddress($email_to);     // Add a recipient
    $mail->addReplyTo('kgarcia@seaqsac.com', 'Kristian Garcia - SEAQ SAC');
    if ($email2_to != "") {
        $mail->addCC($email2_to);
    }
    if ($email3_to != "") {
        $mail->addCC($email3_to);
    }
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
//
    //Attachments
    //$archivo_pdf = filter_input(INPUT_POST, 'input_archivo_pdf');
    //$archivo_xml = filter_input(INPUT_POST, 'input_archivo_xml');
    //$url_archivo_pdf = "../archivos/" . $archivo_pdf;
    //$url_archivo_xml = "../archivos/" . $archivo_xml;

    //$mail->addAttachment($url_archivo_pdf, $archivo_pdf);         // Add attachments
    //$mail->addAttachment($url_archivo_xml, $archivo_xml);    // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = "informacion para ingresar a la intranet de SEAQ SAC. Usuario: " . $c_cliente->getRuc() . " Contraseña: " . $c_cliente->getContrasena();

    if ($mail->send()) {
        echo "<center>Su informacion ha sido enviada correctamente a la direccion de email especificada.<br/>(sientase libre de cerrar esta ventana)</center>";
        ?>
        <script>
     //         window.location.href = "../ver_clientes_sucursal.php?id_cliente=" + <?php echo $c_cliente->getIdCliente() ?>;
        </script>
        <?php

    }
    //   echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}