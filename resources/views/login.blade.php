<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Get-in
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fe; /* Background color for the entire page */
    }

    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh; /* Ensure the form is vertically centered */
    }

    .form-card {
      background-color: #ffffff; /* Background color for the form card */
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
{{-- <body class="hold-transition login-page"> --}}
<body class="">
  <main class="main-content">
    <section>
      <div class="centered-form">
        <div class="form-card col-xl-4 col-lg-5 col-md-7">
          <div class="card-header pb-0 text-start">
            <h4 class="font-weight-bolder">Log In</h4>
            <p class="mb-0">Enter your username and password to sign in</p>
          </div>
          <div class="card-body">
            <form role="form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">

                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">

                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Log in</button>
                </div>
            </form>
            @if ($errors->has('login'))
                <p class="text-danger">{{ $errors->first('login') }}</p>
            @endif
          </div>
        </div>
      </div>
    </section>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for -->
</body>
</html>
