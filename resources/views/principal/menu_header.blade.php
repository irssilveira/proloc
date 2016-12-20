
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
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="badge bg-green">{{auth()->user()->frete()->count()}}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        @foreach(auth()->user()->frete()->get() as $freteAtivo)
                            <li>
                                <a href="{{route('frete.controle',['id'=>$freteAtivo->id])}}">
                                    <span class="image"></span>
                                    <span>
                          <span>{{$freteAtivo->cliente}}</span>
                          <span class="time">{{ date("d/m/Y", strtotime($freteAtivo->created_at)) }}</span>
                        </span>
                                    <span class="message">
                        {{$freteAtivo->telefone}}
                        </span>
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <div class="text-center">
                                <a href="">
                                    <strong>Todos os alertas</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
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
