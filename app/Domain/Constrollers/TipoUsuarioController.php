<?php


namespace Vendas\Controllers;


use Vendas\Repositories\TipoUsuarioRepository;

class TipoUsuarioController extends Controller
{
    public function index()
    {
        $tiposUsuarios = TipoUsuarioRepository::all();
        return $this->twig->render('tipo-usuarios/index.php.twig', compact('tiposUsuarios'));
    }

    public function store()
    {
        
    }
}