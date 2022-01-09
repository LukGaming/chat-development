<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Hello, world!</title>
</head>
<link rel="stylesheet" href="<?php echo asset('css/mensagens.css'); ?>">
<style>
</style>

<body>
    @livewireScripts
    @livewireStyles
    <div class="container-app border-top border-dark" style="height: 100ch; ">
        <div class="row">
            <div class="col-3 bg-dark border-bottom menuPerfil">
                <nav class="navbar navbar-expand-lg navbar-dark ">
                    <a class="navbar-brand" href="#" >

                        @if ($dados_perfil->caminho_imagem_perfil)
                            @livewire('imagem-perfil',['imagem'=>$dados_perfil->caminho_imagem_perfil])
                        @else
                            @livewire('imagem-perfil',['imagem'=>$dados_perfil->caminho_imagem_perfil])
                        @endif
                    </a>
                    
                    <div class="collapse navbar-collapse border" id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-item " id="contatos">
                                <a class="nav-link" href="#">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark" onclick="openAndCloseNavContatos()">
                                        <div class="d-flex">Contatos</div>
                                    </button>
                                    
                                </a>
                            </li>
                            <li class="nav-item d-flex justify-content-between">
                                <div type="button" class="dropdown" data-toggle="dropdown" aria-expanded="false">
                                    <i style="font-size:16px; padding-right: -50% ;" class="fa">&#xf013;</i>
                                    </a>
                                </div>
                                <div class="dropdown-menu " style="right: 0">
                                    <div class="dropdown-item">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="#exampleModal2">
                                            Novo Contato
                                        </button>
                                    </div>
                                    <a class="dropdown-item">
                                        Another action</a>
                                    <a class="dropdown-item">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="btn">
                                                Desconectar
                                            </button>
                                        </form>
                                    </a>
                                </div>
                                @livewire('adiciona-contato')
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-9 bg-dark border-left border-bottom">
                @livewire('perfil-user-mensagem')
            </div>

        </div>
        <div class="row">
            <div class="col-3 bg-dark" id="lista-contatos">

                <div class="border border-dark overflow-auto bg-dark text-light rounded style-overflow"
                    style="height: 75vh;">
                    @livewire('list-of-last-messages')

                    @livewire('change-photo-perfil', ['imagem_perfil' => $dados_perfil->caminho_imagem_perfil,
                    'nome'=>$dados_perfil->nome, 'descricao_perfil'=>$dados_perfil->descricao_perfil])
                    @livewire('listade-contatos')
                </div>
            </div>
            <div class="col-9 bg-blue">
                <div class="border border-dark overflow-auto bg-dark text-light rounded style-overflow mt-3"
                    style="height: 65vh;" id="scrollbar-mensagens">
                    <div class="d-flex justify-content-center">
                        <div class="alert-nova-message" id="btnAlert-Nova-Mensagem"
                            style="top: 0; z-index: 1; position: absolute; visibility: hidden;"
                            onclick="scrollDownWhenMessageSend()">
                            <strong>Voce tem Novas Mensagens!</strong>
                        </div>
                    </div>
                    @livewire('mensagens')

                </div>
            </div>
        </div>
        <script>
            //**abrir e fechar perfil**/
            function openAndCloseNavOfPerfil() {
                if ($navOpenPerfil == true) {
                    closeNavPerfil();
                } else {
                    openNavPerfil();
                }
            }
            var $navOpenPerfil = "";

            function openNavPerfil() {
                document.getElementById("mySidenavPerfil").style.width = "100%";
                $navOpenPerfil = true;
                if ($navOpenContato == true) {
                    closeNavContato();
                }
            }

            function closeNavPerfil() {
                document.getElementById("mySidenavPerfil").style.width = "0%";
                $navOpenPerfil = false;
            }
            //**abrir e fechar perfil**/

            //*abrir e fecharContatos
            function openAndCloseNavContatos() {
                if ($navOpenContato == true) {
                    closeNavContato();
                } else {
                    openNavContato();
                }
            }
            var $navOpenContato = "";

            function openNavContato() {
                if ($navOpenPerfil == true) {
                    closeNavPerfil();
                }
                document.getElementById("mySidenavContatos").style.width = "100%";
                $navOpenContato = true;

            }

            function closeNavContato() {
                document.getElementById("mySidenavContatos").style.width = "0%";
                $navOpenContato = false;
            }
        </script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
</body>

</html>
