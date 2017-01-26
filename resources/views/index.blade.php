<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> </title>

        <!-- Custom styles for this template -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>

    <body>
        <!-- Page Content -->
        <div id="app">

        </div>
        <!-- Page content -->

        <script>
          window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
        <script src="/js/all.js"></script>
        <script src="/js/app.js"></script>

    </body>
</html>
