<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="csrf-token" content="{{ csrf_token() }}" />
         <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         
        <!-- Bootstrap CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- jQuery 1.8 or later, 33 KB -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

 
        <!-- Fotorama from CDNJS, 19 KB -->
        <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

        <title>VIPPRO</title>
    </head>
    <style>

        .menu-bottom .col-2 img{
            height: 25px;
            width: 25px;
        }
        .menu-bottom .col-2 h6{
            font-size: 10px;
            color: #000;
            font-weight: 600;
        }
        .menu-bottom{
            border-top: 1px solid silver;
            margin: 0px !important;
            background: #221e1d;
            color: #fff;
            z-index: 2;
            position: fixed;
            left: 0;
            bottom: 0;
            right: 0;
            height: 60px;
        }

        .menu-bottom .col-2{
         
            margin: auto;
            text-align: center;
            padding: 8px 0px;
            background: #efd363;
            height: 51px;
            width: 50px;
            vertical-align: middle;
            border-radius: 6px;
            color: #000;
        }
        .col-half-offset{
            margin-left:4.166666667%
        }
        .mobile-bottom-nav{
            position:fixed;
            bottom:0;
            left:0;
            right:0;
            z-index:1000;
        }
    
        body{
            background-color: #eee;
        }
        main{
            margin-top: 10px;
            margin-bottom: 50px;
        }
        .card-header{
            background: #fe5155;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 20px;
        }
        .card-title{
            color: #fe5155;
        }
        .card-body .value{
            color: #ffd900;
        }
        
        .card-body{
            background: #393c3e;
        }
        header nav{
            position: fixed;
        }
        .card-header img{
            width: 10%;
        }
        
    </style>
    
    <body style="background-color:  #eee">

        <header class="sticky-top">
            <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Makemoney.com <sup>Kiếm tiền hàng ngày</sup></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>

        </header>
