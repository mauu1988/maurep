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
		$("select#filtroposizione").change(function(){
                        
			var posizione = $("select#filtroposizione option:selected").attr('value');
            if(posizione!=""){
               $("select#filtroeta").attr("disabled", "disabled");
               $("select#filtrotitolo").attr("disabled", "disabled");
               $("select#filtrosede").attr("disabled", "disabled");
            }
            else {
               $("select#filtroeta").removeAttr("disabled");
               $("select#filtrotitolo").removeAttr("disabled");
               $("select#filtrosede").removeAttr("disabled");
            }
			$.post("controller/ActionControllerSelectJob.php", {id_filtro_pos:posizione}, function(data){
            var tableRef = document.getElementById('tabellacandidati');
            $('#title_more').remove();
            $('#title_more').remove();
            $('#title_more').remove();
            while ( tableRef.rows.length > 1 )
            {
               tableRef.deleteRow(1);
            }
				$("select#tabellacandidati").html(data);	
                   var result = data; 
                   result=result.split("|");
                   for (i = 0; i < result.length; i++) {                     
                      $("<tr/>")
	        		  .append(result[i])
	        		  .appendTo("#tabellacandidati");         
                   }
                });
                
			});
            
            $("select#filtrosede").change(function(){
            var sede = $("select#filtrosede option:selected").attr('value');
            if(sede!=""){
               
               $("select#filtroposizione").attr("disabled", "disabled");              
               $("select#filtroeta").attr("disabled", "disabled");
               $("select#filtrotitolo").attr("disabled", "disabled");
               
            }
            else {
        
               $("select#filtroeta").removeAttr("disabled");
               $("select#filtrotitolo").removeAttr("disabled");
               $("select#filtroposizione").removeAttr("disabled");
            }
            
            var tableRef = document.getElementById('tabellacandidati');
            $('#title_more').remove();
            $('#title_more').remove();
            $('#title_more').remove();
            $('#title_more').remove();
            while ( tableRef.rows.length > 1 )
            {
               tableRef.deleteRow(1);
            }
						
			$.post("controller/ActionControllerSelectJob.php", {id_filtro_sede:sede}, function(data){
				$("select#tabellacandidati").html(data);	
                   var result = data;                    
                   var len;
                   result=result.split("|");
                   for (i = 0; i < result.length; i++) { 
                	$("<tr/>")
	        		.append(result[i])
	        		.appendTo("#tabellacandidati");         
                   }                       
			    });
            
		     });	     
             
            $("select#filtrotitolo").change(function(){
            var titolo = $("select#filtrotitolo option:selected").attr('value');	
            
            
            var tableRef = document.getElementById('tabellacandidati');
            $('#title_more').remove();
            $('#title_more').remove();
            $('#title_more').remove();                              
                      
            while ( tableRef.rows.length > 1 )
            {
               tableRef.deleteRow(1);
            }     
            
            if(titolo!=""){
               $("select#filtroeta").attr("disabled", "disabled");
               $("select#filtroposizione").attr("disabled", "disabled");
               $("select#filtrosede").attr("disabled", "disabled");
            }
            else {             
                       				
               $("select#filtroeta").removeAttr("disabled");
               $("select#filtroposizione").removeAttr("disabled");
               $("select#filtrosede").removeAttr("disabled");              
            }
    
					
			$.post("controller/ActionControllerSelectJob.php", {id_filtro_titolo:titolo}, function(data){
				$("select#tabellacandidati").html(data);	
                   var result = data;                    
                  
                   result=result.split("|");
                   for (i = 0; i < result.length; i++) { 
                	$("<tr/>")
	        		.append(result[i])
	        		.appendTo("#tabellacandidati");         
                   }                       
			    });
            
		     });	
             
            $("select#filtroeta").change(function(){
            var eta = $("select#filtroeta option:selected").attr('value');	
            
            if(eta!=""){
               $("select#filtroposizione").attr("disabled", "disabled");
               $("select#filtrotitolo").attr("disabled", "disabled");
               $("select#filtrosede").attr("disabled", "disabled");
            }
            else {
               $("select#filtroposizione").removeAttr("disabled");
               $("select#filtrotitolo").removeAttr("disabled");
               $("select#filtrosede").removeAttr("disabled");
            }
           
					
			$.post("controller/ActionControllerSelectJob.php", {id_filtro_eta:eta}, function(data){
            var tableRef = document.getElementById('tabellacandidati');
            $('#title_more').remove();
            $('#title_more').remove();
            $('#title_more').remove();
            while ( tableRef.rows.length > 1 )
            {
               tableRef.deleteRow(1);
            }
				$("select#tabellacandidati").html(data);	
                   var result = data; 
                   result=result.split("|");
                   for (i = 0; i < result.length; i++) {                     
                      $("<tr/>")
	        		  .append(result[i])
	        		  .appendTo("#tabellacandidati");         
                   }
                });         
			});
        });	 
</script>

<script>
function moreInfo(id) {   
    $.post("controller/ActionControllerSelectJob.php", {id_candidato:id}, function(data){    
    var tableRef = document.getElementById('tabellacandidati');
   
    while ( tableRef.rows.length > 1 )
    {
       tableRef.deleteRow(1);
    }
    
    $("select#tabellacandidati").html(data);	
    var result = data; 
    var title = '<td width="300" height="50" id="title_more">Citta</td><td width="300" height="50" id="title_more">Email</td><td width="300" height="50" id="title_more">Telefono</td>';
    $("#tr")
    .append(title)
    .appendTo("#tabellacandidati");                                   
    $("<tr/>")
	.append(result)
    .appendTo("#tabellacandidati");     
       				
    });                
			
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
 
  $controller->jobtable();
?>

</body>
</html>