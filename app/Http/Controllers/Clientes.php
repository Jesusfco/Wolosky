<?php

namespace Wolosky\Http\Controllers;

use Illuminate\Http\Request;
use Wolosky\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;



class Clientes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Auth::user())
            return redirect('/admin');
        
        $clientes = Cliente::search($request->name)
                ->orderBy('nombre','desc')
                ->paginate(15);
        return view('clientes/index')->with(['clientes'=> $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          if(!Auth::user())
            return redirect('/admin');
          return view('clientes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nacimiento = $request->nacimiento;
        $yearR = date("Y", strtotime($nacimiento));  
        $year = date("Y");        
        $year -= $yearR;                
        
        $monthR = date("m", strtotime($nacimiento));  
        $month = date("m");                
        $month -=   $monthR;
        if($month < 0)
            $year--;
        
        else if($month == 0) { 
            $dayR = date("d", strtotime($nacimiento));  
            $day = date("d");
            $day -= $dayR;
            if($month <= 0){
                echo "aun no cumble.$year";
                $year--;
            }
        }
        
//        Encontramos la edad del contacto usaremos la variable $year para asignarle en la tabl
        $contacto = new Cliente();
        $contacto->nombre =   $request->nombre;
        $contacto->email =   $request->email;
        $contacto->sexo =   $request->sexo;
        $contacto->edad =   $year;
        $contacto->tipo =   $request->tipo;
        $contacto->telefono =   $request->telefono;
        $contacto->nacimiento =   $request->nacimiento;
        
        if($contacto->save()){
             return back()->with('msj', 'La noticia ha sido creada con exito');
        } else { 
            return back()->with('error', 'Los datos no de guardaron');
        }                                           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user())
            return redirect('/admin');
        
        $cliente = Cliente::find($id);
        
        return view('clientes/edit')->with(['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nacimiento = $request->nacimiento;
        $yearR = date("Y", strtotime($nacimiento));  
        $year = date("Y");        
        $year -= $yearR;                
        
        $monthR = date("m", strtotime($nacimiento));  
        $month = date("m");                
        $month -=   $monthR;
        if($month < 0)
            $year--;
        
        else if($month == 0) { 
            $dayR = date("d", strtotime($nacimiento));  
            $day = date("d");
            $day -= $dayR;
            if($month <= 0){
                echo "aun no cumble.$year";
                $year--;
            }
        }
        
//        Encontramos la edad del contacto usaremos la variable $year para asignarle en la tabl
        
        $contacto = Cliente::find($id);
        $contacto->nombre =   $request->nombre;
        $contacto->email =   $request->email;
        $contacto->sexo =   $request->sexo;
        $contacto->edad =   $year;
        $contacto->tipo =   $request->tipo;
        $contacto->telefono =   $request->telefono;
        $contacto->nacimiento =   $request->nacimiento;
        
        if($contacto->save()){
             return back()->with('msj', 'La noticia ha sido creada con exito');
        } else { 
            return back()->with('error', 'Los datos no de guardaron');
        }                                
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //                
        Cliente::destroy($id);
        return back()->with(['msj'=> true]);
    }
    
    public function establecerNacimiento() { 
        $clientes = Cliente::select('nacimiento','edad','id')->get();
        $año = date("Y");
        $x = 0;
        foreach($clientes as $n) {
            if ($n->nacimiento == NULL) {
                $x++;
                $nacimiento = $año - $n->edad;
                $nacimiento = $nacimiento ."-01-01";

                DB::table('clients')
                    ->where('id', $n->id)
                    ->update(['nacimiento' => $nacimiento]);
            }
        } 
        
        return back()->with(['fechas'=> $x]);
    }
    
    public function verificarEdad() { 
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        
        $cliente = Cliente::select('nacimiento', 'edad', 'id', 'nombre')->get();
        
        foreach($cliente as $n) { 
            
            $clienteAño = date("Y", strtotime($n->nacimiento));                  
            $clienteEdad = $year - $clienteAño;                        
            $clienteMes = date("m", strtotime($n->nacimiento));          
            $mes = $month - $clienteMes;
            
            if($mes < 0)
                $clienteEdad--;                       
                            
            else if($mes == 0) { 
                $diaCliente = date("d", strtotime($n->nacimiento));                  
                $diaCliente = $day - $diaCliente;
                if($diaCliente <= 0)
                {                
                        $clienteEdad--;
                }
            }
            
            DB::table('clients')
                    ->where('id', $n->id)
                    ->update(['edad' => $clienteEdad]);
        }
        return back()->with(['verificado'=> true]);
    }
    
    public function prueba() { 
         DB::table('prueba')->insert([
            ['numero' => '1']
    ]);
        
    }
    
    public function mail(Request $request)
    {
        $_message = $request->mensaje;
        $_email = $request->correo;
        $_name = $request->nombre;
        echo $_email;
        $_toSend = "Nombre: " . $_name . "\nE-mail: " . $_email . "\n\nMensaje:\n" . $_message;
             $to = "gimnasiawolosky@gmail.com";
        $subject = "Nuevo contacto: " . $_name . " - " . $_email;
        $headers = "From: $_email" . "\r\n" .
            "CC: " . $_email;

        if (mail($to, $subject, $_toSend, $headers)) {
            return back()->with('msj', 'La noticia ha sido creada con exito');
        } else { 
            return back()->with('error', 'Los datos no de guardaron');
        }
    }
}//End from controller
