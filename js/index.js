

function carregar_pagina1(){
    //PESSOAS PROCURADAS
    let pessoas_procuradas=document.querySelector("#pessoas_procuradas")
    let item=document.querySelector("#pessoas_procuradas")
    
    let i=0;
    let pexel=0
   //
      
   let documentos_procurados=document.querySelector("#documentos_procurados")
   let item2=document.querySelector("#documentos_procurados")
    
   let i2=0;
   let pexel2=0
   
   ////////
   let divs1 = document.querySelectorAll('div#pessoas_procuradas');
 
 // Pega a última div encontrada
   let ultimaDiv1 = divs1[divs1.length - 1];
 // Agora você pode fazer o que quiser com a última div
 
  // Obtém as dimensões e posição da última div
 var dimensoes1 = ultimaDiv1.getBoundingClientRect();
 // Obtém a margem direita da última div
 var margemDireita1 =parseInt(dimensoes1.right - dimensoes1.width);

//alert(margemDireita1);

   ///////
setInterval(function(){

// MUDAR A COR DE FUNDO DO MENU     
   /*   let menuNav=document.getElementById('menuNav');
      let elemento=document.getElementById('CategoriasDoc');

      let scrollVertical = window.scrollY || window.pageYOffset;
      let posicaoDiv = elemento.getBoundingClientRect();
      
      if (scrollVertical>posicaoDiv.top) {
          menuNav.style.backgroundColor = 'rgb(1, 11, 26)';
         }else{

            menuNav.style.backgroundColor = 'rgb(1, 11, 26)';
         }*/

// PESSOAS E DOCUMEMTOS PROCURADAS

pexel=i.toString()+"px"
item.style.marginRight=pexel

pexel2=i2.toString()+"px"
item2.style.marginRight=pexel


// Seleciona todas as divs com o id "pessoas_procuradas"
  let divs = document.querySelectorAll('div#pessoas_procuradas');
  let divs2 = document.querySelectorAll('div#documentos_procurados');

// Pega a última div encontrada
  let ultimaDiv = divs[divs.length - 1];
  let ultimaDiv2 = divs2[divs2.length - 1];
// Agora você pode fazer o que quiser com a última div

 // Obtém as dimensões e posição da última div
var dimensoes = ultimaDiv.getBoundingClientRect();
var dimensoes2 = ultimaDiv2.getBoundingClientRect();
// Obtém a margem direita da última div
margemDireita =parseInt(dimensoes.right - dimensoes.width);
var margemDireita2 =parseInt(dimensoes2.right - dimensoes2.width);


if(margemDireita<0){
  //  let pp="<div class = 'col-md-6 col-lg-4 col-xl-3 p-2 best text-center' id='pessoas_procuradas'><div class = 'collection-img position-relative'> <img src = '<?php echo 'upload/pessoas/'.$dados['foto'] ?>' width='200px' height='300px'> </div> <div class = 'text-center'><p class = 'text-capitalize my-1'><?php echo $dados['nomePerdido'] ?></p><p  class = 'text-capitalize my-1'>Genero:<?php echo $dados['genero_perdido']?></p><p  class = 'text-capitalize my-1'>Contacto:<?php echo $dados['telefoneResponsavel']  ?></p><button type = 'button' class = 'btn botaoRedondo1' data-bs-toggle='modal' data-bs-target='#exampleModal2'><i class = 'fa fa-search'></i>Achei</button> </div> </div>";
//document.getElementById('pessoas_procuradas').innerHTML =  pp;     
location.reload()
}
if(margemDireita2<0){
   
location.reload()
}

i=i-5;
i2=i2-5;
///////////////////////////////

}, 100)


}

    function frmDocumentos(){
     
        let genero=document.getElementById("Genero");
        let lgDadosDesaparecido=document.getElementById("lgDadosDesaparecido");
        let localPerda=document.getElementById("localPerda");
        let idade=document.getElementById("idade");
        let tipoDoc=document.getElementById("tipoDoc");
        let nome=document.getElementById("nome");
        let idade_lbl=document.getElementById("idade_lbl");

        localPerda.style.display='block';
        nome.style.display='none';
        
        idade.style.display='none';
        idade_lbl.style.display='none';

        tipoDoc.style.display='block';
        lgDadosDesaparecido.innerText="Dados do Documento";
     
        genero.style.display='none';

    }
 
     function frmDocumentosAchados(){
        
        // outros quientos
        let generoAchado=document.getElementById("GeneroAchado");
        let docAchado=document.getElementById("tipoDocAchado");
        let nomeAchado=document.getElementById("NomeAchado");
        let idadeAchado = document.getElementById("IdadeAchado");
        let proprietario = document.getElementById("Proprietario");

         proprietario.style.display='block';
         docAchado.style.display='block';
         generoAchado.style.display='none';   
         nomeAchado.style.display='none';
         idadeAchado.style.display='none';
    }
    function frmPessoasAchadas(){
        
        // outros quientos
  
        let generoAchado=document.getElementById("GeneroAchado");
        let docAchado=document.getElementById("tipoDocAchado");
        let nomeAchado=document.getElementById("NomeAchado");
         let proprietario = document.getElementById("Proprietario");

         proprietario.style.display='none';
         docAchado.style.display='none';
         generoAchado.style.display='block';   
         nomeAchado.style.display='block'


    }

    function frmPessoas(){
        let genero=document.getElementById("Genero");
        let lgDadosDesaparecido=document.getElementById("lgDadosDesaparecido");
        lgDadosDesaparecido.innerText="Dados do Desaparecido";
    }