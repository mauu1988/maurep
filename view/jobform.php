<?
include_once 'select.class.php';
$opt = new SelectList();

?>	
<div id="layout">
   <section id="layout-content">
      <div id= "title">Invia la tua candidatura compilando il form che segue<br> 
      </div>     
      <div>
         <fieldset id="fieldset">
            <legend><span>Compila il form</span></legend>
              <form action="jobengine.php" method="post" enctype="multipart/form-data" name="jobform" id="jobform">
               <label for="nome">Nome <span>(richiesto)</span></label><a name="nome"></a>
               <input  tabindex="1" type="text" name="nome" id="nome" value="" placeholder="Scrivi il tuo nome" required/><br>
               <label for="cognome">Cognome <span>(richiesto)</span></label><a name="cognome"></a>
               <input  tabindex="2" type="text" name="cognome" id="cognome" value="" placeholder="Scrivi il tuo cognome" required/><br>
               <label for="email">Email <span>(richiesto)</span></label><a name="email"></a>
               <input  tabindex="3" type="email" name="email" id="email" value="" placeholder="Digita la tua Email" required/><br>
               <label for="telefono">Telefono <span>(richiesto)</span></label><a name="telefono"></a>
               <input  tabindex="4" type="telefono" name="telefono" id="telefono" value="" placeholder="Digita il tuo numero di telefono" required/><br>
               <label for="et&agrave">Et&agrave; <span>(richiesto)</span></label><a name="et&agrave;" id="Eta"></a>
               <input  tabindex="5" type="datepicker" name="datepicker" class="data" id="datepicker" value="" placeholder="Seleziona qui la tua data di nascita" required/><br>             
               <label for="Titolo di Studio">Titolo di Studio <span>(richiesto)</span></label><a name="titolo"></a>
	       <select required tabindex="6" type="titolo" name="titolo" id="titolo">
	          <option value="">Seleziona Titolo di Studio</option>
                  <option value="1">Diploma</option>
                  <option value="2">Laurea</option>
               </select>              
               <label for="Posizioni Aperte">Posizioni aperte <span>(richiesto)</span></label><a name="posizioni"></a>
			   <select required tabindex="7" type="posizioni" name="posizioni" id="posizioni">
				<? echo $opt->ShowPosizioni(); ?>
			   </select>
               <label for="Sede">Sede di lavoro <span>(richiesto)</span></label><a name="sede"></a>
			   <select required tabindex="8" type="sede" name="sede" id="sede">
			   <option>scegli...</option>
			   </select>
               <label for="Posizioni Aperte Citt&agrave;">Posizioni Aperte per la Citt&agrave; scelta<span>(richiesto)</span></label><a name="posizioniaperte"></a>
			   <select required tabindex="9" type="posizioniaperte" name="posizioniaperte" id="posizioniaperte">
			   <option>scegli...</option>
			   </select>
               <label for="Carica il cv">Carica il cv</label><a name="caricacv"></a>
               <input type="file" name="upfile">
               <br/><br/> 
               <button type=”submit” name="send" id="send">invia</button>
               <button type="button" onclick="myFunction()" value="Reset form">reset</button>
               </form>
         </fieldset>
      </div>
   </section>
</div>
