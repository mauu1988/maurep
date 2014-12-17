<?

include_once("Model.php");

class ActionModelJob extends Model
{
    public $term;
    public $conn;
    public $dati;
 
        public function __construct()
        {
            $this->dbConnect();            
            
            if(isset($_POST['id_pos_citta'])) {
               if(($_POST['id_sede'])=="3") {
                  $this->dati = $this->ShowAllPosizioniCitta();
                  return;
               
               }
               else {
	              $this->dati = $this->ShowPosizioniCitta();
	              return;
               
               }
            }  
            
            if(isset($_POST['id_reg'])) {
	           $this->dati = $this->ShowProvince();
	           return;
            }

            if(isset($_POST['id_pro'])) {
	           $this->dati= $this->ShowComuni();
               return;
            }

            if(isset($_POST['id_pos'])) {
    
	           $this->dati= $this->ShowSede();
	           return;
            }


            if(isset($_POST['id_filtro_pos'])) {
    
	           $this->dati= $this->ShowPosizioneCandidati();
	           return;
            }

            if(isset($_POST['id_filtro_sede'])) {
    
	           $this->dati= $this->ShowFiltroSedeCandidati();
	           return;
            }
            
            if(isset($_POST['id_filtro_titolo'])) {
    
	           $this->dati= $this->ShowFiltroTitoloCandidati();
	           return;
            }

            if(isset($_POST['id_filtro_eta'])) {
    
	           $this->dati= $this->ShowFiltroEtaCandidati();
	           return;
            }

            if(isset($_POST['id_candidato'])) {
    
	           $this->dati= $this->ShowMoreInfoCandidato();
	           return;
            }   
            
        }
 
        private function dbConnect()
        {
            $host = "localhost";
            $user = "root";
    
            $password= "mau*1*2*3";          
            
            $this->conn = mysql_connect($host,$user,$password) OR die("Connessione non riuscita");
            mysql_select_db("my_mauu1988", $this->conn) OR die("Impossibile selezionare il database");
        }
        
        public function ShowPosizioniCitta()
		{
			$sql = "SELECT * FROM posizioni_dettaglio WHERE id_pos=$_POST[id_pos_citta] AND id_sede=$_POST[id_sede]";
			$res = mysql_query($sql,$this->conn);
			$posizioni_citta = '<option value="">scegli...</option>';
			
				while($row = mysql_fetch_array($res))
				{
					$posizioni_citta .= '<option value="' . $row['id_pos'] . '">' . utf8_encode($row['descrizione']) . '</option>';
				}
				
			return $posizioni_citta;
		}
        
        public function ShowAllPosizioniCitta()
        {
            $sql = "SELECT * FROM posizioni_dettaglio WHERE id_pos=$_POST[id_pos_citta]";
			$res = mysql_query($sql,$this->conn);
			$posizioni_citta = '<option value="0">scegli...</option>';
			
				while($row = mysql_fetch_array($res))
				{
					$posizioni_citta .= '<option value="' . $row['id_pos'] . '">' . utf8_encode($row['descrizione']) . '</option>';
				}
				
			return $posizioni_citta;
        }
        
        public function ShowPosizioni()
		{
			$sql = "SELECT * FROM posizioni";
			$res = mysql_query($sql,$this->conn);
			$posizioni = '<option value="">scegli...</option>';
			
				while($row = mysql_fetch_array($res))
				{
					$posizioni .= '<option value="' . $row['id_pos'] . '">' . utf8_encode($row['lavoro']) . '</option>';
				}
				
			return $posizioni;
		}
        
        public function ShowSede()
		{
			$sql = "SELECT * FROM sede WHERE id_pos=$_POST[id_pos]";
			$res = mysql_query($sql,$this->conn);
			$sede = '<option value="">scegli...</option>';
			
				while($row = mysql_fetch_array($res))
				{
					$sede .= '<option value="' . $row['id_sede'] .'">' . utf8_encode($row['citta']) . '</option>';
				}
				
			return $sede;
		}         
        
