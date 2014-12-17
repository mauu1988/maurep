<center>
  <div>
     <section id="layout-content">
<?
include_once 'select.class.php';
$opt = new SelectList();
?>	
	
	<p><b>Seleziona il comune attraverso le Select che utilizzano Ajax, Php e MySql</b></p>
		<form action="?" id="myform">
			Seleziona una regione:<br />
			<select id="regioni">
				<? echo $opt->ShowRegioni(); ?>
			</select>
			<br /><br />
		
			Seleziona una provincia:<br />
			<select id="province">
			<option>Scegli...</option>
			</select>
			<br /><br />
		
			Seleziona un comune:<br />
			<select id="comuni">
			<option>Scegli...</option>
			</select>			
		
	     </form>
         <br>
     </section>
   </div>
</center>
