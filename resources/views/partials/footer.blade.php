<footer class="footer">
  <div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <ul class="list-inline text-uppercase">
                <li><a href="{{ url('/terms-and-conditions') }}">Términos y condiciones</a></li>
                <li><a href="{{ url('/export') }}">Exportar</a></li>
                <li><a href="{{ url('/new') }}" class="new">Sugerir Radio</a></li>
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Ingresar</a></li>
                @else
                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endif
            </ul>
            <p class="text-muted">2016 &copy; Sintoniza.la</p>
        </div>
    </div>
  </div>
</footer>