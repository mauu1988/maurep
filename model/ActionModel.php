<?

include_once("Model.php");

class ActionModel extends Model
{
    public $term;
    public $dati;
    
        public function __construct()
        {
            $this->dbConnect();
            $this->term = mysql_real_escape_string($_GET['term']);
            $this->dati = $this->printResult();               
        }
 
        public function dbConnect()
        {
            chdir("../");
            require("config.php");      
                    
            $this->conn = mysql_connect($host,$user_db,$password_db) OR die("Connessione non riuscitaa");
            mysql_select_db("my_mauu1988", $this->conn) OR die("Impossibile selezionare il database");
            
        }
 
        public function printResult()
        {
            $sql = "SELECT id,nome
            FROM names
            WHERE nome LIKE '$this->term%'
            ORDER BY nome ASC";
 
            $res = mysql_query($sql, $this->conn);
 
            $return = array();
            $arr = array();
 
            while($row = mysql_fetch_array($res))
            {
                $arr['id'] = $row['id'];
                $arr['value'] = $row['nome'];
                array_push($return, $arr);
            }
           
            return (json_encode($return));
        }                  
}


?>
