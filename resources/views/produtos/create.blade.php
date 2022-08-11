
@extends('layout.main')

@section('titulo', 'ProjetoVaga')

@section('conteudo')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>PRODUTOS</h1>
    <form action="/produtos" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">NOME DO PRODUTO</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do produto" required>
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
                <option disabled>Sem Categorias</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="preco">PREÇO</label>
            <input type="number" class="form-control" id="preco" name="preco" placeholder="Digite o preço" required step="0.01" min="0">
        </div>
        <input type="submit" class="btn btn-primary" value="Adicionar"
            style="background-color: rgb(51, 51, 190); border: none; margin-bottom: 1.5rem;">
    </form>
</div>

@endsection