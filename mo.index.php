<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
 include_once("controller/Controller.php");

 $controller = new Controller();
 
?>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
      <meta name="description" content="Programmatore PHP, WebDeveloper" />
      <meta name="keywords" content="Programmatore Php, WebDeveloper" />
      <meta name="author" content="Maurizio Gargiulo" />
      <meta name="language" content="italian" />
      <meta name="robots" content="index,follow" />
      <link rel="shortcut icon" href="favicon.ico" />
      <link href="css/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 1300px)" />
      <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
      <title>Programmatore PHP MySQL AJAX - Maurizio Gargiulo</title>
      <link href="css/style.css" rel="stylesheet" type="text/css" media="screen and (min-width: 1301px)" />    
   </head>
   <body>
      <? $controller->menu(); ?>
      <center>   
         <div id="layout">
            <section id="layout-content">
               <div id="center-dx">
                  <div id="slider" class="nivoSlider">
                     <img src="http://mauu1988.altervista.org/images/mysql.jpg" alt="" />
                     <img src="http://mauu1988.altervista.org/images/images.jpg" alt="" />
                     <img src="http://mauu1988.altervista.org/images/terminal.jpg" alt="" />
                     <img src="http://mauu1988.altervista.org/images/mvc.jpg" alt="" />
                  </div>
               </div>
               <div id="center-sx">       
                  <div class="titolo">Maurizio Gargiulo: Scegliere un Programmatore PHP&nbsp;&nbsp;per la Realizzazione Siti Web</div>       
                  <div id="uno" class="nivo-html-caption">Sviluppo di Siti Internet Dinamici e CMS Dinamici a Misura di Utente</div>           
                  <p>Hai deciso di <strong>Aggiornare o Realizzare il </strong><strong>Sito Internet (Progetto Web) per la tua azienda</strong>? Vuoi <strong>investire sul web dando vita alle tue idee</strong> o dando un <strong>ulteriore spinta alla tua attivit&agrave;</strong>? Perfetto, niente di meglio che affidarti ad un <strong>Programmatore PHP</strong></p>
                  <span style="color:#ff6600; font-weight:bold; font-size:13px">Un Progetto Web in continua evoluzione!</span> 
                  <a href="http://www.php.net" target="_blank" style="color:#000000">Sito Ufficiale del PHP</a> , <a href="http://www.php.net/downloads.php" target="_blank" style="color:#000000">Download di PHP</a> , <a href="http://www.php.net/docs.php" target="_blank" style="color:#000000">Manuale e Documentazione PHP</a> , <a href="http://www.php.net/links.php" target="_blank" style="color:#000000">Risorse e Siti Utili</a> <br/>
               </div>
            </section>
         </div>        
      </center> 
      <script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
      <script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
      <script type="text/javascript">
      $(window).load(function() {
         $('#slider').nivoSlider();
      });
      </script>
   </body>
</html>