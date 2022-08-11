<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fabricante;

class fabricantesControle extends Controller
{
    public function Store(Request $request){
        $fabricantes = new Fabricante();

        if (!($request->filled('nome'))) { 
            return redirect('/')->with('msg', 'Há algum campo que não foi preenchido!');
        }

        $fabricantes->nome = $request->nome;
        $fabricantes->categorias = $request->categorias;

        $fabricantes->save();

        return redirect('/')->with('msg', 'Fabricante e Categorias adicionados com sucesso!');
    }

    public function Show(){
        $fabricantes = Fabricante::all();

        return view('produtos.create', ['fabricantes' => $fabricantes]);
    }
}
