<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<link href="css/mobile.css" rel="stylesheet" type="text/css" 
   media="only screen and (max-width: 1300px)" />
   
<link href="css/style.css" rel="stylesheet" type="text/css" 
   media="screen and (min-width: 1301px)" />
<?
 include_once("controller/Controller.php");

 $controller = new Controller();
 $controller->title();
?>
   <script type="text/javascript" src="jquery/jquery-1.4.2.js"></script>
   <script type="text/javascript">
	$(document).ready(function(){
        var scegli = '<option value="0">Scegli...</option>';
		var attendere = '<option value="0">Attendere...</option>';
		
		$("select#province").html(scegli);
		$("select#province").attr("disabled", "disabled");
		$("select#comuni").html(scegli);
		$("select#comuni").attr("disabled", "disabled");
		
		
		$("select#regioni").change(function(){
			var regione = $("select#regioni option:selected").attr('value');
			$("select#province").html(attendere);
			$("select#province").attr("disabled", "disabled");
			$("select#comuni").html(scegli);
			$("select#comuni").attr("disabled", "disabled");
			
			$.post("select.php", {id_reg:regione}, function(data){
				$("select#province").removeAttr("disabled"); 
				$("select#province").html(data);	
			});
		});	
		
		$("select#province").change(function(){
			$("select#comuni").attr("disabled", "disabled");
			$("select#comuni").html(attendere);
			var provincia = $("select#province option:selected").attr('value');
			$.post("select.php", {id_pro:provincia}, function(data){
				$("select#comuni").removeAttr("disabled");
				$("select#comuni").html(data);	
			});
		});	
	
	});
    </script>
    <meta name="viewport" content="width=800px, initial-scale=.2, maximum-scale=.5" />
</head>

<body>

 <?
 $controller->menu();
 
 ?>

 <div style="clear:both"></div>
 <br>
 <?
 $controller->exampleSuggestions();
 

?>

<div style="clear:both"></div>
<br>
<?
 $controller->exampleSelect();
?>
<br>

</body>

</html>