        public function ShowFiltroEtaCandidati()
		{
           if($_POST['id_filtro_eta']==1) {
              $sql="SELECT DISTINCT candidati.id,candidati.data_nascita,titolo.titolo, candidati.nome, candidati.cognome FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE (select DATEDIFF(current_date(),candidati.data_nascita))>=6570 AND (select DATEDIFF(current_date(),candidati.data_nascita))<9125"; 
           }
           
           if($_POST['id_filtro_eta']==2) {
              $sql="SELECT DISTINCT candidati.id,candidati.data_nascita,titolo.titolo, candidati.nome, candidati.cognome FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE (select DATEDIFF(current_date(),candidati.data_nascita))>=9125 AND (select DATEDIFF(current_date(),candidati.data_nascita))<12775"; 
           }
           
           if($_POST['id_filtro_eta']==3) {
              $sql="SELECT DISTINCT candidati.id,candidati.data_nascita,titolo.titolo, candidati.nome, candidati.cognome FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE (select DATEDIFF(current_date(),candidati.data_nascita))>=12775 AND (select DATEDIFF(current_date(),candidati.data_nascita))<16425"; 
           }
           
           if($_POST['id_filtro_eta']==4) {
              $sql="SELECT DISTINCT candidati.id,candidati.data_nascita,titolo.titolo, candidati.nome, candidati.cognome FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE (select DATEDIFF(current_date(),candidati.data_nascita))>=16425"; 
           }
                   
		   $res = mysql_query($sql,$this->conn);
                
		   while($row = mysql_fetch_array($res))
		   {
              $nomeCv= $this->SearchNameCv("./../uploads",$row['nome'],$row['cognome']);       
              $eta=$this->DateToAge($row['data_nascita']);           
              $candidati.= '<td>'.$row['nome'].'</td><td>'.$row['cognome'].'</td><td>'.$eta.' anni</td><td>'.$row['titolo'].'</td><td id="col_more_info_'.$row['id'].'"><button id="more_info_'.$row['id'].'" type="button" onclick="moreInfo('.$row['id'].')">more info</button></td><td><a target="_blank" href="http://mauu1988.altervista.org/uploads/'.$nomeCv.'"><strong>Download Curriculum Vitae (Italian)</strong></a></td>|';              
           }
                
            if(($res!=NULL) &&(!isset($candidati))) {
               $candidati= '<td width="1200" height="50">Nessun candidato presente per il filtro selezionato</td>|';			    
            }    
				
			return $candidati;
		}
  
        public function ShowPosizioneCandidati()
		{

            $sql = "SELECT DISTINCT candidati.id,candidati.data_nascita,titolo.titolo, candidati.nome, candidati.cognome FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE candidati.id_pos=$_POST[id_filtro_pos]";     
			$res = mysql_query($sql,$this->conn);
                
				while($row = mysql_fetch_array($res)) {
                    $nomeCv= $this->SearchNameCv("./../uploads",$row['nome'],$row['cognome']); 
                    
                    $eta=$this->DateToAge($row['data_nascita']);  
                   
                    $candidati.= '<td>'.$row['nome'].'</td><td>'.$row['cognome'].'</td><td>'.$eta.' anni</td><td>'.$row['titolo'].'</td><td id="col_more_info_'.$row['id'].'"><button id="more_info_'.$row['id'].'" type="button" onclick="moreInfo('.$row['id'].')">more info</button></td><td><a target="_blank" href="http://mauu1988.altervista.org/uploads/'.$nomeCv.'"><strong>Download Curriculum Vitae (Italian)</strong></a></td>|';			
                }
                
                if(($res!=NULL) &&(!isset($candidati))) {
                   $candidati= '<td width="1200" height="50">Nessun candidato presente per il filtro selezionato</td>|';			  
                }    		
		     	   return $candidati;
		}
        
        public function ShowFiltroSedeCandidati()
		{
       
            $sql = "SELECT DISTINCT candidati.id,candidati.data_nascita,titolo.titolo, candidati.nome, candidati.cognome FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE candidati.id_sede=$_POST[id_filtro_sede]";  
			$res = mysql_query($sql,$this->conn);
                
				while($row = mysql_fetch_array($res))
				{
                    $nomeCv= $this->SearchNameCv("./../uploads",$row['nome'],$row['cognome']);
                    $eta=$this->DateToAge($row['data_nascita']);                 
                                   
                    $candidati.= '<td>'.$row['nome'].'</td><td>'.$row['cognome'].'</td><td>'.$eta.' anni</td><td>'.$row['titolo'].'</td><td id="col_more_info_'.$row['id'].'"><button id="more_info_'.$row['id'].'" type="button" onclick="moreInfo('.$row['id'].')">more info</button></td><td><a target="_blank" href="http://mauu1988.altervista.org/uploads/'.$nomeCv.'"><strong>Download Curriculum Vitae (Italian)</strong></a></td>|';			
                }
            
            if(($res!=NULL) &&(!isset($candidati)))
              
            {
               $candidati= '<td width="1200" height="50">Nessun candidato presente per il filtro selezionato</td>|';			
            
            }
				
			return $candidati;
		}
        
