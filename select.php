<?

include_once 'select.class.php';
$opt = new SelectList();

if(isset($_POST['id_reg']))
{
	echo $opt->ShowProvince();
	die;
}

if(isset($_POST['id_pro']))
{
	echo $opt->ShowComuni();
	die;
}

if(isset($_POST['id_pos']))
{
    
	echo $opt->ShowSede();
	die;
}

if(isset($_POST['id_pos_citta'])) 
{
    if(($_POST['id_sede'])=="3")
    echo $opt->ShowAllPosizioniCitta();
    else
	echo $opt->ShowPosizioniCitta();
	die;
}

if(isset($_POST['id_filtro_pos']))
{
    
	echo $opt->ShowPosizioneCandidati();
	die;
}

if(isset($_POST['id_filtro_sede']))
{
    
	echo $opt->ShowFiltroSedeCandidati();
	die;
}
if(isset($_POST['id_filtro_titolo']))
{
    
	echo $opt->ShowFiltroTitoloCandidati();
	die;
}

if(isset($_POST['id_filtro_eta']))
{
    
	echo $opt->ShowFiltroEtaCandidati();
	die;
}

if(isset($_POST['id_candidato']))
{
    
	echo $opt->ShowMoreInfoCandidato();
	die;
}


?>