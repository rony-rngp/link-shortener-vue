<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title> Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend')  }}/assets/images/favicon.ico">


    <link href="{{ asset('backend')  }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />


    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
</head>

<body class="loading authentication-bg authentication-bg-pattern">

<div id="backend" class="account-pages mt-5 mb-5">

    <login-component></login-component>

</div>
<!-- end page -->


<script src="{{ asset('js/backend.js') }}"></script>

<script src="{{ asset('js/backend_script.js') }}"></script>
</body>

</html>
