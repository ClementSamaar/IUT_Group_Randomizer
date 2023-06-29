<?php

class Queries
{
    public static function getById(PDO $pdo, string $table, int $id) : object {
        $query = $pdo->prepare($pdo->quote('SELECT * FROM ' . $table . 'WHERE id=' . $id));
        $query->execute();
        return $query->fetchObject();
    }

    /**
     * @throws Exception
     */
    public static function getByWhatever(PDO $pdo, string $table, array $attributes, array $values) : array {
        if (count($attributes) != count($values)) throw new Exception('Attributes and values array does not contain the same amount of value');
        else{
            $query = 'SELECT * FROM ';
            foreach ($attributes as $attribute){
                $query .= $attribute;
                if (end($attributes) != $attribute) $query .= ', ';
            }
            $query .= ' WHERE ';
            foreach ($values as $value){
                $query .= $value;
                if (end($values) != $value) $query .= ', ';
            }
            $query = $pdo->prepare($pdo->quote($query));
            $query->execute();

            $response = [];
            while ($result = $query->fetchObject()) $response[] = $result;
            return $response;
        }
    }
}