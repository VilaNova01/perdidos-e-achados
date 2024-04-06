<?php
    
    session_start();

    if(isset($_GET["pagina"])){
      
      if($_GET["pagina"]=="terminar_sessao"){
      unset($_SESSION["id_usuario"]);
      }
      
    }

    if(isset($_SESSION["id_usuario"])){

      

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <link rel="stylesheet" href="../../css/admin_index2.css" />
   
    <style>
     
    </style>
    <title>Inicio</title>
</head>
<body>
 
<nav class="navbar navbar-expand-lg bg-body-tertiary Cor_Fundo_Pricipal col-lg-3 menu1">
  <div class="container-fluid">
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      
    
      <img src="http://localhost/perdidos/fotos/icones/Menu2.png" alt="" srcset="">
    </button>

    
    <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
    <a class="navbar-brand" href="#">
       <img src="http://localhost/perdidos/fotos/icones/Logo1.png"  alt = "site icon" width="100%">
      </a>
   
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-column">

            <li <?php  if($_SERVER['REQUEST_URI']=="/perdidos/admin/paginas_admin/index.php"){ echo "class='pagina_actual'";  } ?> >

              <a href="http://localhost/perdidos/admin/paginas_admin/index.php" class="nav-link">
              <img src="http://localhost/perdidos/fotos/icones/Inicio.png" alt="" srcset="">
                <span>Inicio</span>
              </a>
            </li>
           <li <?php  if($_SERVER['REQUEST_URI']=="/perdidos/admin/paginas_admin/admin_usuarios.php"){ echo "class='pagina_actual'";  } ?>>
              <a href="http://localhost/perdidos/admin/paginas_admin/admin_usuarios.php" class="nav-link">
              <img src="http://localhost/perdidos/fotos/icones/Usuario3.png" alt="" srcset="">
                <span>Usuarios</span>
              </a>
            </li>
           
            <li <?php  if($_SERVER['REQUEST_URI']=="/perdidos/admin/paginas_admin/admin_pessoasprocuradas.php"){ echo "class='pagina_actual'";  } ?>>
              <a href="http://localhost/perdidos/admin/paginas_admin/admin_pessoasprocuradas.php" class="nav-link">
              <img src="http://localhost/perdidos/fotos/icones/Pessoa_mini2.png" alt="" srcset="">
                <span>Pessoas Procuradas</span>
              </a>
            </li>
            <li <?php  if($_SERVER['REQUEST_URI']=="/perdidos/admin/paginas_admin/admin_documentosprocurados.php"){ echo "class='pagina_actual'";  } ?>>
              <a href="http://localhost/perdidos/admin/paginas_admin/admin_documentosprocurados.php" class="nav-link">
              <img src="http://localhost/perdidos/fotos/icones/Documento_mini.png" alt="" srcset="">
                <span>Documentos Procurados</span>
              </a>
            </li>
            <li <?php  if($_SERVER['REQUEST_URI']=="/perdidos/admin/paginas_admin/admin_pessoasencontradas.php"){ echo "class='pagina_actual'";  } ?>>
              <a href="http://localhost/perdidos/admin/paginas_admin/admin_pessoasencontradas.php" class="nav-link">
              <img src="http://localhost/perdidos/fotos/icones/Pessoa_mini2.png" alt="" srcset="">
                <span>Pessoas Encontradas</span>
              </a>
            </li>
        
            <li <?php  if($_SERVER['REQUEST_URI']=="/perdidos/admin/paginas_admin/admin_documentosencontrados.php"){ echo "class='pagina_actual'";  } ?>>
              <a href="http://localhost/perdidos/admin/paginas_admin/admin_documentosencontrados.php" class="nav-link">
              <img src="http://localhost/perdidos/fotos/icones/Documento_mini.png" alt="" srcset="">
                <span>Documentos Encontrados</span>
              </a>
            </li>
         </ul>
 <br>
         <li style="list-style:none" >
              <a href="../requires/admin_menu_lateral.php?pagina=terminar_sessao" class="nav-link btn_terminar_sessao">
              <img src="http://localhost/perdidos/fotos/icones/terminar.png" alt="" srcset="">
                <span>Terminar Sessao</span>
              </a>
            </li>
    <!--  <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
    </div>
  </div>
</nav>


<script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery-3.5.1.js"></script>
</body>
</html>
<?php

}else {
  header("location:../login.php");
}

?>