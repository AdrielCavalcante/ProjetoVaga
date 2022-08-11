<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'categoria', 'preco', 'fabricante_id']; 

    public function fabricante(){
        return $this->belongsTo('App\Models\Fabricante');
    }
}
