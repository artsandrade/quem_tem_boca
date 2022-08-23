<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Quem tem boca é um MVP desenvolvido para demonstrar as habilidades técnicas do desenvolvedor.">
  <meta name="author" content="Arthur Souza Andrade">
  <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" />

  <title>Quem Tem Boca</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-default">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Cadastre-se!</h1>
              </div>
              <form class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" placeholder="Nome">
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-5 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="zip_code" placeholder="CEP">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="street" placeholder="Endereço">
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="complement" placeholder="Complemento">
                  </div>
                  <div class="col-sm-12 col-md-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="neighborhood" placeholder="Bairro">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="city" placeholder="Cidade">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="E-mail">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Senha">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password_confirmation" placeholder="Repita a senha">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block">
                  Cadastrar
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{route('login')}}">Tem uma conta? Faça login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>