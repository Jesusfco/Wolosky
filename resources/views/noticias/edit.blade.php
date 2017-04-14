@extends('layouts.app')

@section('content')

    

    <div class="panel panel-default">
        <div class="panel-heading"><h2>Noticias >> Editar</h2></div>
        @if(session()->has('msj'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Exito!</strong> La noticia ha sido editada.
              </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> La noticia no se ha podido editar.
              </div>
        @endif

        @if(isset($noticia))


        <div class="panel-body">
            <form role="form" method="POST" action="{{ route('noticias.update', $noticia->id)}}" enctype="multipart/form-data">                              
                <div class="form-group">
                  <label for="exampleInputEmail1">Titulo</label>
                  <input type="text" name="titulo" class="form-control" value='{{ $noticia->TITULO }}' placeholder="Titulo de la noticia">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Resumen</label>
                  <input type="text" name="resumen" class="form-control" value='{{ $noticia->RESUMEN }}' placeholder="Escribe brevemente de que se trara la noticia">
                </div>
                <div class="form-group">
                  <label>Imagen</label>
                  <input type="file" name="imagen"  accept="image/x-png,image/gif,image/jpeg">
                  <p class="help-block">Cargue una fotografía de la noticia</p>
                </div>

                <div class="row"><div class="col-sm-12 col-lg-3">

                 <div class="form-group">
                  <label>Fecha</label>
                  <input type="date" name="fecha" class="form-control" value="{{ $noticia->FECHA }}">
                   
                </div>

                </div></div>

                <label>Redacta tu noticia</label>
                    <?php
                        $text = $noticia->TEXTO;
                        $breaks = array("<br />","<br>","<br/>");  
                        $text = str_ireplace($breaks, "\r\n", $text);  ?>
                
                <textarea class="form-control" name="texto" rows="7" required>{{ $text }}</textarea>

                <div class="form-group">
                  <label>Iframe de Youtube</label>
                  <input type="text" name="youtube" class="form-control" name="YOUTUBE" value='{{ $noticia->YOUTUBE }}' required>
                </div>


                <button type="submit" class="btn btn-default">Editar Nota</button>
                 {{ method_field('PUT')}}
                {{ csrf_field() }}
              </form>

            </div>

            @endif
    </div>

            

@endsection