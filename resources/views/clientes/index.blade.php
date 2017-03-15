@extends('layouts.app')

@section('content')
    
    

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                    
                    <div class="col-xs-12 col-sm-6">
                    <h2>Clientes >> Lista</h2>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        
                    <form method="GET" class="navbar-form">
                         <div class="input-group">
                            <input name="name" class="form-control" placeholder="Buscar Cliente">
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
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Sexo</th>
                            <th>Telefono</th>
                            <th>Edad</th>
                            <th>Nacimiento</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($clientes as $n)
                        <tr>
                            <td>{{ $n->nombre }}</td>
                            <td>{{ $n->email }}</td>
                            <td>{{ $n->sexo }}</td>
                            <td>{{ $n->telefono }}</td>
                            <td>{{ $n->edad }}</td>
                            <td>{{ $n->nacimiento }}</td>
                            <td>{{ $n->tipo }}</td>
                            <td>
                                <a href="{{ url('/clientes/'.$n->id.'/edit') }}" class="btn btn-info btn-xs">Editar </a>
                                <form method="POST" action="{{ route('clientes.destroy' , $n->id) }}">
                                    <input value="DELETE" name="_method" type="hidden">
                                    {{ csrf_field() }}
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-xs"> </input>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>                
                        
                </div>
            </div>

            

@endsection

