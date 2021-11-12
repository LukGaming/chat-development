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
<link rel="stylesheet" href="<?php echo asset('css/mensagens.css') ?>">

<body>
    <div class="container border-top border-dark" style="height: 100ch; margin-top: 5ch">
        <div class="row">
            <div class="col-3 bg-dark border-bottom">
                <nav class="navbar navbar-expand-lg navbar-dark ">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('/storage/app/public/user_img/foto_facebook.png')}}" class="imagem_perfil rounded rounded-circle w-75  ">
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
                                    <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#exampleModal">
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
                                                    <div class="border border-dark overflow-auto bg-dark text-light rounded style-overflow"
                                                        style="height: 50vh;">
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>
                                                        <div class="list-group " style="margin: 5px; ">
                                                            <a href="#"
                                                                class="list-group-item div-contato list-group-item-action flex-column align-items-start active">
                                                                <div class="d-flex justify-content-between">
                                                                    <img src="Foto facebook.png"
                                                                        class="imagem_perfil_contato rounded rounded-circle w-25 ">
                                                                    <h6 class="nome-contato">Paulo Antonio Ferreira
                                                                        Mendes Macedo</h6>
                                                                </div>

                                                            </a>
                                                        </div>

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
                                <div class="dropdown-menu">
                                    <div class="dropdown-item">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn " data-toggle="modal"
                                            data-target="#exampleModal2">
                                            Novo Contato
                                        </button>
                                    </div>
                                    <a class="dropdown-item">Another action</a>
                                    <a class="dropdown-item">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">Separated link</a>
                                </div>

                                <!-- Modal  2-->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Novo Contato</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="email">Endereço de Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="nome@exemplo.com">
                                                        <br>
                                                        <label for="nome">Nome do Contato</label>
                                                        <input type="text" class="form-control" id="nome"
                                                            placeholder="Nome do Contato">

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-9 bg-success border-bottom">

            </div>
        </div>
        <div class="row">
            <div class="col-3 bg-dark" id="lista-contatos">
                <input class="form-control form-control-md " type="text" placeholder="Pesquisar por mensagens"
                    id="search-messages">
                <hr class="bg-light">
                <div class="border border-dark overflow-auto bg-dark text-light rounded style-overflow"
                    style="height: 75vh;">
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px; ">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                    <div class="list-group" style="margin-bottom: 5%; margin-right: 5px;">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Paulo Antonio</h6>
                                <small><span class="badge badge-primary badge-pill bg-dark">14</span></small>
                            </div>
                            <div class="border-bottom"></div>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-9 bg-success ">
                <div class="border border-dark overflow-auto bg-dark text-light rounded style-overflow mt-3"
                    style="height: 75vh;">
                    <div class="skype-parent ">
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>It's easy!</p>
                            </div>
                            <div>08:40</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>It's easy!</p>
                            </div>
                            <div>08:40</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>It's easy!</p>
                            </div>
                            <div>08:40</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>It's easy!</p>
                            </div>
                            <div>08:40</div>
                        </div>

                        <div class="message user">
                            <div></div>
                            <div>
                                <p>Really?</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>Well...</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message user">
                            <div></div>
                            <div>
                                <p>Really?</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>It's easy!</p>
                            </div>
                            <div>08:40</div>
                        </div>

                        <div class="message user">
                            <div></div>
                            <div>
                                <p>Really?</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>Well...</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message user">
                            <div></div>
                            <div>
                                <p>Really?</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>It's easy!</p>
                            </div>
                            <div>08:40</div>
                        </div>

                        <div class="message user">
                            <div></div>
                            <div>
                                <p>Really?</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message">
                            <div><img src="https://i.stack.imgur.com/1ZIkv.jpg?s=32&g=1"></div>
                            <div>
                                <p>Well...</p>
                            </div>
                            <div>08:42</div>
                        </div>
                        <div class="message user">
                            <div></div>
                            <div>
                                <p>Really?</p>
                            </div>
                            <div>08:42</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <div class="sub_div ">
                            <div class="form-row">
                                <div class="col-8 mb-3 ml-5">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col mb-3 ml-5">
                                    <button class="btn btn-primary" type="submit">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  -->
</body>

</html>