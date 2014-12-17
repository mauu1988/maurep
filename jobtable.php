<?
include_once 'select.class.php';
$opt = new SelectList();
?>	
<div id="layout">
   <section id="layout-content">
      <div id= "title">Visualizza i candidati applicando i filtri desiderati<br> 
      </div>     
      <div>
         <fieldset id="fieldset">
	        <select required tabindex="1" type="filtroeta" name="filtroeta" id="filtroeta">
		       <option value="">Applica Filtro Et&agrave;</option>
               <option value="1">18-25anni</option>
               <option value="2">25-35anni</option>
               <option value="3">35-45anni</option>
               <option value="4">>45</option>
			</select>
			<select required tabindex="2" type="filtrotitolo" name="filtrotitolo" id="filtrotitolo">
				<option value="">Applica Filtro Titolo di Studio</option>
                <option value="1">Diploma</option>
                <option value="2">Laurea</option>                  
			</select>               
            <select required tabindex="3" type="filtroposizone" name="filtroposizione" id="filtroposizione">
	           <option value="">Applica Filtro Posizione</option>
               <option value="1">Cuoco</option>
               <option value="2">Cameriere</option>
			</select>    
            <select required tabindex="4" type="filtrosede" name="filtrosede" id="filtrosede">
		       <option value="">Applica Filtro Sede</option>
               <option value="1">Milano</option>
               <option value="2">Roma</option>
               <option value="4">Genova</option>
			</select>
            <table width="1320" height="50" border="1" id="tabellacandidati">
            <tr id="tr">
               <td id="title" width="300" height="50">Nome</td>
               <td id="title" width="300" height="50"> Cognome</td>
               <td id="title" width="300" height="50">Et&agrave;</td>
               <td id="title" width="300" height="50">Titolo di Studio</td>               
            </table>                               
         </fieldset>
      </div>
   </section>
</div>
