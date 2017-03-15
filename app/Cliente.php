<?php

namespace Wolosky;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Cliente extends Model
{
    //
    protected $table = 'clients';
    
    public $incrementing = false;
    protected $primarykey = 'telefono';
    
    public $timestamps = false;
    
    protected $fillable = [
    'nombre','email', 'sexo','telefono','edad','tipo','nacimiento',
    ];        
    
    public function scopeSearch($query, $name) 
    {
        return $query->where('nombre', 'LIKE', "%$name%");
    }
}
