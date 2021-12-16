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
    /* The side navigation menu */
    .sidenav {
        height: 100%;
        /* 100% Full-height */
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #111;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidenav */
    }

    .list-group-item.active {
        z-index: 0;
    }

    /* The navigation menu links */
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .text-inside-sidebar {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #f1f1f1;
    }

    /* Position and style the close button (top right corner) */
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
        padding: 20px;
    }

    .container-img {
        position: relative;
        text-align: center;
        color: white;
    }
    .bg-new-dark{
        background-color: #111;
    }


    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;

    }

    .centered-text {
        font-size: 25px;
        color: ;
    }

    .container-img:hover .centered:not(:hover) {
        display: flex;
        background-color: black;
    }

    .centered:hover {
        display: flex;
        background-color: black;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

</style>

<body>
    @livewireScripts
    @livewireStyles

    {{-- Side Nav Contatos --}}
    @livewire('listade-contatos')
    {{-- Side Nav Contatos --}}


    {{-- Side Nav Perfil --}}
    @livewire('change-photo-perfil', ['imagem_perfil' => $dados_perfil->caminho_imagem_perfil,
    'nome'=>$dados_perfil->nome, 'descricao_perfil'=>$dados_perfil->descricao_perfil]);
    {{-- Side Nav Perfil --}}
    <div class="container border-top border-dark" style="height: 100ch; margin-top: 5ch">
        <div class="row">
            <div class="col-3 bg-dark border-bottom">
                <nav class="navbar navbar-expand-lg navbar-dark ">
                    <a class="navbar-brand" href="#">
                       
                        @if ($dados_perfil->caminho_imagem_perfil)
                            @livewire('imagem-perfil',['imagem'=>$dados_perfil->caminho_imagem_perfil])
                        @else
                            @livewire('imagem-perfil',['imagem'=>$dados_perfil->caminho_imagem_perfil])
                        @endif
                    </a>
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item " id="contatos">
                                <a class="nav-link" href="#">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark" onclick="openAndCloseNavOfContatos()">
                                        <div class="d-flex justify-content-center">Contatos</div>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Contatos
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="  overflow-auto bg-dark text-light rounded style-overflow"
                                                        style="height: 50vh;">
                                                        @livewire('listade-contatos')
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-around" style="padding: 5%">

                                                    <button type="button" class="btn btn-dark"
                                                        data-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item d-flex justify-content-center">
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
            <div class="col-9 bg-success border-bottom">
                @livewire('perfil-user-mensagem')
            </div>

        </div>
        <div class="row">
            <div class="col-3 bg-dark" id="lista-contatos">
                
                <div class="border border-dark overflow-auto bg-dark text-light rounded style-overflow"
                    style="height: 75vh;">
                    @livewire('list-of-last-messages')
                    
                </div>
            </div>
            <div class="col-9 bg-success" >
                <div class="border border-dark overflow-auto bg-dark text-light rounded style-overflow mt-3"
                    style="height: 65vh;" id="scrollbar-mensagens">
                    <div class="d-flex justify-content-center">
                        <div class="alert-nova-message" id="btnAlert-Nova-Mensagem" style="top: 0; z-index: 1; position: absolute; visibility: hidden;"
                            onclick="scrollDownWhenMessageSend()">
                            <strong>Voce tem Novas Mensagens!</strong>
                        </div>
                    </div>
                    @livewire('mensagens')
                    
                </div>
            </div>
        </div>
        <script>
            function openAndCloseNavOfPerfil() {
                if ($navOpenPerfil == true) {
                    closeNavPerfil();
                } else {
                    openNavPerfil();
                }
            }
            var $navOpenPerfil = "";

            function openNavPerfil() {
                document.getElementById("mySidenavPerfil").style.width = "25%";
                $navOpenPerfil = true;
            }

            function closeNavPerfil() {
                document.getElementById("mySidenavPerfil").style.width = "0";
                $navOpenPerfil = false;
            }
            //**Perfil**/



            //**Contatos**/
            function openAndCloseNavOfContatos() {
                if ($navOpenContatos == true) {
                    closeNavContatos();
                } else {
                    openNavContatos();
                }
            }
            var $navOpenContatos = "";

            function openNavContatos() {
                document.getElementById("mySidenavContatos").style.width = "25%";
                $navOpenContatos = true;
            }

            function closeNavContatos() {
                document.getElementById("mySidenavContatos").style.width = "0";
                $navOpenContatos = false;
            }


$teste = $(".teste");
            //**Contatos**/
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
