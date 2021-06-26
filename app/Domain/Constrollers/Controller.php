<?php


namespace Vendas\Controllers;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected FilesystemLoader $loader;
    protected Environment $twig;

    public function __construct()
    {
        // carregando diretorio dos arquivos
        $this->loader = new FilesystemLoader('Views/');
        $this->twig = new Environment($this->loader);
    }



    function dd($param)
    {
        var_dump($param);
        die();
    }

}