<?php

require_once '../vendor/autoload.php';


use Biblioteca\Repositories\UsuarioRepository;
use Biblioteca\Models\Usuario;

$user = new Usuario();
$userRepo = new UsuarioRepository();
$user->setNome("Jailson Ferreira Primo");
$user->setEmail("gestald118@gmail.com");
$user->setSenha('dsadsdasd');

$user->setCpf('046.667.061-35');

$user->setDtNascimento('28-01-1995');
//var_dump($userRepo->create($user));
var_dump($userRepo->all());
//var_dump($userRepo->delete(2));

