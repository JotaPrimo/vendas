<?php


namespace Biblioteca\Database;

use PDO;
use PDOException;

class DB
{
    private $server = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $db = "evoluindo";
    private string $table;
    private PDO $conn;

    public function __construct(string $table)
    {
        $this->table =$table;
        $this->setConn();
    }

    public function setConn()
    {
        try {

            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $exception)
        {
            die("ERRO : " . $exception->getMessage() . " CODE :  " . $exception->getCode());
        }
    }

    public function execute($sql, $parans = [])
    {
        try {

            $this->conn->beginTransaction();
            $stmtm = $this->conn->prepare($sql);
            $stmtm->execute($parans);
            $this->conn->commit();
            return $stmtm;


        } catch (PDOException $exception)
        {
            die("ERRO : " . $exception->getMessage());
        }
    }

    public function insert($values)
    {
        $binds = array_keys($values);
        $parans = array_pad([], count($values), '?');
        $sql = 'INSERT INTO '.$this->table.' ('.implode(',', $binds).') VALUES ('.implode(',', $parans).')';
        $this->execute($sql, array_values($values));


        return $this->conn->lastInsertId();
    }

    public function select($where = null, $orderBy = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? "WHERE ". $where : '';
        $orderBy = strlen($orderBy) ? "ORDER BY ". $orderBy : '';
        $limit = strlen($limit) ? "LIMIT ". $limit : '';
        $sql = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.'  '.$orderBy.'  '.$limit.' ;';
        return $this->execute($sql);
    }

    public function update($where, $values)
    {
        //DADOS DA QUERY
        $binds = array_keys($values);

        //MONTA A QUERY
        $sql = 'UPDATE '.$this->table.' SET '.implode('=?,',$binds).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($sql, array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    public function delete($where)
    {
        $sql = 'DELETE FROM '.$this->table.' WHERE ' .$where . ';';
        $this->execute($sql);
        return true;
    }

    public function count($columnName, $where)
    {
        $where = strlen($where) ? "WHERE ". $where : '';
        $sql = 'SELECT COUNT('.$columnName.') FROM '.$this->table.' '.$where.';';
        $this->execute($sql);
    }





}