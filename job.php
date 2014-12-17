<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link href="css/mobile.css" rel="stylesheet" type="text/css" 
   media="only screen and (max-width: 1300px)" />
   
<link href="css/style.css" rel="stylesheet" type="text/css" 
   media="screen and (min-width: 1301px)" />
<link rel="stylesheet" href="jquery/themes/base/jquery.ui.all.css" type="text/css" />
  
<meta name="viewport" content="width=800px, initial-scale=.2, maximum-scale=.5" /> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="jquery/ui/jquery.ui.core.min.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="jquery/ui/jquery.ui.autocomplete.js"></script>
    <script type="text/javascript" src="jquery/ui/jquery.ui.datepicker.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
        var scegli = '<option value="">scegli...</option>';
		var attendere = '<option value="0">Attendere...</option>';		
		$("select#sede").html(scegli);
		$("select#sede").attr("disabled", "disabled");	
        $("select#posizioniaperte").html(scegli);
		$("select#posizioniaperte").attr("disabled", "disabled");	
		
		$("select#posizioni").change(function(){
			var posizione = $("select#posizioni option:selected").attr('value');
			$("select#sede").html(attendere);
			$("select#sede").attr("disabled", "disabled");
            $("select#posizioniaperte").html(scegli);
			$("select#posizioniaperte").attr("disabled", "disabled");
			
			
			$.post("controller/ActionControllerSelectJob.php", {id_pos:posizione}, function(data){
				$("select#sede").removeAttr("disabled"); 
				$("select#sede").html(data);	
			});
		});	
        
        $("select#sede").change(function(){
			$("select#posizioniaperte").attr("disabled", "disabled");
			$("select#posizioniaperte").html(attendere);
			var posizione = $("select#posizioni option:selected").attr('value');
            var sede = $("select#sede option:selected").attr('value');
			$.post("controller/ActionControllerSelectJob.php", {id_pos_citta:posizione, id_sede:sede}, function(data){
				$("select#posizioniaperte").removeAttr("disabled");
				$("select#posizioniaperte").html(data);	
			});
		});			
    });	 
</script>

<script type="text/javascript">

$(function() { 
   $( ".data" ).datepicker({ dateFormat: 'yy-mm-dd' });   
});

</script>
<script>
function myFunction() {
    document.getElementById("jobform").reset();
}
</script>
</head>
<body>    
<?   
 include_once("controller/Controller.php");

 $controller = new Controller();
 $controller->title();
 $controller->menu();
?>

<?
 
  $controller->job();
?>
</body>
</html>