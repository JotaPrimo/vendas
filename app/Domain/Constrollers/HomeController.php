<?php


namespace Biblioteca\Controllers;


use Biblioteca\Repositories\UsuarioRepository;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    public function index()
    {
        // preparando dados da view
        $users['users'] = (new UsuarioRepository())->all();

        // carregando diretorio dos arquivos
        $loader = new FilesystemLoader('Views/');
        $twig = new Environment($loader);

        // renderiando a view
        $template = $twig->load('usuarios/index.php.twig');
        echo $template->render($users);
    }
}