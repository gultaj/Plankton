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
            return $this->pdo->query('SELECT * FROM `films`')->fetchAll();
        } else {
            return [
                ['name' => 'Lord of the ring'],
                ['name' => 'Star wars'],
            ];
        }
    }

    public function createFilm($variables) 
    {
        if ($this->pdo !== null) {
            if (isset($variables['name'])) {
                $sql = 'INSERT INTO films (name) VALUES (:name)';
                $query = $this->pdo->prepare($sql);
                $query->execute([':name' => $variables['name']]);
                return $this->pdo->lastInsertId();
            }
        }
        return false;
    }
}
