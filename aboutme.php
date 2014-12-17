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
</head>
<body>   
<?

 $controller->menu();
 $controller->aboutme(); 

?>

</body>
</html>

