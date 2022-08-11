<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <!--Fonte do google-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!--CSS do Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!--CSS do projeto-->
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Adicionar
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" style="width: 70%;" href="../fabricantes/create">Fabricante</a>
                        <a class="dropdown-item" style="width: 70%;" href="../fabricantes/create">Categoria</a>
                        <a class="dropdown-item" style="width: 70%;" href="../produtos/create">Produto</a>
                    </div>
                </li>
            </ul>
            
        </div>
    </nav>
    <main class="container-fluid">
        @if(session('msg'))
        <div class="alert alert-success" role="alert">
            <p class="msg" style="text-align: center; margin: 0; color:seagreen">{{session('msg')}}</p>
        </div>
        @endif
        @yield('conteudo')
    </main>
    <footer>
        <p>Adriel ProjetoVaga &copy; 2022</p>
    </footer>
</body>

</html>