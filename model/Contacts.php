<?
class Contacts { 
   public $telefone;
   public $email;
   public $skype;
         
   public function __construct($telefone, $email, $skype)    
   {    
      $this->telefone = $telefone;  
      $this->email = $email;
      $this->skype = $skype;         
   }   
}  
    
?>