<?php
     header("location:paginas_admin/index.php");   
   /*  session_start();
   if($_GET["pagina"]=="terminar_sessao"){
      
     unset($_SESSION["id_usuario"]);
    
    }
    
    if(isset($_SESSION["id_usuario"])){

        require_once("../conexao.php");

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css"  />
    <link rel="stylesheet" href="css/style.css" />
    <title>Perdidos e Achados</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg menu_nav1 fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar">
           
          </span>
        </button>
       

         
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
       
          <ul class="navbar-nav d-flex ms-auto my-3 my-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2 textoMenu"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              Relatorios
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="relatorios_paginas/geral.php">Gerar Relatorio Geral</a></li>
              
              
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav menu_nav1"
      tabindex="-1"
      id="sidebar"
    >
    <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          > <img src="../fotos/icones/Logo1.png"  alt = "site icon" width="250px"></a>
      <div class="offcanvas-body p-0">
        <nav>
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 textoMenu">
                Pagina Principal
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3 active textoMenu">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span >Painel Administrativo</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Menu
              </div>
            </li>
            <li>
              <a href="paginas_admin/admin_usuarios.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Usuarios</span>
              </a>
            </li>
           
            <li>
              <a href="paginas_admin/admin_pessoasprocuradas.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pessoas Procuradas</span>
              </a>
            </li>
            <li>
              <a href="paginas_admin/admin_documentosprocurados.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Documentos Procurados</span>
              </a>
            </li>
            <li>
              <a href="paginas_admin/admin_pessoasencontradas.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pessoas Encontradas</span>
              </a>
            </li>
            <li>
              <a href="paginas_admin/admin_documentosencontrados.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Documentos Encontrados</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
           
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
       
        <div class="row">

          <a href="paginas_admin/admin_pessoasencontradas.php" class="col-md-3 mb-3">
            <div class="card corLaranjaEscuro text-white h-100">
              <div class="card-body py-5">Pessoas Encontradas</div>
             
              <h1 class="text-center">
                    <?php

     $buscar=mysqli_query($con,"select count(id_pessoa_achada) from pessoa_achada;");
 
       if($buscar){
           while($dados=mysqli_fetch_array($buscar)) {
            echo $dados['count(id_pessoa_achada)'];
            }
       } 
       ?>
              </h1>
             
            </div>
      </a>

          <a href="paginas_admin/admin_pessoasprocuradas.php" class="col-md-3 mb-3">
            <div class="card corLaranjaEscuro text-light h-100">
              <div class="card-body py-5">Pessoas Desaparecidas</div>
                  <h1 class="text-center">
                  
    <?php

     $buscar=mysqli_query($con,"select count(id_pessoa_perdida) from pessoa_perdida where achei='n';");
 
       if($buscar){
           while($dados=mysqli_fetch_array($buscar)) {
            echo $dados['count(id_pessoa_perdida)'];
            }
       } 
       ?>
                </h1>
         
            </div>
      </a>
          <a href="paginas_admin/admin_documentosencontrados.php" class="col-md-3 mb-3">
            <div class="card corLaranjaEscuro text-white h-100">
              <div class="card-body py-5">Documentos Encontrados</div>
                  <h1 class="text-center">
                  
                    <?php

     $buscar=mysqli_query($con,"select count(id_documento_achado) from documento_achado;");
 
       if($buscar){
           while($dados=mysqli_fetch_array($buscar)) {
            echo $dados['count(id_documento_achado)'];
            }
       } 
       ?>
                  </h1>
           
            </div>
      </a>
          <a href="paginas_admin/admin_documentosprocurados.php" class="col-md-3 mb-3">
            <div class="card corLaranjaEscuro text-white h-100">
              <div class="card-body py-5">Documentos Desaparecidos</div>
                  <h1 class="text-center">
                    
                     <?php

     $buscar=mysqli_query($con,"select count(id_documento_perdido) from documento_perdido where achei='n';");
 
       if($buscar){
           while($dados=mysqli_fetch_array($buscar)) {
            echo $dados['count(id_documento_perdido)'];
            }
       } 
       ?>

                  </h1>
           
            </div>
      </a>
        </div>
        
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">

                <span><i class="bi bi-table me-2"></i></span>Pessoas Encontradas Recentemente (Ultimos 20)
                <a href="paginas_admin/admin_pessoasencontradas.php">
                  <button class="btn btn-primary" type="submit">
              Consultar
                <i class="bi bi-search"></i>
              </button>
            </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-success"
                    style="width: 100%"
                  >
                  <thead>
                      <tr class="table-success">
                      <th class="table-success">Imagem</th>
                       <th class="table-success">Nome</th>
                        <th>Idade</th>
                        <th>Genero</th>
                        <th>Encontrado</th>
                        <th>Descrição</th>
                        <th>Responsavel</th>
                        <th>Tel.Responsavel</th>
                        <th>Morada.Responsavel</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php

$buscar=mysqli_query($con,"select * from pessoa_achada order by id_pessoa_achada desc;");
$i=0;
while($dados=mysqli_fetch_array($buscar)) {
    if ($i<=20) {
    ?>
                      <tr class="table-success">
                      <td class="table-success"><img class="img-thumbnail" id="imgEncontrados" src = "<?php echo '../upload/pessoas/'.$dados['FotoAchado'] ?>" width="40px" height="50px"></td>
                        <td class="table-success"><?php echo $dados['nome_pessoa_achada'] ?></td>
                        <td><?php echo $dados['idadeAchado'] ?></td>
                        <td><?php echo $dados['genero_pessoa_achada'] ?></td>
                           <td><?php echo $dados['local_encontrado'] ?></td>
                              <td><?php echo $dados['descricao'] ?></td>
                              <td><?php echo $dados['nome_responsavel'] ?></td>
                        <td><?php echo $dados['telefone_responsavel'] ?></td>
                        <td><?php echo $dados['morada_responsavel'] ?></td>
                       
                      </tr>
                      <?php
                      }
                     $i++; 

                }
             ?>
                     
                    </tbody>
                   
                  </table>
                </div>
              </div>



              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Documentos Encontradas Recentemente (Ultimos 20) 
                <a href="paginas_admin/admin_documentosencontrados.php">
                 <button class="btn btn-primary" type="submit">
                      Consultar
                <i class="bi bi-search"></i>
              </button>
            </a>
            
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                      <th>Imagem do Documento Achado</th>
                       <th>Tipo de Docummento</th>
                        <th>Local Achado</th>
                        <th>Responsavel que Achou</th>
                      
                        <th>Telefone do Responsavel</th>
                        <th>Email do Responsavel</th>
                        <th>Morada do Responsavel</th>
                        <th>Descrição</th>            
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php
$buscar=mysqli_query($con,"select * from documento_achado  order by id_documento_achado desc;");
$i=0;
while($dados=mysqli_fetch_array($buscar)) {
    if ($i<=20) {
    ?>
                      <tr>
                       <td><img id="imgEncontrados" src = "<?php echo '../upload/documentos/'.$dados['foto'] ?>" width="40px" height="50px"></td>
                        <td><?php echo $dados['tipo_documento'] ?></td>
                        <td><?php echo $dados['local_encontrado'] ?></td>
                        <td><?php echo $dados['nome_responsavel'] ?></td>
                           <td><?php echo $dados['telefone_responsavel'] ?></td>
                             <td><?php echo $dados['email_responsavel'] ?></td>
                               <td><?php echo $dados['morada_responsavel'] ?></td>
                              <td><?php echo $dados['descricao'] ?></td>
                          

                        
                      </tr>
                      <?php
                      
                }

               $i++; 

                }
             ?>
                     
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
<?php

}else {
  header("location:login.php");
}

?>