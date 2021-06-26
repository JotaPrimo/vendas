<?php


namespace Vendas\Services;

use Exception;

class UsuarioServices
{

    public static function validarPost($dados)
    {
        $validation = [
            'name' => [
                'is_null'   => 'name is empty',
                'is_false'  => 'name is wrong value',
            ],

            'name' => [
                'is_null'   => 'name is empty',
                'is_false'  => 'name is wrong value',
            ],

            'name' => [
                'is_null'   => 'name is empty',
                'is_false'  => 'name is wrong value',
            ],
        ];

        $filter_rules = [
           'nome' => FILTER_SANITIZE_STRING,
           'email' => FILTER_SANITIZE_EMAIL,
           'senha' => FILTER_SANITIZE_STRING,
           'cpf' => FILTER_SANITIZE_STRING,
           'tipoUsuario' => FILTER_SANITIZE_NUMBER_INT,
           'status' => FILTER_SANITIZE_NUMBER_INT,
       ];

        $dados = filter_input_array($filter_rules);

        foreach ($dados as $field)
        {
            if(!empty($validation[$field]))
            {
                continue;
            }

            if($field === null or $field === '')
            {
                echo $validation[$field]['is_null'];
            }

            if(!$field)
            {
                echo $validation[$field]['is_false'];
            }

        }

    }

}