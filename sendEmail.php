<?php
// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

require_once "$path_local/cms/PHPMailer/src/PHPMailer.php";
$mail = new PHPMailer(true);

if(isset($_POST['btn_submit'])){
    echo("<script>alert('hiiii')</script>");
    $title = $_POST['txt_title_email'];
    $subject = $_POST['txt_subject'];
    $dest = $_POST['txt_dest_email'];
    $email_body = $_POST['txt_descricao'];
    $headers = "From: noreply @ company. com";
   
    
  }


if($send_using_gmail){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "randersonvieira1999@gmail.com"; // GMAIL username
    $mail->Password = "stormtrooper"; // GMAIL password
}

//Typical mail data
$mail->AddAddress($dest, 'Randerson Mendes');
$mail->SetFrom('randersonvieira1999@gmail.com', 'Randerson Mendes');
$mail->Subject =$subject;
$mail->Body = $email_body;

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

?>