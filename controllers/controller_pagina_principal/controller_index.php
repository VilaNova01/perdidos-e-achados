<?php

// PERDIDOS INICIO *****************************************************

if(isset($_POST['btnCadastrar'])) {

    if ($_POST['tipoPerdido'] == "P") {

    $nomeR = $_POST['NomeR'];
    $docR = $_POST['DocumentoR'];
    $enderecoR = $_POST['EnderecoR'];
    $teleR = $_POST['TelefoneR'];
    $emailR = $_POST['EmailR'];
    $localP = $_POST['localP'];
    $nomeP = $_POST['NomeP'];
    $generoP = $_POST['GeneroP'];
    $idadeP = $_POST['idadeP'];
    
    $dataDesapareceuP = $_POST['DataDesapareceuP'];
    $descriacaoP = $_POST['DescricaoP'];
    $fotoP = $_FILES['FotoP']['name'];

        //upload da imagen
        if(isset($fotoP)){
            $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
            $pasta="upload/pessoas/";
            $nomeImagen=uniqid().".$extensao";
            //codigo que faz o upload da imagen
            move_uploaded_file($_FILES['FotoP']['tmp_name'],$pasta.$nomeImagen);

        }
        //cadastrar dados da pessoa perdida
    $inserir = mysqli_query($con,
        "insert into pessoa_perdida
    (nomeResponsavel,documento_responsavel,nomePerdido,genero_perdido,telefoneResponsavel,idade_perdido,dataDesapareceu,descricao,enderecoResponsavel,emailResponsavel,foto,achei,localPerda,id_usuario)
      VALUES ('$nomeR','$docR','$nomeP','$generoP','$teleR','$idadeP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$nomeImagen','n','$localP','1');
   ");

        if($inserir){

        }else{
            echo "nao :'$nomeR','$docR','$nomeP','$generoP','$teleR','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n'".mysqli_error($con);
        }



}else if($_POST['tipoPerdido']=="D"){

        $nomeR = $_POST['NomeR'];
        $docR = $_POST['DocumentoR'];
        $enderecoR = $_POST['EnderecoR'];
        $teleR = $_POST['TelefoneR'];
        $emailR = $_POST['EmailR'];
        $generoP = $_POST['GeneroR'];
        

        $nomeP = $_POST['DocPerdido'];


        $descriacaoP = $_POST['DescricaoP'];
        $localP = $_POST['localP'];

        $fotoP = $_FILES['FotoP']['name'];

        //upload da imagen
        if(isset($fotoP)){
            $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
            $pasta="upload/documentos/";
            $nomeImagen=uniqid().".$extensao";
            //codigo que faz o upload da imagen
            move_uploaded_file($_FILES['FotoP']['tmp_name'],$pasta.$nomeImagen);
        }

        //cadastrar dados de documentos perdidos
        $inserir = mysqli_query($con,
            "insert into documento_perdido
    (nomeResponsavel,identificacao_documento,tipo_documento,telefoneResponsavel,descricao,enderecoResponsavel,emailResponsavel,foto,achei,localPerda,id_usuario)
      VALUES ('$nomeR','$docR','$nomeP','$teleR','$descriacaoP','$enderecoR','$emailR','$nomeImagen','n','$localP','1');
   ");


        if($inserir){

        }else{
            echo "nao :'$nomeR','$docR','$nomeP','$generoP','$teleR','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n'".mysqli_error($con);
        }
    }


    }

// PERDIDOS FIM .............................................


// ACHEI INICIO *****************************************************


if(isset($_POST['btnCadastrar2'])) {



    // PESSOAS ACHADAS

    if ($_POST['tipoAchado'] == "P") {

    $nomeR = $_POST['Nome_responsaval_achou'];
    $nomeAchado = $_POST['NomeAchado'];

    $enderecoR = $_POST['Endereco_responsavel_achou'];
    $teleR = $_POST['Tel_responsavel_achou'];
   
    $localAchado = $_POST['LocalAchado'];
   
    $generoAchado = $_POST['GeneroAchado'];
    $idadeAchado = $_POST['IdadeAchado'];
 
    $descriacaoAchado = $_POST['DescricaoAchado'];
    $fotoP = $_FILES['FotoAchado']['name'];

        //UPLOAD DA IMAGEM DO ACHADO

        if(isset($fotoP)){
            $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
            $pasta="upload/pessoas/";
            $nomeImagen=uniqid().".$extensao";
            //codigo que faz o upload da imagen
            move_uploaded_file($_FILES['FotoAchado']['tmp_name'],$pasta.$nomeImagen);

        }

        //CADASTRAR PESSOA ACHADA

    $inserir = mysqli_query($con,
        "insert into pessoa_achada
    (nome_pessoa_achada,genero_pessoa_achada,telefone_responsavel,idadeAchado,descricao,morada_responsavel,FotoAchado,local_encontrado)
      VALUES ('$nomeAchado','$generoAchado','$teleR','$idadeAchado','$descriacaoAchado','$enderecoR','$nomeImagen','$localAchado');
   ");
        if($inserir){
            
        }else{
            echo "nao :'$nomeAchado','$generoAchado','$teleR','$idadeAchado','$descriacaoAchado','$enderecoR','$nomeImagen','$localAchado'".mysqli_error($con);
        }



// DOCUMENTOS ACHADOS

}else if($_POST['tipoAchado']=="D"){

        $nomeR = $_POST['NomeR'];
        
        $enderecoR = $_POST['Morada_responsavel_achou'];
        $teleR = $_POST['Tel_responsavel_achou'];
        $emailR = $_POST['email_responsavel_achou'];
        $generoP = $_POST['GeneroAchado'];

        $nomeDoc = $_POST['DocAchado'];

        $descriacaoP = $_POST['DescricaoAchado'];
        $localP = $_POST['LocalAchado'];
        $fotoP = $_FILES['FotoAchado']['name'];
        $proprietario = $_POST['Proprietario'];

        //upload da imagen
        if(isset($fotoP)){
            $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
            $pasta="upload/documentos/";
            $nomeImagen=uniqid().".$extensao";
            //codigo que faz o upload da imagen
            move_uploaded_file($_FILES['FotoAchado']['tmp_name'],$pasta.$nomeImagen);
        }

        //cadastrar dados de documentos Perdidos
        $inserir = mysqli_query($con,
            "insert into documento_achado
    (nome_responsavel,tipo_documento,telefone_responsavel,descricao,morada_responsavel,email_responsavel,foto,local_encontrado,proprietario)
      VALUES ('$nomeR','$nomeDoc','$teleR','$descriacaoP','$enderecoR','$emailR','$nomeImagen','$localP','$proprietario');
   ");


        if($inserir){

        }else{
            echo mysqli_error($con);
        }
    }


    }

// ACHEI FIM .............................................