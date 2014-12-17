<div id="layout">
   <section id="layout-content">
      <div id= "title">Ecco i miei riferimenti <br> 
      </div>
      <div>
         <?
         echo "Telefono: "?> <i><? echo $contact->telefone; ?> </i><br> <?
         echo "Email: "?> <i><?echo $contact->email; ?> </i><br> <?
         echo "Skype: "?> <i><?echo $contact->skype; ?> </i><br> <? 
         ?>
      </div>
      <div>
         <fieldset id="fieldset">
            <legend><span>Compila il form</span></legend>
            <form action="engine.php" method="post" name="contactform" id="contact">
               <label for="nome">Nome <span>(richiesto)</span></label><a name="nome"></a>
               <input  tabindex="1" type="text" name="nome" id="nome" value="" placeholder="Scrivi il tuo nome" required/><br>
               <label for="cognome">Cognome</label><a name="cognome"></a>
               <input  tabindex="2" type="text" name="cognome" id="cognome" value="" placeholder="Scrivi il tuo cognome"/><br>
               <label for="email">Email <span>(richiesto)</span></label><a name="email"></a>
               <input  tabindex="3" type="email" name="email" id="email" value="" placeholder="Digita la tua Email" required/><br>
               <label for="oggetto">Oggetto <span>(richiesto)</span></label><a name="oggetto"></a>
               <input  tabindex="4" type="oggetto" name="oggetto" id="oggetto" value="" placeholder="Oggetto della richiesta" required/><br>
               <label for="messaggio">Messaggio</label><br>
               <textarea  tabindex="5" cols="50" rows="10" name="messaggio" id="messaggio" placeholder="La tua richiesta"></textarea>
               <input type="text" id="fred" name="fred" style="visibility: hidden;"/>
               <button type=”submit” name="send" id="send">invia</button>
            </form>
         </fieldset>
      </div>
   </section>
</div> 