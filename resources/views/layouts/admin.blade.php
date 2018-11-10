<?php

$persons = \Illuminate\Support\Facades\DB::select("SELECT * FROM persona where id NOT in (select persona_id from usuario)");


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="{{asset("img/logo3.png")}}">
    <title>Aula Virtual</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{asset("vendor/%40fortawesome/fontawesome-free-webfonts/css/fa-brands.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/%40fortawesome/fontawesome-free-webfonts/css/fa-regular.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/%40fortawesome/fontawesome-free-webfonts/css/fa-solid.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/%40fortawesome/fontawesome-free-webfonts/css/fontawesome.css")}}">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{asset("vendor/simple-line-icons/css/simple-line-icons.css")}}">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="{{asset("vendor/animate.css/animate.css")}}">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="{{asset("vendor/whirl/dist/whirl.css")}}">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="{{asset("vendor/weather-icons/css/weather-icons.css")}}">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    {{--<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">--}}
    <!-- =============== APP STYLES ===============-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="{{asset("css/app.css")}}">
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/bootstrap.min.css"/>
    {{--<script src="js/ga.js"></script>--}}
  <link rel="stylesheet" href="{{asset("css/general.css")}}">
  </head>
  <body>
    <div class="wrapper">

      <header class="topnavbar-wrapper">
        <nav class="navbar topnavbar" style="background: #FFB50C">
          <div class="navbar-header">
            <a class="navbar-brand" href="#/">
              <div class="brand-logo">
                <img class="img-fluid" src="{{asset("img/logo.png")}}" width="50px" height="100px" alt="App Logo">
              </div>
              <div class="brand-logo-collapsed">
                <img class="img-fluid" src="{{asset("img/logo.png")}}" alt="App Logo">
              </div>
            </a>
          </div>
          <ul class="navbar-nav mr-auto flex-row">
            <li class="nav-item">
              <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                <em class="fas fa-bars"></em>
              </a>
              <a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                <em class="fas fa-bars"></em>
              </a>
            </li>
          </ul>
          {{--<ul class="navbar-nav flex-row">--}}
            {{--<li class="nav-item">--}}
              {{--<a class="nav-link" href="#" data-search-open="">--}}
                {{--<em class="icon-magnifier"></em>--}}
              {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item d-none d-md-block">--}}
              {{--<a class="nav-link" href="#" data-toggle-fullscreen="">--}}
                {{--<em class="fas fa-expand"></em>--}}
              {{--</a>--}}
            {{--</li>--}}
          {{--</ul>--}}
            {{--<li class="nav-item dropdown dropdown-list">--}}
              {{--<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">--}}
                {{--<em class="icon-user"></em>--}}
              {{--</a>--}}
              {{--<div class="dropdown-menu dropdown-menu-right animated flipInX">--}}
                {{--<div class="dropdown-item">--}}
                  {{--<div class="list-group">--}}
                    {{--<div class="list-group-item list-group-item-action">--}}
                      {{--<div class="media">--}}
                        {{--<div class="media-body">--}}
                          {{--<dt>Usuario</dt>--}}
                          {{--<input type="text" name="nombre" class="form-control">--}}
                          {{--<dt>Password</dt>--}}
                          {{--<input type="password" name="contra" class="form-control">--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="list-group-item list-group-item-action">--}}
                      {{--<div class="media">--}}
                        {{--<div class="media-body">--}}
                          {{--<button type="submit" class="btn btn-primary">Iniciar Sesión</button>--}}
                          {{--<button type="reset" class="btn btn-danger">Cancelar</button>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}
            {{--</li>--}}
          {{--</ul>--}}
          <form class="navbar-form" role="search" action="#">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Type and hit enter ...">
              <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
            </div>
            <button class="d-none" type="submit">Submit</button>
          </form>
        </nav>
      </header>

      <aside class="aside-container">
        <div class="aside-inner">
          <nav class="sidebar" data-sidebar-anyclick-close="">
            <ul class="sidebar-nav">
              <li class="has-user-block">
                <div class=" " id="user-block">
                  <div class="item user-block">
                    <div class="user-block-picture">
                      <div class="user-block-status" >
                            <div class="img-thumbnail rounded-circle" style="width: 60px; height: 60px; display: flex; justify-content: center; align-items: center" >
                                 <i class="fa fa-user fa-3x "></i>
                              </div>
                          {{--<img class="img-thumbnail rounded-circle" src="img/user.jpg" alt="Avatar" width="60" height="60">--}}
                        {{--<div class="circle bg-success circle-lg"></div>--}}
                      </div>
                    </div>
                    <div class="user-block-info">
                      <span class="user-block-name"></span>
                      <span class="user-block-role">Administrador</span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-heading ">
                <span data-localize="sidebar.heading.HEADER">Menú de Navegación</span>
              </li>
              <li >
                <a href="{{route("index")}}" title="Dashboard" >
                  <div class="float-right badge badge-danger">{{count($persons)}}</div>
                  <em class="icon-speedometer"></em>
                  <span >Pendientes</span>
                </a>

              </li>
              <li >
                <a href="{{route("all_request")}}" title="Dashboard" >
                  {{--<div class="float-right badge badge-danger">{{count($persons)}}</div>--}}
                  <em class="icon-user"></em>
                  <span >Todo</span>
                </a>

              </li>
              {{--<li class=" ">--}}
                {{--<a href="#layout" title="Layouts" data-toggle="collapse">--}}
                  {{--<em class="icon-layers"></em>--}}
                  {{--<span>Layouts</span>--}}
                {{--</a>--}}
                {{--<ul class="sidebar-nav sidebar-subnav collapse" id="layout">--}}
                  {{--<li class="sidebar-subnav-header">Layouts</li>--}}
                  {{--<li class=" ">--}}
                    {{--<a href="" title="Horizontal">--}}
                      {{--<span>Horizontal</span>--}}
                    {{--</a>--}}
                  {{--</li>--}}
                {{--</ul>--}}
              {{--</li>--}}
              {{--<li class="nav-heading ">--}}
                {{--<span data-localize="sidebar.heading.COMPONENTS">Components</span>--}}
              {{--</li>--}}
              {{--<li class=" ">--}}
                {{--<a href="#elements" title="Elements" data-toggle="collapse">--}}
                  {{--<em class="icon-chemistry"></em>--}}
                  {{--<span data-localize="sidebar.nav.element.ELEMENTS">Elements</span>--}}
                {{--</a>--}}
                {{--<ul class="sidebar-nav sidebar-subnav collapse" id="elements">--}}
                  {{--<li class="sidebar-subnav-header">Elements</li>--}}
                  {{--<li class=" ">--}}
                    {{--<a href="buttons.html" title="Buttons">--}}
                      {{--<span data-localize="sidebar.nav.element.BUTTON">Buttons</span>--}}
                    {{--</a>--}}
                  {{--</li>--}}
                {{--</ul>--}}
              {{--</li>--}}
              {{--<li class=" ">--}}
                {{--<a href="#forms" title="Forms" data-toggle="collapse">--}}
                  {{--<em class="icon-note"></em>--}}
                  {{--<span data-localize="sidebar.nav.form.FORM">Forms</span>--}}
                {{--</a>--}}
                {{--<ul class="sidebar-nav sidebar-subnav collapse" id="forms">--}}
                  {{--<li class="sidebar-subnav-header">Forms</li>--}}
                  {{--<li class=" ">--}}
                    {{--<a href="" title="Standard">--}}
                      {{--<span data-localize="sidebar.nav.form.STANDARD">Standard</span>--}}
                    {{--</a>--}}
                  {{--</li>--}}
                {{--</ul>--}}
              {{--</li>--}}
              {{--<li class=" ">--}}
                {{--<a href="#charts" title="Charts" data-toggle="collapse">--}}
                  {{--<em class="icon-graph"></em>--}}
                  {{--<span data-localize="sidebar.nav.chart.CHART">Charts</span>--}}
                {{--</a>--}}
                {{--<ul class="sidebar-nav sidebar-subnav collapse" id="charts">--}}
                  {{--<li class="sidebar-subnav-header">Charts</li>--}}
                  {{--<li class=" ">--}}
                    {{--<a href="" title="Flot">--}}
                      {{--<span data-localize="sidebar.nav.chart.FLOT">Flot</span>--}}
                    {{--</a>--}}
                  {{--</li>--}}
                {{--</ul>--}}
              {{--</li>--}}

              <li class=" ">
                <a href="#users" title="Charts" data-toggle="collapse">
                  <em class="icon-graph"></em>
                  <span data-localize="sidebar.nav.chart.CHART">Usuarios</span>
                </a>
                <ul class="sidebar-nav sidebar-subnav collapse" id="users">
                  {{--<li class="sidebar-subnav-header">Charts</li>--}}
                  <li class=" ">
                    <a href="form_register" title="Flot">
                      <span data-localize="sidebar.nav.chart.FLOT">Agregar Usuario</span>
                    </a>
                    <a href="ver_usuario" title="Flot">
                      <span data-localize="sidebar.nav.chart.FLOT">Ver Usuarios</span>
                    </a>

                  </li>
                </ul>
              </li>
              <li >
                <a href="logout">
                  <em class="icon-close"></em>
                  <span data-localize="sidebar.nav.chart.CHART">Cerrar Sesión</span>
                </a>
              </li>

            </ul>
          </nav>
        </div>
      </aside>

      <section class="section-container">
        <div class="content-wrapper">
          <div class="content-heading">
            {{--<div>Aula Virtual</div>--}}
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card card-default card-demo" id="cardChart9">
                    <div class="card-header">
                      <a class="float-right" href="#" data-tool="card-refresh" data-toggle="tooltip" title="Refresh card">
                        <em class="fas fa-sync"></em>
                      </a>
                      <a class="float-right" href="#" data-tool="card-collapse" data-toggle="tooltip" title="Collapse card">
                        <em class="fa fa-minus"></em>
                      </a>
                      <div class="card-title">@yield("title_menu")</div>
                    </div>
                    <div class="card-wrapper collapse show">
                      <div class="card-body">
                        @yield('content')

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <footer class="footer-container">
        <span>&copy; astrovision</span>
      </footer>

    </div>
    @yield("modal")

    <!-- =============== VENDOR SCRIPTS ===============-->
    <!-- MODERNIZR-->
    <script src="{{asset("vendor/modernizr/modernizr.custom.js")}}"></script>
    <!-- JQUERY-->
    <script src="{{asset("vendor/jquery/dist/jquery.js")}}"></script>
    <!-- BOOTSTRAP-->
    <script src="{{asset("vendor/popper.js/dist/umd/popper.js")}}"></script>
    <script src="{{asset("vendor/bootstrap/dist/js/bootstrap.js")}}"></script>
    <!-- STORAGE API-->
    <script src="{{asset("vendor/js-storage/js.storage.js")}}"></script>
    <!-- JQUERY EASING-->
    <script src="{{asset("vendor/jquery.easing/jquery.easing.js")}}"></script>
    <!-- ANIMO-->
    <script src="{{asset("vendor/animo/animo.js")}}"></script>
    <!-- SCREENFULL-->
    <script src="{{asset("vendor/screenfull/dist/screenfull.js")}}"></script>
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- SLIMSCROLL-->
    <script src="{{asset("vendor/jquery-slimscroll/jquery.slimscroll.js")}}"></script>
    <!-- =============== APP SCRIPTS ===============-->
    <script src="{{asset("js/app.js")}}"></script>
  @yield("after_scripts")
  </body>
</html>