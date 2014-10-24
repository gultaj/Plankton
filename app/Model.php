<?php

class Model
{
    protected $pdo = null;

    public function __construct($database, $user, $password, $host = 'localhost')
    {
        try {
            $this->pdo = new \PDO('mysql:dbname='.$database.';host='.$host, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->exec('SET CHARSET UTF8');
        } catch (\PDOException $e) {
            $this->pdo = null;
        }
    }

    public function getFilms()
    {
        if ($this->pdo !== null) {
            return $this->pdo->query('SELECT * FROM films ORDER BY name')->fetchAll();
        }
        return false;
    }

    public function getFilm($id) {
        if ($this->pdo !== null) {
            $sql = 'SELECT * FROM `films` WHERE `id` = ?';
            $query = $this->pdo->prepare($sql);
            $query->execute([$id]);
            $query->setFetchMode(PDO::FETCH_BOTH);
            return $query->fetch();
        }
        return false;
    }

    public function createFilm($variables) 
    {
        if ($this->pdo !== null) {
            if (isset($variables['name'])) {
                $sql = 'INSERT INTO films (name) VALUES (?)';
                $query = $this->pdo->prepare($sql);
                return $query->execute([$variables['name']]);
            }
        }
        return false;
    }

    public function updateFilm($variables) 
    {
        if ($this->pdo !== null && $variables['id'] > 0) {
            $sql = 'UPDATE films SET name=:name WHERE id=:id';
            $query = $this->pdo->prepare($sql);
            return $query->execute($variables);
        }
        return false;
    }

    public function deleteFilm($id) {
        $sql = "DELETE FROM films WHERE id = ?";
        $query = $this->pdo->prepare($sql);
        return $query->execute([$id]);
    }
}
