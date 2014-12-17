<?
// Fill up array with names
$a[]="Anna";
$a[]="Boris";
$a[]="Cinzia";
$a[]="Diana";
$a[]="Eva";
$a[]="Fiona";
$a[]="Giulia";
$a[]="Hugo";
$a[]="Ilaria";
$a[]="Johnny";
$a[]="Ketty";
$a[]="Linda";
$a[]="Noemi";
$a[]="Osvaldo";
$a[]="Pietro";
$a[]="Amanda";
$a[]="Rosa";
$a[]="Ciro";
$a[]="Doris";
$a[]="Elva";
$a[]="Elena";
$a[]="Simona";
$a[]="Tony";
$a[]="Violetta";
$a[]="Lisa";

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q=strtolower($q); $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name,0,$len))) {
      if ($hint==="") {
        $hint=$name;
      } else {
        $hint .= ", $name";
         
      }
    }
  }
}

// Output "no suggestion" if no hint were found
// or output the correct values
echo $hint==="" ? "Nessun suggerimento" : $hint;
?> 