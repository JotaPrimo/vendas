<?php


namespace Vendas\Services;

use Exception;

class UsuarioServices
{
    public static function encrytPassword($senha)
    {
        return md5($senha);
    }

    public static function checaPost($nome)
    {
        $erros = [];

        if ( !isset( $_POST['nome'] ) || empty( $_POST['nome'] ) ) {

            $erros = 'Campo nome inválido';
        }

        if ( !isset( $_POST['email'] ) || empty( $_POST['email'] ) ) {

            $erros = 'Campo email inválido';
        }

        if ( !isset( $_POST['senha'] ) || empty( $_POST['senha'] ) ) {

            $erros = 'Campo senha inválido';
        }

        if ( !isset( $_POST['cpf'] ) || empty( $_POST['cpf'] ) ) {

            $erros = 'Campo cpf inválido';
        }

        if(!empty($erros))
        {
           return (new Exception('Campos com valor incorreto : ' . implode(',', $erros)));
        }

        return true;

    }



}