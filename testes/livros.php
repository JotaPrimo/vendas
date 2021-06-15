<?php

require_once '../vendor/autoload.php';


use Biblioteca\Repositories\LivroRepository;
use Biblioteca\Models\Livro;

$livros = new Livro();
$livroRepo = new LivroRepository();
$livro = new Livro();
$livro->setTitulo('teste');
$livro->setAutor('autor');
$livro->setEditora('editora');
$livro->setUnidades(8);
$livro->setCodigoNacional('codigo_nacional');


//var_dump($livroRepo->create($livro));
$livros['livros'] = $livroRepo->all();
var_dump($livros['livros']);




