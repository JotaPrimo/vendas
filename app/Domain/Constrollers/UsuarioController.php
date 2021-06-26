<?php


namespace Vendas\Controllers;

use Vendas\Models\Usuario;
use Vendas\Services\UsuarioServices;
use Vendas\Repositories\UsuarioRepository;
use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class UsuarioController
{
    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct()
    {
        // carregando diretorio dos arquivos
        $this->loader = new FilesystemLoader('Views');
        $this->twig = new Environment($this->loader);
    }

    public function index()
    {
        $users = (new UsuarioRepository())->all();
        // renderiando a view
        $view = $this->twig->load('usuarios/index.php.twig');
        echo $view->render(compact('users'));
    }

    public function create()
    {
        // renderiando a view
        echo $this->twig->render('usuarios/create.php.twig');
    }

    public function store()
    {

        try {

            // validando post
            $valida = UsuarioServices::checaPost($_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['senha']);
            $userRepo = new UsuarioRepository();
            $user = new Usuario();
            $user->setNome($_POST['nome']);
            $user->setCpf($_POST['cpf']);
            $user->setEmail($_POST['email']);
            $user->setSenha($_POST['senha']);
            $userRepo->create($user);

            response()->redirect('/usuarios/success');

        } catch (Exception $exception)
        {
            echo $exception->getMessage();
            die();
        }

    }

    public function edit($id)
    {
        // renderiando a view
        $user = (new UsuarioRepository())->loadById($id);
        echo $this->twig->render('usuarios/edit.php.twig', compact('user'));

    }

    public function update($id)
    {
        $valida = UsuarioServices::checaPost($_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['senha'], $_POST['dt_nascimento']);
        $userRepo = new UsuarioRepository();
        $user = new Usuario();
        $user->setId($id);
        $user->setNome($_POST['nome']);
        $user->setCpf($_POST['cpf']);
        $user->setEmail($_POST['email']);
        $user->setSenha($_POST['senha']);
        $userRepo->update($user);
        return response()->redirect('/usuarios');
    }

    public function delete($id)
    {
        try {
            $userRepo = new UsuarioRepository();
            $userRepo->delete($id);

            return response()->redirect('/usuarios/success');

        } catch (Exception $exception)
        {
            return response()->redirect('/usuarios/error');
        }
    }

    public function success()
    {
        echo $this->twig->render('componentes/usuarios/success.php.twig');

    }

    public function error()
    {
        echo $this->twig->render('componentes/usuarios/erro.php.twig.twig');
    }

    public function emprestimos($id)
    {
        $emprestimos = (new UsuarioRepository())->listaEmprestimos($id);
        echo $this->twig->render('usuarios/lista-emprestimos.html.twig');

    }


}