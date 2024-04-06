 <!-- Menu de Navegaçao -->

<nav class="navbar navbar-expand-lg fixed-top menuNav" id="menuNav">
    <div class="container-fluid" >
        <a class="navbar-brand" href="#">
            <img src="http://localhost/perdidos/fotos/icones/logo1.png" width="70%">
        </a>
        <div class = "order-lg-2 nav-btns">
                
        <button type = "button" class = "btn position-relative botaoRedondo1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            <i class = "fa fa-search"></i>Achei
                </button>
                <button type = "button" class = "btn position-relative botaoRedondo1" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                    Encontrados
                </button>
            </div>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                        <a <?php  if($_SERVER['REQUEST_URI']=="/perdidos/index.php"){ echo "class='actual'";  } ?>  href = "http://localhost/perdidos/index.php">Home</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a <?php  if($_SERVER['REQUEST_URI']=="/perdidos/paginas/pessoaperdidas.php"){ echo "class='actual'";  } ?> href = "http://localhost/perdidos/paginas/pessoaperdidas.php">Pessoas Perdidas</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a <?php  if($_SERVER['REQUEST_URI']=="/perdidos/paginas/documentoperdidos.php"){ echo "class='actual'";  } ?> href = "http://localhost/perdidos/paginas/documentoperdidos.php">Documentos Perdidos</a>
                    </li>
                   
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "" href = "#contactos">Contacte-nos</a>
                    </li>
                    
                </ul> 

        </div>
    </div>

</nav>
<!--Fim Menu de Navegação -->

