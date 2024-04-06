
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Login</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" />
</head>
<body>
  <!-- Start your project here-->

  <style>
    .gradient-custom-2 {
    background-color:rgba(1, 11, 26);
    }

    
  </style>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <h4 class="mt-1 mb-5 pb-1">LOGIN</h4>
                  </div>

                  <form action="../controllers/controller_admin/controller_login.php" method="post">
                    <p></p>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example11">Email</label>
                      <input type="email" id="form2Example11" class="form-control" placeholder="Email de Acesso" name="emailUsuario" />
                      
                    </div>

                    <div class="form-outline mb-4">
                     <label class="form-label" for="form2Example22">Senha</label>
                      <input type="password" id="form2Example22" class="form-control" name="senhaUsuario" />
           
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button" name="btnLogin">Log in</button>
                  
                    </div>

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <img src="../fotos/icones/Logo1.png""  alt = "site icon" width="100%">
                
                  <p class="small mb-0">Use o seu email e senha para 
                  acessar o painel administrativo</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

  <script type="text/javascript"></script>
</body>

</html>