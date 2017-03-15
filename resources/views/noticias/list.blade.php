@extends('layouts.app')

@section('content')
    
    

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                    
                    <div class="col-xs-12 col-sm-6">
                    <h2>Noticias >> Lista</h2>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        
                    <form method="GET" class="navbar-form">
                         <div class="input-group">
                            <input name="name" class="form-control" placeholder="Buscar Noticia">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Buscar</button>
                            </span>
                        </div>
                    </form>     
                        
                    </div></div>
                    
                    
                </div>
                
                <div class="panel-body">
                    <table class="table table-hover">                
                        <thead>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($noticias as $n)
                        
                        <tr>
                            <td>{{ $n->id }}</td>
                            <td>{{ $n->TITULO }}</td>
                            <td>{{ $n->FECHA }}</td>
                            <td>                                
                                <a href="{{ url('/noticias/'.$n->id.'/edit') }}" class="btn btn-info btn-xs">Editar </a>
                                <form method="POST" action="{{ route('noticias.destroy' , $n->id) }}">
                                    <input value="DELETE" name="_method" type="hidden">
                                    {{ csrf_field() }}
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-xs"> </input>
                                </form>
                                <a href="{{ route('noticias.show', $n->id) }}" class="btn btn-success btn-xs" type="button">Ver</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    </table>
                <center>
                    {{ $noticias->links() }}
                </center>
                    </div>
            </div>

            

@endsection
