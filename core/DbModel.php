<?php


namespace app\core;

/**
 * Class DbModel
 * @author: Indranil Samanta (code-architect)
 * @package app\core
 */
abstract class DbModel extends Model
{
    /**
     * The database table name
     * @return string
     */
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).")
                                    VALUES(".implode(',', $params).")");
        foreach ($attributes as $attribute)
        {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}