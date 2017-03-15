@extends('layouts.default')
    
@section('title')
    <title>Wolosky Noticias - Gimnasia Artística - Tuxtla Gutierrez, Chiapas</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('css/logros.css')}}">
@endsection

@section('content')  


<br><br>
<div class="row content">
    <div class="col s12 l8"> 
        <a href="{{ url('noticias/'.$noticias[0]->id)}}">
        <div class="notaPrincipal">                                
            <div class="notaPrincipal-img divImg">
                <img src='images/noticias/{{ $noticias[0]->IMAGEN }}' id="not1" alt="Unsplashed background img 1"  style="margin-top:0px;">
            </div>
            <div class="notaPrincipal-titulo">               
                <h3 class="">{{ $noticias[0]->TITULO }}</h3>                                     
            </div>             
        </div>
        </a>
        <br>




<?php unset($noticias[0]); ?>
  

    @if(isset($noticias))    
        @foreach($noticias as $n)        
            <div class="row">
                <div class='col s12 m5 divImg'>                      
                    <a href='noticias/{{ $n->id }}'>
                        <img class='activator responsive-img' src='images/noticias/{{ $n->IMAGEN }}'>
                    </a>
                </div>
                <div class='col s12 m7'>
                    <a href='noticias/{{ $n->id }}'><h5 class="tituloNoticia">{{ $n->TITULO }}</h5></a>
                    <p>{{ substr($n->RESUMEN, 0, 140)}}...</p>
                           <a href='noticias/{{ $n->id }}'   class='btn waves-effect waves-light red darken-4'>Leer más..</a>
                </div>                                    
            </div>  
        <hr>
        @endforeach
    
        <center>
        {{ $noticias->links() }}
        </center>
        @endif
    </div> 
    <div class="col m12 l4 social">
        <h5 style="margin-top: 0px;">Facebook</h5>
        <div><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwoloskygimnasia%2F&tabs=timeline&width=340&height=600&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1087647381316356" width="400" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe><br></div>
        <h5>Tweeter</h5>
            <a class="twitter-timeline" data-width="350" data-height="600" data-theme="dark" data-link-color="#2B7BB9" href="https://twitter.com/Rebewolosky">Tweets by Rebewolosky</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>        
    </div>
</div>    

@endsection

@section('scripts')
    <script src="{{ url('js/noticias.js')}}"></script>

@endsection
