<?php

require_once("../../conexao.php");

   if(isset($_POST['btnCadastrar'])) { 

       $nomeUsuario = $_POST['nomeUsuario'];
       $tipoUsuario = $_POST['tipoUsuario'];
       $senhaUsuario =md5($_POST['senhaUsuario']);
       $emailUsuario = $_POST['emailUsuario'];
      
      //cadastrar dados do usuario

       $inserir = mysqli_query($con,
       "insert into usuario
       (nomeUsuario,senhaUsuario,categoriaUsuario,emailUsuario)
         VALUES ('$nomeUsuario','$senhaUsuario','$tipoUsuario','$emailUsuario');
      ");
           if($inserir){

            header("location:../../admin/paginas_admin/admin_usuarios.php");
            
           }else{

            header("location:../../admin/paginas_admin/admin_usuarios.php");
           }

       } 

