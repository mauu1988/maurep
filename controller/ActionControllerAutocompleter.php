<?
chdir(dirname(__FILE__));

require "../model/Model.php"; 
require "../model/ActionModel.php"; 
require "../controller/Controller.php";
class Source1 extends Controller 
{
    
   public function __construct()  
   {    
     $test = parent::__construct();
     $this->actionmodel= new ActionModel();

     $this->term = mysql_real_escape_string($_GET['term']);
     $this->actionSource($this->actionmodel->dati);
  
   }  
   public function actionSource($dati) 
   {
      echo $dati;          
   }   
}   

$Source1=new Source1();

?>