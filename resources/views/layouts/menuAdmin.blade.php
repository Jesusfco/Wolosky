<div id="panel">
    <br>
    <div id="panelMargen">
        <h4><span class="glyphicon glyphicon-user" aria-hidden="true" id="chess"></span>
            Administrador
        </h4>

        <div id="userKey"><h2>{{ substr(Auth::user()->name,0,1)}}</h2> </div>
        <h3>{{ substr(Auth::user()->name,0,9) }}.</h3>
        <hr>


        <h4>Noticias</h4>
        <ul>
            <li><a href="{{ url('noticias/create')}}">Crear Nota</a></li>
            <li><a href="{{ url('admin/noticias/list')}}">Lista de Noticias</a></li>
        </ul>

        <h4>Clientes</h4>
        <ul>
            <li><a href="{{ url('/clientes/create')}}">Crear cliente</a></li>
            <li><a href="{{ url('/clientes')}}">Lista de clientes</a></li>
            <li><a href="{{ url('/nacimiento')}}">Establecer Nacimiento</a></li>
            <li><a href="{{ url('/edad')}}">Verificar Edad</a></li>
        </ul>
        <hr>

        <h4><span class="glyphicon glyphicon-cog" aria-hidden="true" id="chess"></span>
            Ajustes
        </h4>

        <ul>
            <li>Contraseñas</li>


        </ul>

    </div>
</div>
