<?

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MysqliSingleton
 *
 * @author mauu1988
 */
class MysqliSingleton extends mysqli{
  static private $instance = null;
  
  private function __construct(){
    parent::__construct( 'localhost', 'root', 'password', 'my_mauu1988' );
  }
 
  static public function getInstance(){
    if(self::$instance === null){  
      self::$instance = new MysqliSingleton();
    }
    return self::$instance;
  }
 
}
 


