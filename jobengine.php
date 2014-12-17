<?

include_once("config.php");

session_start();
 
$nome       =   $_POST['nome'];  
$cognome    =   $_POST['cognome']; 
$email      =   $_POST['email'];  

$titolo    =   $_POST['titolo'];   
$telefono     =       $_POST['telefono']; 
$data_nascita = $_POST['datepicker'];
$id_posizione = $_POST['posizioni'];
$id_sede=($_POST['sede']);

header('Content-Type: text/plain; charset=utf-8');

try {
   
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['upfile']['error']) ||
        is_array($_FILES['upfile']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Il cv che intendi uplodare supera la dimensione massima.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here.
    if ($_FILES['upfile']['size'] > 1000000) {
        throw new RuntimeException('Il cv che intendi uplodare supera la dimensione massima.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['upfile']['tmp_name']),
        array(
            'doc' => 'application/msword',
            'pdf' => 'application/pdf'
            
        ),
        true
    )) {
        throw new RuntimeException('Il cv che intendi uplodare non ha un formato valido, scegli tra .doc e .pdf');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('./uploads/'.$nome.$cognome.'%s.%s',
            sha1_file($_FILES['upfile']['tmp_name']),
            $ext
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    $msg = 'File is uploaded successfully.';
    echo $msg;

} catch (RuntimeException $e) {

   
   $msg=$e->getMessage();
   echo $msg;

}			

$conn=mysql_connect($host,$user_db,$password_db) OR die("Impossibile connettersi al database");
mysql_select_db("my_mauu1988",$conn) OR die("Impossibile selezionare il database $db");			

$sql = "INSERT INTO `candidati`(`id_titolo`, `nome`, `cognome`, `email`, `telefono`,`data_nascita`, `id_pos`, `id_sede`) VALUES ('$titolo','$nome','$cognome','$email','$telefono','$data_nascita', $id_posizione, $id_sede)";

$res = mysql_query($sql, $conn);
session_destroy();
if ($msg=="File is uploaded successfully.")
header("Location: $grazie"); //Reindirizzo alla pagina specificata in config.php
exit;

?>