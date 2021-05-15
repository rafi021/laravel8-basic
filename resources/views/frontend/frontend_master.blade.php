
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Company Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  @include('frontend.frontend_layout.style')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('frontend.frontend_layout.header')
  <!-- End Header -->

  @yield('hero-section')

  <main id="main">
      @yield('frontend_content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('frontend.frontend_layout.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    @include('frontend.frontend_layout.script')

</body>

</html>