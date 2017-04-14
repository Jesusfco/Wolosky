@extends('layouts.app')

@section('content')

    

            <div class="panel panel-default">
                <div class="panel-heading"><h2>Noticias >> Crear</h2></div>
                @if(session()->has('msj'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Exito!</strong> La noticia ha sido cargada a la base de datos.
                      </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> La noticia no ha sido cargada.
                      </div>
                @endif
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/noticias')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Titulo</label>
                          <input type="text" name="titulo" class="form-control"  placeholder="Titulo de la noticia" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Resumen</label>
                          <input type="text" name="resumen" class="form-control"  placeholder="Escribe brevemente de que se trara la noticia" required>
                        </div>
                        <div class="form-group">
                          <label>Imagen</label>
                          <input type="file" name="imagen" accept="image/x-png,image/gif,image/jpeg" required>
                          <p class="help-block">Cargue una fotografía de la noticia</p>
                        </div>
                        
                        <div class="row"><div class="col-sm-12 col-lg-3">
                            
                         <div class="form-group">
                          <label>Fecha</label>
                          <input type="date" name="fecha" class="form-control" required>
                        </div>
                        
                        </div></div>
                                
                        <label>Redacta tu noticia</label>
                        <textarea class="form-control" name="texto" rows="3" required></textarea>
                        
                        <div class="form-group">
                          <label>Iframe de Youtube</label>
                          <input type="text" name="youtube" class="form-control" name="YOUTUBE" value='<iframe width="560" height="315" src="https://www.youtube.com/embed/cwObZ_1Drvc" frameborder="0" allowfullscreen></iframe>' required>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-default">Crear Nueva Nota</button>
                      </form>
               
                    </div>
            </div>

            

@endsection