        public function ShowFiltroTitoloCandidati()
		{
       
            $sql = "SELECT DISTINCT candidati.id,candidati.data_nascita,titolo.titolo, candidati.nome, candidati.cognome FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE candidati.id_titolo=$_POST[id_filtro_titolo]";   
			$res = mysql_query($sql,$this->conn);
                
				while($row = mysql_fetch_array($res))
				{
                    
                   $nomeCv= $this->SearchNameCv("./../uploads",$row['nome'],$row['cognome']);
                   
                   $eta=$this->DateToAge($row['data_nascita']);                                       
                   $candidati.= '<td>'.$row['nome'].'</td><td>'.$row['cognome'].'</td><td>'.$eta.' anni</td><td>'.$row['titolo'].'</td><td id="col_more_info_'.$row['id'].'"><button id="more_info_'.$row['id'].'" type="button" onclick="moreInfo('.$row['id'].')">more info</button></td><td><a target="_blank" href="http://mauu1988.altervista.org/uploads/'.$nomeCv.'"><strong>Download Curriculum Vitae (Italian)</strong></a></td>|';	
                }
                
            if(($res!=NULL) &&(!isset($candidati)))              
            {
               $candidati= '<td width="1200" height="50">Nessun candidato presente per il filtro selezionato</td>|';			  
            }
             
			return $candidati;
		}
        
        public function ShowMoreInfoCandidato()
		{
       
            $sql = "SELECT DISTINCT candidati.id,candidati.data_nascita,candidati.telefono,titolo.titolo, candidati.nome, candidati.cognome,candidati.email, sede.citta FROM candidati INNER JOIN sede ON candidati.id_sede =sede.id_sede INNER JOIN titolo ON candidati.id_titolo=titolo.id_titolo INNER JOIN posizioni ON candidati.id_pos=posizioni.id_pos WHERE candidati.id=$_POST[id_candidato]"; 
			$res = mysql_query($sql,$this->conn);
                
				while($row = mysql_fetch_array($res))
				{
                   $nomeCv= $this->SearchNameCv("./../uploads",$row['nome'],$row['cognome']);
                   $eta=$this->DateToAge($row['data_nascita']);  
                   
                   $candidati.= '<td>'.$row['nome'].'</td><td>'.$row['cognome'].'</td><td>'.$eta.' anni</td><td>'.$row['titolo'].'</td><td>'.$row['citta'].'</td><td>'.$row['email'].'</td><td>'.$row['telefono'].'</td><td><a target="_blank" href="http://mauu1988.altervista.org/uploads/'.$nomeCv.'"><strong>Download Curriculum Vitae (Italian)</strong></a></td>|';			
                }
				
			return $candidati;
		}
        
        
        public function ShowSedeCandidati()
		{
			$sql = "SELECT DISTINCT id_sede,citta FROM sede";
			$res = mysql_query($sql,$this->conn);
			$sede = '<option value="0">Applica Filtro Sede...</option>';
			
				while($row = mysql_fetch_array($res))
				{
					$sede .= '<option value="' . $row['id_sede'] . '">' . utf8_encode($row['citta']) . '</option>';
				}
				
			return $sede;
		}
        
        public function SearchNameCv($directory,$nome,$cognome)
		{
        
           $pattern ="/^".$nome.$cognome.'/';
           if (is_dir($directory)) {
               //Apro l'oggetto directory
               if ($directory_handle = opendir($directory)) {
              //Scorro l'oggetto fino a quando non è termnato cioè false
                  while (($file = readdir($directory_handle)) !== false) {
                 
                //Se l'elemento trovato è diverso da una directory
               //o dagli elementi . e .. lo visualizzo a schermo
                 if (preg_match($pattern, $file))
                   return $file;                  
                 }
            //Chiudo la lettura della directory.
                closedir($directory_handle);
              }
           }
		}
        
        public function DateToAge($data)
		{
           $now =date("Y/m/d");
           $data_now=array();
           $data_now = explode('/',$now );
           $data_nascita =  array();
           $data_nascita = explode('-',$data );
          
           if($data_now[0]>$data_nascita[0]) {
              if($data_now[1]>$data_nascita[1]){
      
                 return $data_now[0]-$data_nascita[0];
              }
              else if($data_now[1]==$data_nascita[1]) {
                 if($data_now[2]>=$data_nascita[2]) {
                    return $data_now[0]-$data_nascita[0];                 
                 }
                 else {
                    return $data_now[0]-$data_nascita[0]-1;
                 } 
              }
              else {                
                 return $data_now[0]-$data_nascita[0]-1;
              }
           }  
           else 
           {
               return 0;
           }
        }           
}

?>
