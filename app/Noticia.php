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
    'TITULO','RESUMEN', 'FECHA','TEXTO','YOUTUBE','IMAGEN',
    ];
    
    public $timestamps = false;
    
    public function scopeSearch($query, $name) 
    {
        return $query->where('TITULO', 'LIKE', "%$name%");
    }
    
}
