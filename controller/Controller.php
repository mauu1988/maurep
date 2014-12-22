<?
include_once("model/Model.php"); 
include_once("model/ActionModel.php"); 

class Controller {
   public $model; 
   public $actionmodel;

    public function __construct()  
    {  
       $this->model = new Model(); 
       //$this->actionmodel= new ActionModel();
    }  
 
    public function menu()
    {
       $menu = $this->model->getMenu();
       include 'view/menulist.php';
    }
 
    public function contact()
    {
       $contact = $this->model->getContacts(); 
       include 'view/contactlist.php';
    } 
 
    public function aboutme()
    {
     
      $aboutme = $this->model->getAboutMe(); 
      include 'view/aboutme.php';
   
    }
 
    public function exampleSuggestions()
    {
     
       $example = $this->model->getExampleSuggestions(); 
       include 'view/examplesuggestions.php';  
   
    }
 
    public function exampleAutocompleter()
    {
     
       $example = $this->model->getExampleAutocompleter(); 
       include 'view/exampleautocompleter.php';  
    }
 
     public function exampleSelect()
     {
     
        $example = $this->model->getExampleSelect(); 
        include 'view/exampleselect.php';   
     }
 
     public function browserDetect($url) 
     {
        $browser_detect = $this->model->getBrowserDetect();
   
        if($browser_detect->device=="mobile") {
           header("Location: http://".$url);       
        }
     }
 
     public function title() 
     {
        $title = $this->model->getTitle();     

        if(isset($title->title_home)){
           include 'view/titlehome.php';
        }
        if(isset($title->title_aboutme)){
           include 'view/titleaboutme.php';
        }
        if(isset($title->title_examples)){
           include 'view/titleexamples.php';
        }  
        if(isset($title->title_contact)){
           include 'view/titlecontact.php';   
        }
        if(isset($title->title_job)){
           include 'view/titlejob.php';
        }
     }
     public function job()
     {
  //$jobform = $this->model->getJobForm();   
        include 'view/jobform.php';    
     }
     public function jobtable()
     {
         include 'view/jobtable.php';
     }
 } 

?>