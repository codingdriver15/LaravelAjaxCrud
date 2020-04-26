<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Laravel Application for build Logic Strong
  </title>
  <!-- <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link href="/assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      @include('includes.sidebar')
    </div>
    <div class="main-panel">
        @include('includes.header')
      <div class="content">
        @yield('content')
      </div>
      <footer class="footer footer-black  footer-white ">
        @include('includes.footer')
      </footer>
    </div>
  </div>
  <script src="/assets/js/core/jquery.min.js"></script>
  <!-- <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/assets/js/plugins/bootstrap-notify.js"></script>
  <script src="/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <script src="/assets/demo/demo.js"></script> -->
</body>

</html>
