<?php

namespace App\Model;

class JoinManager extends AbstractManager
{
    /**
     *
     */
    public const TABLE = 'soldier';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert(array $soldier)
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `password`) 
        VALUES (:name, :password)");
        $statement->bindValue('name', $soldier['name'], \PDO::PARAM_STR);
        $statement->bindValue('password', password_hash($soldier['password'], PASSWORD_DEFAULT));

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
