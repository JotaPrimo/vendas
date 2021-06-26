<?php


namespace Vendas\Repositories;

use Vendas\Models\Usuario;
use Vendas\Database\DB;
use Vendas\Services\UsuarioServices;
use PDO;
use Exception;

class UsuarioRepository
{
    private $table = 'usuarios';
    private $tableEmprestimos = 'emprestimos';

    public function create(Usuario $usuario): bool
    {
        return (new DB($this->table))->insert([
            'nome'  => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'senha' => UsuarioServices::encrytPassword($usuario->getSenha()),
            'cpf'   => $usuario->getCpf(),
        ]);
    }

    public function all($where = null, $orderBy = null, $limit = null)
    {
        return (new DB($this->table))->select($where)->fetchAll(PDO::FETCH_CLASS, Usuario::class);
    }

    public function update(Usuario $usuario)
    {
        return (new DB($this->table))->update('id = ' .$usuario->getId(), [
            'nome' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'senha' => UsuarioServices::encrytPassword($usuario->getSenha()),
            'cpf'   => $usuario->getCpf(),
        ]);
    }

    public function loadById($id)
    {
        $usuario = (new DB($this->table))->select('id = ' . $id)->fetchObject(Usuario::class);

        if(!$usuario instanceof Usuario)
        {
            throw new Exception("ERRO. usuário não encontrado");
        }

        return $usuario;
    }

    public function delete($id)
    {
        return (new DB($this->table))->delete('id = '.$id);
    }

    public function listaEmprestimos($usuarioId)
    {
        return (new DB($this->tableEmprestimos))->select('usuario_id = ' . $usuarioId)->fetchAll();
    }

}