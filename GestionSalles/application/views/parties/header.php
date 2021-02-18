<! DOCTYPE html >
<html>
    <head>
        <title>Gestion de Salle</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="../localjs/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url().'initial/font-awesome/css/font-awesome.min.css';?>">
        <link rel="stylesheet" href="<?php echo base_url().'initial/css/bootstrap.min.css';?>">
    </head>
    <body >
    <div class="container">
        <ul class="nav nav-tabs nav-justified ">
            <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('reservation'); ?>"><i class="fa fa-calendar" style="font-size:15px"></i>  Reservation</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('filiere'); ?>"><i class="fa fa-cloud" style="font-size:15px"></i>  Filiere</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('cours'); ?>"><i class="fa fa-book" style="font-size:15px"></i>  Cours</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('enseignant'); ?>"><i class="fa fa-users" style="font-size:15px"></i>  Enseignants</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('salles'); ?>"><i class="fa fa-bank" style="font-size:15px"></i>  Salles</a>
            </li>
        </ul>
</div>
</nav>