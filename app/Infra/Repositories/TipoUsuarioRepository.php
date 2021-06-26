<?php


namespace Vendas\Repositories;


use Vendas\Database\DB;
use Vendas\Models\TipoUsuario;

class TipoUsuarioRepository
{
    const TABLE = "tipo_usuario";

    public static function all()
    {
        $db = new DB(self::TABLE);
        return $db->select()->fetchAll(\PDO::FETCH_CLASS, TipoUsuario::class);
    }

    public static function create(TipoUsuario $tipoUsuario)
    {
        $db = new DB(self::TABLE);
        $db->insert([
            'nome' => $tipoUsuario->getNome(),
            'descricao' => $tipoUsuario->getDescricao(),
        ]);
    }
}