
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
                                <li><a href="{{route('gerencia')}}"> Relátorio Leads</a></li>
                                <li><a href="{{route('pdp')}}"> Relátorio PDP's</a></li>
                                <li><a href="{{route('geral.frete')}}"> Relátorio Fretes</a></li>
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
                            @if(auth()->user()->tipo_user == "admin")
                                <li><a href="{{route('frete.preco.total')}}"> Valor Frete</a></li>
                            @endif
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