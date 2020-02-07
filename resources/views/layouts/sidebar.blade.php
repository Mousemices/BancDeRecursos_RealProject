<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- script -->
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--Images -->
    <link rel="stylesheet" href="{{ asset('img')}}">

    <!--SCRIPT-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a8b65ee465.js" crossorigin="anonymous"></script>


    <title>Banc de Recursos</title>
</head>

<body id="page-top">
  <!--Page wrapper-->
<div class="row">
  <section id="wrapper col-md-4">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="acoordionSidebar">

    <!-- Sidebar Brand-->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand-icon">
        <img src="img/Banc_de_recurosos_1.png" class="img-fluid">
      </div>
    </a>

   <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item -Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

   <!--Divider-->
      <hr class="sidebar-divider">
   <!--Heading-->
      <div class="sidebar-heading">Llistes</div>

   <!--Nav Item -Pages Collapse Menu-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>INVENTARI</span>
        </a>
      </li>
   <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDeparture" aria-expanded="true" aria-controls="collapseDeparture">
        <i class="fas fa-shipping-fast"></i>
          <span>SORTIDES</span>
        </a>
        <div id="collapseDeparture" class="collapse" aria-labelledby="headingDeparture" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="">INVENTARI SORTIDES</a>
            <a class="collapse-item" href="">SOL.LICITUD DONACIONS</a>
          </div>
        </div>
      </li>

   <!--Divider-->
      <hr class="sidebar-divider">

   <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEntry" aria-expanded="true" aria-controls="collapseEntry">
        <i class="fas fa-shipping-fast"></i>
          <span>ENTRADES</span>
        </a>
        <div id="collapseEntry" class="collapse" aria-labelledby="headingEntry" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="">VALIDACIÓ DONACIÓ</a>
          </div>
        </div>
    </li>
  </ul>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

 

  




  </section>

    <main class="col-md-8">

        @yield('content')
    </main>
 
    

    
  </div>
  @yield('scripts')

  <!-- footer-->
  <footer class="page-footer font-small pt-4">
    <!-- Copyright -->
  <div class="footer-copyright text-center py-3">©fundació Banc de Recursos</div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

  
  </footer>

</body>
</html>
