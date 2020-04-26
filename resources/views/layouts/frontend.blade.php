<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Rapid Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link href="/assets/frontend/img/favicon.png" rel="icon">
  <link href="/assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="/assets/frontend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/frontend/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/assets/frontend/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/assets/frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/frontend/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="/assets/frontend/css/style.css" rel="stylesheet">
</head>

<body>
    @include('includes.frontend.header')
    @yield('content')
    @include('includes.frontend.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.4.1.min.js"></script>
  <script src="/assets/frontend/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/frontend/lib/easing/easing.min.js"></script>
  <script src="/assets/frontend/lib/mobile-nav/mobile-nav.js"></script>
  <script src="/assets/frontend/lib/wow/wow.min.js"></script>
  <script src="/assets/frontend/lib/waypoints/waypoints.min.js"></script>
  <script src="/assets/frontend/lib/counterup/counterup.min.js"></script>
  <script src="/assets/frontend/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/assets/frontend/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="/assets/frontend/lib/lightbox/js/lightbox.min.js"></script>
  <script src="/assets/frontend/contactform/contactform.js"></script>
  <script src="/assets/frontend/js/main.js"></script>
  <script type="text/javascript">

    $('#contact-from').on('submit',function(event){
      event.preventDefault();

    $('#nameError').text('');
    $("#emailError").text('');
    $("#subjectError").text('');
    $("#messageError").text('');

    name = $('#name').val();
    email = $('#email').val();
    subject = $('#subject').val();
    message = $('#message').val();
    $.ajax({
      url: "/contact",
      type:"POST",
      data:{"_token": "{{ csrf_token() }}", name:name, email:email, subject:subject, message:message },
      success:function(response){
        swal("Contact successfully", "success")
        .then((value) => {
          window.location.href = '/';
        });
      },

      error: function(response) {
          $('#nameError').text(response.responseJSON.errors.name);
          $('#emailError').text(response.responseJSON.errors.email);
          $('#subjectError').text(response.responseJSON.errors.subject);
          $('#messageError').text(response.responseJSON.errors.message);
          }
    });
  });

  </script>
</body>
</html>
