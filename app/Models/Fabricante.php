<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $casts = ['categorias' => 'array'];

    public function produtos(){
        return $this->hasMany('App\Models\Produtos');
    }
    
}
