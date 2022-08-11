<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Fabricante;

class productsController extends Controller
{
    public function ShowALL()
    {

        $search = request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produtos = Produto::all();
        }

        $fabricantes = Fabricante::all();

        return view('home', ['produtos' => $produtos, 'search' => $search, 'fabricantes' => $fabricantes]);
    }

    public function Store(Request $request)
    {
        $produtos = new Produto();

        $produtos->nome = $request->nome;
        $produtos->categoria = $request->categoria;
        $produtos->preco = $request->preco;
        $produtos->fabricante_id = $request->fabricante_id;

        $produtos->save();

        return redirect('/')->with('msg', 'Produto adicionado com sucesso!');
    }

    public function Destroy($id)
    {
        Produto::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Produto excluido com sucesso!');
    }

    public function Update(Request $request)
    {
        Produto::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Produto editado com sucesso!');
    }

}
