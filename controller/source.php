<?
include 'config.php';
 
class Autocomplete
{
    public $term;
    public $conn;
 
        public function __construct()
        {
            $this->dbConnect();
            $this->term = mysql_real_escape_string($_GET['term']);                 
        }
 
        private function dbConnect()
        {
            $this->conn = mysql_connect($host,$user_db,$password_db) OR die("Connessione non riuscita");
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
            
            echo json_encode($return);
        }
}
 
$autocomplete = new Autocomplete();
$autocomplete->printResult();

?>