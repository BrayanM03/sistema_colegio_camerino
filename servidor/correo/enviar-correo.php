<?php

  

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../../vendor/autoload.php';

    $correo_cliente = $_POST["correo_cliente"];
    $nombre_cliente = $_POST["nombre_cliente"];
    $id_cliente = $_POST["cliente_id"];
    $detalle_id = $_GET["folio"];
    // Crear una instancia de PHPMailer
    // Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    //Server settings
   /*  $mail->SMTPDebug = SMTP::DEBUG_SERVER; */                      //Enable verbose debug output
   //Este codigo debe modificarse para que funcione
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.cbbienesraices.com.mx';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ventas@cbbienesraices.com.mx';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = null;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ventas@cbbienesraices.com.mx', 'CBbienes raices');
    $mail->addAddress($correo_cliente, $nombre_cliente);     //Add a recipient
   
    $mail->addReplyTo('ventas@cbbienesraices.com.mx', 'Information');
   

    //Attachments
    $mail->addAttachment('../../static/docs/C'.$id_cliente.'/CONTRATO-'. $detalle_id.'.pdf'); 
   /*  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name */

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contrato de compraventa de terreno';
    $mail->Body = '
    
    <h3>Contrato de compraventa de terreno</h3><p>
    <div style="color: gray">    
    Estimado comprador, adjuntamos a este correo el contrato de compraventa del terreno que usted adquirió con CBbienes raices.</p>
    <p>Atentamente,</p>
    <p>CBbienes raices</p>
    </div>
    <div class="firma">
        <div style="display: flex; flex-direction:row; justify-content:start; align-items:center;">
        <img src="https://cbbienesraices.com.mx/static/img/logo-cb.png" style="width:30px;"> <b>Bienes Raices</b>
        </div>

        <div style="display: flex; flex-direction:column" style="height: 2rem; color: gray">
        
            <span>Telefono: +52 8682741147</span>
            <span>Direccion: Av. Espa帽a 65 entre 12 y 14 Planta Alta Col. Buena Vista Matamoros Tamaulipas</span>
            <span>Correo: cbernal992@gmail.com</span>
        </div>
    
    </div>';
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $response = array("estatus"=>true, "mensaje"=>'Correo enviado');
} catch (Exception $e) {
    
    $response = array("estatus"=>true, "mensaje"=>"Correo no se ha enviado: {$mail->ErrorInfo}");

}

echo json_encode($response, JSON_UNESCAPED_UNICODE);





?>