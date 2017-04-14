<?php

namespace Wolosky\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Wolosky\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;


class Noticias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $noticias = DB::table('noticias')                
                ->orderBy('FECHA','desc')
                ->paginate(9);
        return view('home/noticias')->with(['noticias'=> $noticias]);               
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(!Auth::user())
            return redirect('/admin');
        return view('noticias/create');
    }
   
    public function store(Request $request)
    {
         if(!Auth::user())
            return redirect('/admin');
        $this->validate($request, [
           'titulo' => 'required',
            'resumen' => 'required',
            'fecha' => 'required',
            'texto' => 'required',
            'youtube' => 'required',
            'imagen' => 'required|image',
        ]);
        
        //Se carga la imagen a la carpeta
        $img = $request->file('imagen');
        $file_route = time().'_'. $img->getClientOriginalName();

        Image::make($request->file('imagen'))
            ->resize(600,400)
            ->save("images/noticias/" . $file_route);

        //Storage::disk('imgNoticias')->put($file_route, file_get_contents($img->getRealPath()));
        
        //Detectamos saltos de linea y automatizamos <br>
        $texto = $request->texto;
        $texto = rawurlencode($texto);
        $texto = rawurldecode(str_replace("%0D%0A","<br>",$texto));        
//        echo nl2br($_POST['texto']);      Este codigo podria ser un resumen dle codigo de arriba

        $noticias = new \Wolosky\Noticia();
        $noticias->TITULO = $request->titulo;
        $noticias->RESUMEN = $request->resumen;
        $noticias->FECHA= $request->fecha;
        $noticias->TEXTO = $texto;
        $noticias->YOUTUBE = $request->youtube;
        $noticias->IMAGEN = $file_route;
        if($noticias->save()) { 
            return back()->with('msj', 'La noticia ha sido creada con exito');
        } else { 
            return back()->with('error', 'Los datos no de guardaron');
        }                                
    }
    
    public function show($id)
    {        
        $noticias = Noticia::find($id);
        $articulos = Noticia::limit(4)->select('TITULO','id','IMAGEN')->inRandomOrder()->get();
                
        return view('home/articulo')->with(['noticias'=> $noticias, 'not' => $articulos]);
    }
    
    public function edit($id)
    {
        if(!Auth::user())
            return redirect('/admin');
        $noticias = Noticia::find($id);          
        return view('noticias/edit')->with(['noticia'=> $noticias]);
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
        $this->validate($request, [
            'titulo' => 'required',
            'resumen' => 'required',
            'fecha' => 'required',
            'texto' => 'required',
            'youtube' => 'required',            
        ]);
       
        $noticias = Noticia::find($id);
         
        //Si se modigica la imagen
        if($request->file('imagen')) { 
            $img = $request->file('imagen');
            $file_route = time().'_'. $img->getClientOriginalName();

            Image::make($request->file('imagen'))
                    ->resize(600,400)
                    ->save("images/noticias/" . $file_route);


            //Storage::disk('imgNoticias')->put($file_route, file_get_contents($img->getRealPath()));
            Storage::disk('imgNoticias')->delete($noticias->IMAGEN);
            $noticias->IMAGEN = $file_route;
            
            
            
        } 
        
        //Detectamos saltos de linea y automatizamos <br>
        $texto = $request->texto;
        $texto = rawurlencode($texto);
        $texto = rawurldecode(str_replace("%0D%0A","<br>",$texto));        


       
        $noticias->TITULO = $request->titulo;
        $noticias->RESUMEN = $request->resumen;
        $noticias->FECHA= $request->fecha;
        $noticias->TEXTO = $texto;
        $noticias->YOUTUBE = $request->youtube;                
                
        if($noticias->save()) { 
            return back()->with('msj', 'La noticia ha sido modificada con exito');
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
        $n = Noticia::find($id);
        Storage::disk('imgNoticias')->delete($n->IMAGEN);
        Noticia::destroy($id);
        return back()->with(['msj'=> true]);
    }
    
       public function home()
    {
        //
        $noticias = Noticia::orderBy('FECHA','desc')->limit(3)->get();
        return view('home/home')->with(['noticias'=> $noticias]);
    }     
    
    
     public function lista(Request $request)
    {



      $noticias = Noticia::search($request->name)
                ->orderBy('id','desc')
                ->paginate(15);
        return view('noticias/list')->with(['noticias'=> $noticias]);
    }

    public function prueba(Request $request)
    {
        if(!Auth::user()->name) return "No autenticado :("; else return Auth::user()->name;
    }

}
