<?php


class Database
{
    public $_connection = null;
    private static $_instance = null;

    public function __construct()
    {
        $this->Connection();
    }

    public function Connection()
    {
        $this->_connection = new PDO('mysql:host=localhost:3308;dbname=lms;charset=utf8', 'root', '');
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function Instance()
    {
        if (!isset(self::$_instance)) {
            return self::$_instance = new Database();
        } else {
            return self::$_instance;
        }
    }

    public function Insert($tableName = '', $data = array())
    {
        $lastInsertedId = '';
        if (empty($tableName) || empty($data)) throw new PDOException('Table name and data is required');

        $columns = implode(',', array_keys($data));
        $setColumns = '';
        $increment = 1;
        foreach ($data as $value) {
            $setColumns .= '?';
            if ($increment < count($data)) {
                $setColumns .= ",";
            }
            $increment++;
        }
        $query = "INSERT INTO {$tableName}($columns) VALUES($setColumns)";
        // echo $query;
        $preStatement = $this->_connection->prepare($query);
        try {
            $preStatement->execute(array_values($data));
            $lastInsertedId = $this->_connection->lastInsertId();;
            return $lastInsertedId;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function Update($tableName = '', $data = array(), $criteria = '', $bindValue = array())
    {
        $setKey = '';
        $increment = 1;
        foreach ($data as $key => $value) {
            $setKey .= $key . '=?';
            if ($increment < count($data)) {
                $setKey .= ',';
            }
            $increment++;
        }
        $query = "UPDATE {$tableName} SET $setKey WHERE $criteria=?";
        $preStatement = $this->_connection->prepare($query);
        $mergeData = array_merge(array_values($data), $bindValue);
        try {
            return $preStatement->execute($mergeData);
            // return $query;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function Selectall($tableName = '', $column = '*', $criteria = '', $bindValue = array(), $clause = '')
    {
        if (empty($column)) {
            $column .= "*";
        }

        $query = "SELECT {$column} FROM {$tableName}";
        if (!empty($criteria)) {
            $query .= " WHERE {$criteria} = ?";
        }

        if (!empty($clause)) {
            $query .= " {$clause}";
        }
        //echo $query;
        $preStatement = $this->_connection->prepare($query);
        try {
            $preStatement->execute($bindValue);
            return $preStatement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
    public function Select($tableName = '', $column = '*', $criteria = '', $bindValue = array(), $clause = '')
    {
        if (empty($column)) {
            $column .= "*";
        }
        
        $query = "SELECT {$column} FROM {$tableName}";
        
        if (!empty($criteria)) {
            $query .= " WHERE {$criteria}=?";
        }  
        
        if (!empty($clause)) {
            $query .= " {$clause}";
        }
        
        $preStatement = $this->_connection->prepare($query);
        
        try {
            $preStatement->execute($bindValue);
            return $preStatement->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
        echo $query;
    }
    public function Query($query, $bindValue = array())
    {


        $preStatement = $this->_connection->prepare($query);
        try {
            $preStatement->execute($bindValue);
            return $preStatement->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }


    public function Delete($tableName = '', $criteria = '', $bindValue = array())
    {
        $query = "DELETE FROM {$tableName} WHERE {$criteria}=?";
        $preStatement = $this->_connection->prepare($query);
        try {
            return $preStatement->execute(array_values($bindValue));
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
   
}
$obj = Database::Instance();
// $object= Database::Connection();
