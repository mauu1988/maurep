<?
 
include_once('config.php');

session_start();
 
$nome       =   $_POST['nome'];  
$cognome    =   $_POST['cognome']; 
$email      =   $_POST['email'];  
$messaggio  =   $_POST['messaggio']; 
$oggetto    =   $_POST['oggetto'];   
$ip     =       $_SERVER['REMOTE_ADDR']; 

ini_set( 'smtp_port', 465 );

if($_POST['fred'] != "") {
    echo('<p style="color: #000; font-size: 25px; font-weight: bold;">Sei uno spambot o stai usando tecniche di spam indesiderate, spiancenti ma ci siamo attrezzati per i furboni come te. La mail non e stata inviata</p>');
}
else {
  $to         = $email_admin;  
  $sbj        = "Hai ricevuto una mail dal tuo sito internet - $sito_internet";
  $msg        = " 

<html>
<head>
<style type='text/css'>
body{
    font-family:'Lucida Grande', Arial;
    color:#333;
    font-size:15px;
}
</style>
</head>
<body>
<table width='600' border='0' cellspacing='0' cellpadding='5'>
  <tr>
    <td width='121' align='right' valign='baseline'><strong>Nome:</strong></td>
    <td width='459'>$nome</td>
  </tr>
 
    <tr>
    <td width='121' align='right' valign='baseline'><strong>Cognome:</strong></td>
    <td width='459'>$cognome</td>
  </tr>
 
  <tr>
    <td align='right' valign='baseline'><strong>Email:</strong></td>
    <td>$email</td>
  </tr>
  <tr>
    <td align='right' valign='baseline'><strong>IP:</strong></td>
    <td>$ip</td>
  </tr>
 
  <tr>
    <td align='right' valign='baseline'><strong>Oggetto:</strong></td>
    <td>$oggetto</td>
  </tr>
  <tr>
    <td align='right' valign='baseline'><strong>Richiesta:</strong></td>
    <td>$messaggio</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><small>Powered by mauu1988.altervista.org | &copy; Copyright 2014 Maurizio Gargiulo</small></td>
  </tr>
 
</table>
</body>
</html>
";
  $replacements = array();
  $patterns = array();

  $patterns[0] = '/gmail/';
  $replacements[0] = 'gmmail';
  $email = preg_replace($patterns, $replacements, $email);
  
  $from        = $email;
 
  $headers     = 'MIME-Version: 1.0' . "\n";
  $headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\n"; //In certi casi con aruba se non viene formattata eliminare il \r per i permessi come ho fatto in questo caso
  $headers    .= "From: $from";
 
  mail($to,$sbj,$msg,$headers); //Invio mail principale. 
 
//Fine mail inviata a me

  session_destroy();
   
  header("Location: $grazie"); //Reindirzzo alla pagina specificata in config.php
  exit;
  
}