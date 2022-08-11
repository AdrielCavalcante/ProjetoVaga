@extends('layout.main')

@section('titulo', 'ProjetoVaga')

@section('conteudo')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>FABRICANTE E CATEGORIA</h1>
    <form action="/fabricantes" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">FABRICANTE</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do fabricante" required>
        </div>
        <div class="form-group">
            <label for="titulo">CATEGORIA</label>
            <div class="form-group">
                <input type="text" class="form-control" name="categorias[]" placeholder="Digite o nome da categoria 1" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="categorias[]" placeholder="Digite o nome da categoria 2" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="categorias[]" placeholder="Digite o nome da categoria 3" required>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Adicionar" style="background-color: rgb(51, 51, 190); border: none;">
    </form>
</div>

@endsection