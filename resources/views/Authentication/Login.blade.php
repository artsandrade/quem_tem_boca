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

  <!-- Toastr Css-->
  <link href="{{asset('assets/vendor/toastr/toastr.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="bg-gradient-default">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Faça login!</h1>
                  </div>
                  <form class="user" action="javascript:void(0);">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Senha">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" id="btn_login">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{route('register_restaurant')}}">Tem um restaurante? Cadastre-o</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{route('register_user')}}">Procurando o que comer? Cadastre-se!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('assets/vendor/toastr/toastr.min.js')}}"></script>
  <script src="{{asset('assets/js/functions.js')}}"></script>
  <script src="{{asset('assets/js/pages/authentication/login.js')}}"></script>

</body>

</html>