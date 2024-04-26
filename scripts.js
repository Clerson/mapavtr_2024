
function atualizaOdomVtr(str) {
  if (str == "") {
    document.getElementById("odomentr").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("odomentr").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","mapadet/buscas.php?idvtr="+str,true);
    xmlhttp.send();
  }
};

  function mudarFotoMotorista(str) {
  if (str == "") {
    document.getElementById("img").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("img").innerHTML = this.responseText;
  }
  xhttp.open("GET", "mapadet/buscas.php?codmil="+str);
  xhttp.send();
};

 function mostrarFotoVtr(str) {
  if (str == "") {
    document.getElementById("vtr").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("vtr").innerHTML = this.responseText;
  }
  xhttp.open("GET", "mapadet/buscas.php?id="+str);
  xhttp.send();
}

function atualizaHoraChegada() {  
    var d = new Date();
    var currentHours = d.getHours();
    var currentMins = d.getMinutes();
    currentHours = ("0" + currentHours).slice(-2);
    currentMins = ("0" + currentMins).slice(-2);
   document.getElementById("horaentr").value = currentHours + ":" + currentMins;
   document.getElementById("status").value = 'fechada';
   document.getElementById("status").style.background = '';
 };

 if (document.getElementById("status").value == 'aberta') {
      document.getElementById("status").style.background = "#ffcc00"};

  if (document.getElementById("destino").value != 'Ocorrencia') {
    document.getElementById("rai").style.display = "none"};

function mostrarCampoNumRai(val) {
    if (val == 'Ocorrencia') { document.getElementById("rai").style.display = "block";
  }
    else { document.getElementById("rai").style.display = "none"; }
};


function mudarFotoOficialDia(str) {
  if (str == "") {
    document.getElementById("img").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("img").innerHTML = this.responseText;
    $("#img").addClass("col-sm-1");
  }
  xhttp.open("GET", "mapas/buscas.php?idofdia="+str);
  xhttp.send();
};

function mudarFotoChefe(str) {
  if (str == "") {
    document.getElementById("imgChefe").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("imgChefe").innerHTML = this.responseText;
    $("#imgChefe").addClass("col-sm-1");
  }
  xhttp.open("GET", "mapas/buscas.php?idChefe="+str);
  xhttp.send();
};

function mudarFotoTel1(str) {
  if (str == "") {
    document.getElementById("imgTel1").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("imgTel1").innerHTML = this.responseText;
    $("#imgTel1").addClass("col-sm-1");
  }
  xhttp.open("GET", "mapas/buscas.php?idTel1="+str);
  xhttp.send();
};

function mudarFotoTel2(str) {
  if (str == "") {
    document.getElementById("imgTel2").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("imgTel2").innerHTML = this.responseText;
    $("#imgTel2").addClass("col-sm-1");
  }
  xhttp.open("GET", "mapas/buscas.php?idTel2="+str);
  xhttp.send();
};

$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"veiculos/card.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }

 $('#search_text').change(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });


 function load_data(status)
 {
  $.ajax({
   url:"veiculos/card.php",
   method:"POST",
   data:{status:status},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#filtra_status').change(function(){
  var status = $(this).val();
  if(status != '')
  {
   load_data(status);
  }
  else
  {
   load_data();
  }
 });
});