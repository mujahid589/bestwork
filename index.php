<?php
error_reporting(0);
include('includes/config.php');
?>
<html >
<head>
    <title>Bestwork.pk | Home</title>
 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>.navbar-default {
    background-color: #F8F8F8;
    border-color: #E7E7E7;
}
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>

</head>

<body>
<div style="padding-left: 12%;  padding-right: 12%; background-color:white">
<nav class="navbar top navbar-toggleable-md navbar navbar-default ">
<div class="container col-lg-8 mb-4" >
<div class="collapse navbar-collapse" id="navbarExample">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a class="nav-link" href="useradd.php"><button class="btn btn-danger">Become a Frelauncer/clinet</button>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="login.php"><button class="btn btn-danger">Login</button></a>
</li>
<li class="nav-item">
<a class="nav-link" href="admin/index.php"><button class="btn btn-primary">Admin</button></a></li>
</ul>
</div>
</div>
</nav>   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
