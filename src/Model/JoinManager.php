<?php

namespace App\Model;

class JoinManager extends AbstractManager
{
    /**
     *
     */
   const TABLE = 'soldier';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
    /**
     * @param array $soldier
     * @return int
     */
    public function insert(array $soldier): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `password`) VALUES (:name, :password)");
        $statement->bindValue('name', $soldier['name'], \PDO::PARAM_STR);
        $statement->bindValue('password', $soldier['password'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
