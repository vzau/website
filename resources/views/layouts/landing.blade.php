 <!doctype html>
<html lang="ENG">
    <head>
        {{-- Meta Stuff --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="v{{ \Config::get('facility.name_short') }} ARTCC. For entertainment purposes only. Do not use for real world purposes. Part of the VATSIM Network.">
        <meta name="keywords" content="{{ \Config::get('facility.name_short') }},vatusa,vatsim,center,artcc,aviation,airplane,airport,controller,atc,air,traffic,control,pilot">
        <meta name="author" content="Ian Cowan">
		
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">

        {{-- Stylesheets --}}
          <!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="/css/sb-admin-2.min.css" rel="stylesheet">
		
		<script src="/js/sb-admin-2.min.js"></script>
		        @if(Carbon\Carbon::now()->month == 12)
            {{-- Merry Christmas --}}
            <script src="/js/snowstorm.js"></script>
        @endif
	
			{{-- GoogleAnalytics --}}
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154570679-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-154570679-1');
		</script>


        {{-- Bootstrap --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        {{-- Bootstrap Date/Time Picker --}}
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
		<script src="/js/sb-admin-2.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
        {{-- Tooltips --}}
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

	           {{-- Google reCAPTCHA v2 --}}
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
		
	   {{-- Tooltips --}}
	   

		        {{-- Title --}}
        <title>
            @yield('title') - vZAU ARTCC
        </title>
<style type="text/css">
.bg-landing-image {
  background: url("https://vzauartcc.org/photos/frontpage.png");
  background-position: center;
  background-size: cover;
}
.bg-online-image {
  background: url("https://vzauartcc.org/photos/frontpageonline.png");
  background-position: center;
  background-size: cover;
}
table.table-fit {
    width: auto !important;
    table-layout: auto !important;
}
table.table-fit thead th, table.table-fit tfoot th {
    width: auto !important;
}
table.table-fit tbody td, table.table-fit tfoot td {
    width: auto !important;
}
.mainfooter {
    width: 100%;
}
</style>
</head>
<body class="bg-gradient-primary" id="page-top">
		@include('inc.messages')
        @include('inc.navbar')
		<div class="container">
					@yield('content')
			@include('inc.footer')
		</div>
		  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
		  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
<script type="text/javascript">
  if (document.getElementById('dadjoke') !== null) {
      $(() => {
          $.get("/joke").done((data) => {
              const joke = JSON.parse(data).Joke;
              $("#dadjoke").html(`${joke.Opener} ${joke.Punchline}`);
          }).fail(() => {
              $("#dadjoke").html("Failed to load joke. :(");
          });
      })
  }
</script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>
    </body>
</html>
