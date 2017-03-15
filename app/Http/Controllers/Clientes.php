<?php

namespace Wolosky\Http\Controllers;

use Illuminate\Http\Request;
use Wolosky\Cliente;
use Illuminate\Support\Facades\Auth;


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
}
