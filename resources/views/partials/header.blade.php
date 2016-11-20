<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">SINT<i class="fa fa-microphone" aria-hidden="true"></i>NIZA</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/notes') }}">Notas</a></li>
                <li><a href="{{ url('/new') }}" class="new">Nuevo</a></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Servicios <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/pricing') }}">Audio streaming</a></li>
                        </ul>
                    </li>
                @if (Auth::guest())
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/account/invoices') }}">Mis facturas</a></li>
                            @if (Auth::user()->hasRole('admin'))
                            <li><a href="{{ url('/dashboard/radios') }}">Radios</a></li>
                            <li><a href="{{ url('/dashboard/users') }}">Usuarios</a></li>
                            @endif
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/account/settings') }}">Ajustes</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>