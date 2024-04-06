<?php

require_once("../conexao.php");

if(isset($_POST['btnCadastrar'])) {

    if ($_POST['tipoPerdido'] == "P") {

        $nomeR = $_POST['NomeR'];
        $docR = $_POST['DocumentoR'];
        $enderecoR = $_POST['EnderecoR'];
        $teleR = $_POST['TelefoneR'];
        $emailR = $_POST['EmailR'];

        $nomeP = $_POST['NomeP'];
        $generoP = $_POST['GeneroP'];
        $dataNasciP = $_POST['DataNascP'];
        $dataDesapareceuP = $_POST['DataDesapareceuP'];
        $fotoP = $_FILES['FotoP']['name'];
        $descriacaoP = $_POST['DescricaoP'];

        $inserir = mysqli_query($con,
            "insert into pessoasperdidas
       (nomeResponsavel,documentoIdentificacao,nomePerdido,genero,telefoneResponsavel,dataNascemento,dataDesapareceu,descricao,enderecoResponsavel,emailResponsavel,foto,achei)
         VALUES ('$nomeR','$docR','$nomeP','$generoP','$teleR','$dataNasciP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n');
      ");
        if($inserir){
            echo "sim";
        }else{
            echo "nao :'$nomeR','$docR','$nomeP','$generoP','$teleR','$dataNasciP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n'".mysqli_error($con);
        }

    }else{


    }


}

?>

<!doctype html>
<html lang="pt-p">
<head>
    <meta charset="utf-8">
    <title>Página Inicial</title>
    <style>
        body{
           background-color: #575a5f;

        }
        .menuNav{
            margin-top: -0.4%;
            background-color: #575a5f;
        }
        .conteudo1{
            margin-top: 10%;
        }
        .conteudo1 h1{
            font-family: impact;
            font-size: 3.6em;
            color: #ffffff;
        }

    </style>
</head>
<link rel="stylesheet" href="../btp/css/bootstrap.min.css" type="text/css">
<body>
     <!-- MENU DE NAVEGACAO INICIO-->
     <?php require_once("paginas/requires_pagina_principal/menu_pagina_principal.php") ?>
     <!--MENU DE NAVEGACAO FIM-->
<div class="container conteudo1">

    <div class="row align-items-lg-center">
        <div class="col-lg-4">

            <h2 class="text-info">Precisamos de um Reconhecimento Facial e do Nome da Pessoa</h2>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </div>

</div>

<script src="../btp/js/bootstrap.min.js"></script>
</body>
</html>