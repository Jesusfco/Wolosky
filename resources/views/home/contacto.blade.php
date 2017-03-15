@extends('layouts.default')
     
@section('title')
    <title>Contacto Wolosky - Gimnasia Artística - Tuxtla Gutierrez, Chiapas</title>
@endsection

@section ('content')
<br><br><br>
    <div class="row">
    <form>
        <div class="card-content col s12 m6 offset-m3 red" >
         <h5 style="font-weight:300;" align="center">¿Que necesita?</h5>                            
                <div class="row" style="margin-bottom: -5px;">
                    <div class="input-field col l6 m6 s12">
                        <i class="material-icons prefix">perm_identity</i>

                        <input placeholder="Introduce tu nombre" id="nombre" required="required" type="text" class="validate">
                        <label for="first_name">Nombre</label>

                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">email</i>

                        <input id="email" required="required" type="email" class="validate">
                        <label for="email" data-error="Introducir e-mail válido" data-success="Correcto">Email</label>

                    </div>

                </div>                                
                <div class="row" style="margin-bottom: -5px;">
                    <div class="input-field col s12" style="margin-top: -5px;">

                        <textarea id="mensaje" class="materialize-textarea"></textarea>
                        <label for="messageTA">Mensaje:</label>

                    </div>
                </div>
                <div class="center-align">
                    <button class="btn waves-effect waves-light teal darken-4" type="submit" onclick="enviar()" style="margin:0 auto; display:block;">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                    <br>
                </div>                            
            </form>
        </div>
    </div>
<br><br><br>
@endsection