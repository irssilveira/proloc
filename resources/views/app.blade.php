<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ProLoc Online</title>

    <!-- Bootstrap -->
    <link href="{{asset('arq/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('build/css/lightbox.min.css')}}" />
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/9a93b47e91.js"></script>

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('')}}" class="site_title"><i class="fa fa-paw"></i> <span>ProLoc</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{url('images/usuario/img-person.png')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Olá,</span>
                        <h2>{{ strstr(auth()->user()->name,' ',true)  }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{url('')}}"><i class="fa fa-home"></i> Home </a>
                            </li>
                            @if(auth()->user()->tipo_user == "admin")
                            <li>
                                <a><i class="fa fa-bolt"></i> Administrativo <span class="fa fa-chevron-down"></span> </a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('gerencia')}}"> Relátorio Geral Leads</a></li>
                                    <li><a href="{{route('pdp')}}"> Relátorio PDP</a></li>
                                </ul>
                            </li>

                            @endif
                            <li><a><i class="fa fa-desktop"></i> Comercial <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('leads')}}">Leads</a></li>
                                    <li></li>
                                </ul>
                            </li>
                            <li>
                                <a><i class="fa fa-user-circle-o"></i> Cadastro <span class="fa fa-chevron-down"></span> </a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('clientes')}}"> Cliente</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{url('images/usuario/img-person.png')}}" alt="">{{ strstr(auth()->user()->name,' ',true)  }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Perfil</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Configurações</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Dúvidas?</a></li>
                                <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i>Sair</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                @for($i = 0;$i<5;$i++)
                                    <li>
                                        <a>
                                            <span class="image"><img src="{{url('images/usuario/img-person.png')}}" alt="Profile Imagem"/></span>
                                            <span>
                          <span>Proloc Inovar</span>
                          <span class="time">3 minutos</span>
                        </span>
                                            <span class="message">
                        OPa tudo bem com vc?
                        </span>
                                        </a>
                                    </li>
                                @endfor
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>Todos os alertas</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div style="background-color:#f2f2f2;" class="right_col" role="main">

            @yield('content')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <div id="ajaxLoading" class="hide">
            &nbsp; Carregando... Por favor, aguarde...
        </div>
        <div class="text-center hide salvarSucesso alert alert-success">
            <strong>Salvo com sucesso!</strong>.
        </div>
        <div class="text-center hide errorSalvar alert alert-error">
            <strong>O</strong>.
        </div>
        <footer>
            <div class="pull-right">
                Proloc - Todos os direitos reservados
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


<!-- jQuery -->
<script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="{{asset('arq/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Skycons -->
<script src="{{asset('arq/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('arq/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('arq/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('arq/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('arq/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('arq/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('build/js/lightbox.min.js')}}"></script>


<!-- Custom Theme Scripts -->
<script src="{{asset('build/js/custom.min.js')}}"></script>
@yield('geolocation')
<!-- jquery.inputmask -->
<script src="{{asset('arq/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>


<!-- jquery.inputmask -->
<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>
<!-- /jquery.inputmask -->

</body>
</html>
