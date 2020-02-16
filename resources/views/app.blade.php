<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/theme/assets/wp-content/uploads/2019/03/cropped-Allo-Tellecom-8-1.png" rel="icon"/>
  <!-- <link href="/assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/assets/lib/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <!-- Custom Css -->
  <link href="/assets/css/app.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  @stack('css')
</head>

<body>

  @yield('header')

  @yield('poster')

  <main>@yield('content')</main>

  @include('partials.states')

  @yield('footer')

  <!-- JavaScript Libraries -->
  <script src="/assets/lib/jquery/jquery.min.js"></script>
  <script src="/assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/lib/easing/easing.min.js"></script>
  <script src="/assets/lib/superfish/hoverIntent.js"></script>
  <script src="/assets/lib/superfish/superfish.min.js"></script>
  <script src="/assets/lib/wow/wow.min.js"></script>
  <script src="/assets/lib/venobox/venobox.min.js"></script>
  <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="/assets/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/assets/js/main.js"></script>

  @stack('js')
</body>

</html>
