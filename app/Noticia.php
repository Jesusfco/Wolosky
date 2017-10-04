<?php

namespace Wolosky;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Noticia extends Model 
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'noticias';
    
            
    protected $fillable = [
    'TITULO','RESUMEN', 'FECHA','TEXTO','YOUTUBE','IMAGEN','user_id'
    ];
    
//    public $timestamps = false;
    
    public function scopeSearch($query, $name) 
    {
        $n = $query->where('TITULO', 'LIKE', "%$name%")->get();
//        $m = $query->where('TEXTO', 'LIKE', "%$name%")->union($n)->get();
        return $query->where('TITULO', 'LIKE', "%$name%");
    }
    
}
