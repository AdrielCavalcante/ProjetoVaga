<?php
    use App\Models\Fabricante;
?>

@extends('layout.main')

@section('titulo', 'ProjetoVaga')

@section('conteudo')

@if($search)
<h2>Buscando por produto: {{ $search }}</h2>
@else
@endif

<form style="margin: 1rem 0;" class="form-inline" action="/" method="GET">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Sua busca" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Produto</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Categoria</th>
            <th scope="col">Preço</th>
        </tr>
    </thead>
    <tbody>
        @forelse($produtos as $produto)
        <?php 
            $fabricanteProduto = Fabricante::where('id', $produto->fabricante_id)->first()->toArray();;
        ?>
            <tr>
                <th scope="row">{{ $produto->id }}</th>
                <td>{{ $produto->nome }}</td>
                <td>{{ $fabricanteProduto['nome'] }}</td>
                <td>{{ $produto->categoria }}</td>
                <td>R$ {{ $produto->preco }}</td>
                <td style="width: 30px"><a href="" data-toggle="modal" data-target="#lol{{ $produto->id }}" class="btn btn-info edit-btn">
                    <ion-icon name="create-outline"></ion-icon>Editar
                </a></td>
                <td><form action="/produtos/{{ $produto->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">
                        <ion-icon name="trash-outline"></ion-icon>Deletar
                    </button>
                </form></td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="lol{{ $produto->id }}" tabindex="-1" aria-labelledby="lol" aria-hidden="true" style="wi">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">PRODUTOS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/produtos/update/{{ $produto->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nome">NOME DO PRODUTO</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                        placeholder="Digite o nome do produto" value="{{ $produto->nome }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">FABRICANTE</label>
                                    <select name="fabricante_id" id="" class="custom-select">
                                        @forelse($fabricantes as $fabricante)
                                        <option value="{{ $fabricante->id }}">{{ $fabricante->nome }}</option>
                                        @empty
                                        <option disabled>Sem Fabricantes</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">CATEGORIAS</label>
                                    <select name="categoria" id="" class="custom-select">
                                        @forelse($fabricantes as $fabricante)
                                        @foreach($fabricante->categorias as $categoria)
                                        <option value="{{ $categoria }}">{{ $categoria }}</option>
                                        @endforeach
                                        @empty
                                        <p>Sem cadastros!</p>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="preco">PREÇO</label>
                                    <input type="number" class="form-control" id="preco" name="preco" placeholder="Digite o preço"
                                        required step="0.01" min="0" value="{{ $produto->preco }}">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>Sem cadastros!</p>
        @endforelse
    </tbody>
</table>



@endsection