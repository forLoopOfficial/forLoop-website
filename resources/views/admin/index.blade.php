<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> forLoop Admin </title>

    <!-- Custom Theme Style -->
    <link href="/css/admin-all.css" rel="stylesheet">
    <link href="/css/admin-app.css" rel="stylesheet">
  </head>

  <body class="nav-md">

    <!-- Page Content -->
    <div id="app">

    </div>
    <!-- Page content -->
    <script>
      window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
    <!-- All vender Scripts -->
    <script src="/js/admin-all.js"></script>

    <!-- Custom Scripts -->
    <script src="/js/admin-custom.js"></script>

    <!-- App Scripts -->
    <script src="/js/admin-main.js"></script>

    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcjFtRHmXguek060FhPql3KH_--AXoEjs&callback=initMap">
    </script>
    <script>
      function initMap(){ console.log("Map Loaded");}
    </script>
  </body>
</html>
