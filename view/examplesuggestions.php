<center>
   <div id="layout">
      <section id="layout-content">
         <div id="center sx">
         </div>
         <p><b>Ricerca un nome nell'area di testo e sfrutta i suggerimenti:</b></p>
         <form>
            Nome: <input type="text" onkeyup="showHint(this.value)">
         </form>
         <p>Suggerimenti asincroni: <span id="txtHint"></span></p> 
         <div>
         </div>
      </section>
   </div>
</center>
<script>
function showHint(str) {
  if (str.length==0) {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","gethint.php?q="+str,true);
  xmlhttp.send();
}
</script>