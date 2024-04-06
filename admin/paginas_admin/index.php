<?php
   require_once("../../conexao.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/admin_index2.css" />
    <style>
     
    </style>
    <title>Inicio</title>
</head>
<body>
 
<?php  require_once("../requires/admin_menu_lateral.php"); ?>


<div class="col-lg-9 principal ">
<div class="col-lg-12 caixas">
   <a href="admin_documentosencontrados.php" class="col-lg-2">
    <p>12</p> 
     <img src="../../fotos/icones/Documento1.png" alt="" srcset="">
     <p>Encontrados</p> 
   </a>

   <a href="admin_documentosprocurados.php" class="col-lg-2">
    <p>90</p> 
     <img src="../../fotos/icones/Documento1.png" alt="" srcset="">
     <p>Procurados</p> 
   </a>

    <a href="admin_pessoasencontradas.php" class="col-lg-2">
    <p>8</p> 
    <img src="../../fotos/icones/Pessoa1.png" alt="" srcset="">
     <p>Encontradas</p> 
   </a>

    <a href="admin_pessoasprocuradas.php" class="col-lg-2">
    <p>1200</p> 
    <img src="../../fotos/icones/Pessoa1.png" alt="" srcset="">
     <p>Procuradas</p> 
   </a>

    <a href="../relatorios_paginas/geral.php" class="col-lg-2 btn_relatorio" id="btn_relatorio">
    <p>Gerar</p> 
    <img src="../../fotos/icones/Relatorio.png" alt="" srcset="">
     <p>Relatorio</p> 
   </a>
</div>

                <div class="table-responsive tabela">
                <h5 class="text-center">Pessoas Encontradas - Recentes</h5>

                <form class="row col-lg-12 div_pesquisar" method="get">
             
               <a href="admin_pessoasencontradas.php?pagina=pessoas_encontradas" class="btn btn_pesquisar col-lg-1">  <img src="../../fotos/icones/Pesquisa2.png" alt="" srcset=""></a>
               </form>

                  <table class="table" style="width: 100%" >
                  <thead class="tabela_cabecalho">
                      <tr>
                      <th>Imagem</th>
                      <th>Nome Completo</th>
                        <th>Idade</th>
                        <th>Genero</th>
                        <th>Local Encontrado</th>
                        <th>Descrição</th>
                        <th>Responsavel</th>
                        <th>Tel Responsavel</th>
                        <th>Morada Responsavel</th>
                        <th class="Cor_Fundo_Pricipal">Pessoas.Identificadas</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        <?php

$buscar=mysqli_query($con,"select * from pessoa_achada order by id_pessoa_achada desc;");
$i=0;
while($dados=mysqli_fetch_array($buscar)) {
    if ($i<=20) {
    ?>
                      <tr class="tabela_linha_informacoes">
                      <td><img class="img-thumbnail" id="imgEncontrados" src = "<?php echo '../../upload/pessoas/'.$dados['FotoAchado'] ?>" width="40px" height="50px"></td>
                        <td><?php echo $dados['nome_pessoa_achada'] ?></td>
                        <td><?php echo $dados['idadeAchado'] ?></td>
                        <td><?php echo $dados['genero_pessoa_achada'] ?></td>
                           <td><?php echo $dados['local_encontrado'] ?></td>
                              <td><?php echo $dados['descricao'] ?></td>
                              <td><?php echo $dados['nome_responsavel'] ?></td>
                        <td><?php echo $dados['telefone_responsavel'] ?></td>
                        <td><?php echo $dados['morada_responsavel'] ?></td>
                        <td class="Cor_Fundo_Pricipal" style="font-size: 1.5em;font-weight: bold;">
                <?php 
$nomePA=$dados['nome_pessoa_achada'];
$generoPA=$dados['genero_pessoa_achada'];
$idPA=$dados['id_pessoa_achada'];

$buscar2=mysqli_query($con,
  "select count(id_pessoa_perdida) 
   from pessoa_perdida
   where nomePerdido like '%$nomePA%'
   and genero_perdido='$generoPA';");

    $numero=0;

   while($dados2=mysqli_fetch_array($buscar2)) {
    $numero=$dados2['count(id_pessoa_perdida)'];

    echo $dados2['count(id_pessoa_perdida)'];
   }
    if ($numero!=0) {
    
        ?>
    <a
     href="sub_paginas_admin/admin_pessoas_encontradas_sub_pagina.php?
     id=<?php echo $idPA ?>&nome=<?php echo $nomePA ?>&genero=<?php echo $generoPA ?>
     " class="btn btn_visualizar">
    Visualizar
  </a>

  <?php
   }
                
?>
</td>

 </tr>
                    
 <?php
    }
  }
  ?>
    </tbody>
    </table>
    </div>
          


            
                <div class="table-responsive tabela">
                <h5 class="text-center">Documentos Encontradas - Recentes</h5>

              <form  class="row col-lg-12 div_pesquisar">
              
               <a href="admin_documentosencontrados.php?pagina=documentos_encontrados" type="submit" name="btn_pesquisar_documento" class="btn btn_pesquisar col-lg-1">  <img src="../../fotos/icones/Pesquisa2.png" alt="" srcset=""></a>
              </form>

                  <table class="table" style="width: 100%">
                    <thead class="tabela_cabecalho">
                      <tr>
                      <th>Imagem</th>
                       <th>Tipo.Documento</th>
                       <th>Proprietario</th>
                        <th>Local.Achado</th>
                        <th>Responsavel.Achou</th>
                      
                        <th>Tel.Resp</th>
                       
                        <th>Morada.Resp</th>
                        <th>Descrição</th>            
                        <th class="Cor_Fundo_Pricipal">Documentos.Identificados</th> 
                      </tr>
                    </thead>
                    <tbody>
                        <?php


$buscar=mysqli_query($con,"select * from documento_achado  order by id_documento_achado desc;");
$i=0;
while($dados=mysqli_fetch_array($buscar)) {
    if ($i<=20) {
    ?>
                      <tr class="tabela_linha_informacoes">
                       <td><img class="img-thumbnail" id="imgEncontrados" src = "<?php echo '../../upload/documentos/'.$dados['foto'] ?>" width="40px" height="50px"></td>
                        <td><?php echo $dados['tipo_documento'] ?></td>
                        <td><?php echo $dados['proprietario'] ?></td>
                        <td><?php echo $dados['local_encontrado'] ?></td>
                        <td><?php echo $dados['nome_responsavel'] ?></td>
                           <td><?php echo $dados['telefone_responsavel'] ?></td>
                             
                               <td><?php echo $dados['morada_responsavel'] ?></td>
                              <td><?php echo $dados['descricao'] ?></td>
                          
                              <td class="Cor_Fundo_Pricipal" style="font-size: 1.5em;font-weight: bold;">
                <?php 
$tipoDA=$dados['tipo_documento'];
$nomePropietario=$dados['proprietario'];
$idDA=$dados['id_documento_achado'];
$nomePropietario=$dados['proprietario'];

$buscar2=mysqli_query($con,
  "select count(id_documento_perdido) 
   from documento_perdido
   where tipo_documento like '%$tipoDA%'
   and nomeResponsavel  like '%$nomePropietario%' ;");

    $numero=0;
   while($dados2=mysqli_fetch_array($buscar2)) {
    $numero=$dados2['count(id_documento_perdido)'];
    echo $dados2['count(id_documento_perdido)'];
   }

   if ($numero!=0) {
   ?>
    <a href="sub_paginas_admin/admin_documentos_encontrados_sub_pagina.php?
    id=<?php echo $idDA ?>&
    tipo=<?php echo $tipoDA ?>&
    nomeR=<?php echo $nomePropietario ?>"
     class="btn btn_visualizar">
    Visualizar
  </a>
  <?php
                }
            
             ?>
                        </td>
                        
                      </tr>
                      <?php
                      
                }

               $i++; 

                }
             ?>
                     
                    </tbody>
                   
                  </table>
                </div>
           

<!--
<div class="col-lg-6 align-middle estatistica">
  
 <h3>Pessoas Perdidas</h3>
 <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
 <div class="progress-bar bg-success" style="width: 25%">12</div>
</div>
<div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar bg-info" style="width: 50%"></div>
</div>
<div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar bg-warning" style="width: 75%"></div>
</div>
<div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar bg-danger" style="width: 100%"></div>
</div>

</div>-->


</div>

<script>

function enviar_sms(params) {
  
const myHeaders = new Headers();
myHeaders.append("Authorization", "App 145e8bf8155ab52e25b9de932bb0252b-49830d3b-4425-4a8b-b3f5-534deac9893b");
myHeaders.append("Content-Type", "application/json");
myHeaders.append("Accept", "application/json");

const raw = JSON.stringify({
    "messages": [
        {
            "destinations": [{"to":"244930810346"}],
            "from": "ServiceSMS",
            "text": "LOST & FOUND,\n\n Ola, imformamos ao familhar que o seu ente querido possivelmente foi encontrado"
        }
    ]
});

const requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow"
};

fetch("https://y3kzgp.api.infobip.com/sms/2/text/advanced", requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));
  /*
  let item=document.getElementById("item")
    
  

  let i=0;
  let pexel;
  setInterval(
  function() {
    
    pexel=i.toString()+"px"
    item.style.marginRight=pexel
    i=i-5;
  }, 100
 )*/
}

 </script>

<script src="./js/bootstrap.bundle.min.js"></script>

<script src="./js/jquery-3.5.1.js"></script>
</body>
</html>
