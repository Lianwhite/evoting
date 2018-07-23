<?php

class database
{
    private static function connect()
    {
        $config = require(__DIR__. '/../config.php');

        $configdatabase = $config["database"];

        try {
            $conn = new PDO("mysql:host={$configdatabase['host']};
            dbname={$configdatabase['dbname']}", 
            $configdatabase["username"], $configdatabase["password"]);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function select($tableName, $columns = "", $conditions = [], $type = "AND", $join = "")
    {
        try {
            $conn = database::connect();

            $columnsResult = (empty($columns))?"*":$columns;

            if (empty($conditions)) {

                $conditionsResult = "";

            } else {

                foreach ($conditions as $key => $value) {

                    if (empty($value) && $value !== 0) {

                        $conditionsArr[] = $key;

                    }else{

                        $placeholder = str_word_count($key, 1);

                        $conditionsArr[] = $key." :".$placeholder[0];

                    }
                }

                $conditionsResult = " WHERE ".implode(" {$type} ", $conditionsArr);
            }

            $queryStr = "SELECT {$columnsResult} FROM {$tableName} {$join} {$conditionsResult} ;";

            $data = $conn->prepare($queryStr);

            foreach ($conditions as $key => &$value) {

                if(!empty($value) || $value === 0){

                    $placeholder = str_word_count($key, 1);

                    $data->bindParam(":{$placeholder[0]}", $value);
                }
            }
            $data->execute();

            if ($data->rowCount() > 1) {

                $result = $data->fetchAll(PDO::FETCH_ASSOC);

            } else {

                // $result = $data->fetch(PDO::FETCH_ASSOC);
                $result = $data->fetchAll(PDO::FETCH_ASSOC);
            }
            $conn = null;

            return $result;

        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }
    }


    public static function insert($tableName, $values)
    {
        try {
            $conn = database::connect();

            foreach ($values as $key => $value) {

                $columnsArr[] = $key;

                $placeholderArr[] = ":{$key}";
            }
            $columns = implode(", ", $columnsArr);

            $placeholder = implode(", ", $placeholderArr);

            $queryStr = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholder})";

            $data = $conn->prepare($queryStr);

            foreach ($values as $key => &$value) {

                $data->bindParam(":{$key}", $value);
            }
            $data->execute();

            $last_inserted_id = $conn->lastInsertId();

            $conn = null;

            return $last_inserted_id;

        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }
    }


    public static function update($tableName, $set = [], $conditions, $type = "AND")
    {
        $conn = database::connect();

        foreach ($set as $key => $value) {

            $setArr[] = "{$key} = :{$key}";
        }
        $setValues = implode(", ", $setArr);

        // foreach ($conditions as $key => $value) {

        //     $placeholder = str_word_count($key, 1);

        //     $conditionsArr[] = $key." :".$placeholder[0];
        // }
        // $conditionsResult = " WHERE ".implode(" AND ", $conditionsArr);

        if (empty($conditions)) {

            $conditionsResult = "";

        } else {

            foreach ($conditions as $key => $value) {

                if (empty($value) && $value !== 0) {

                    $conditionsArr[] = $key;

                }else{

                    $placeholder = str_word_count($key, 1);

                    $conditionsArr[] = $key." :".$placeholder[0];

                }
            }

            $conditionsResult = " WHERE ".implode(" {$type} ", $conditionsArr);
        }

        $queryStr = "UPDATE {$tableName} SET {$setValues} {$conditionsResult}";

        $data = $conn->prepare($queryStr);

        foreach ($set as $key => &$value) {

            $data->bindParam(":{$key}", $value);
        }
        foreach ($conditions as $key => &$value) {

            if(!empty($value) || $value === 0){

                $placeholder = str_word_count($key, 1);

                $data->bindParam(":{$placeholder[0]}", $value);
            }
        }
        $data->execute();

        $conn = null;
    }

    public static function delete($tableName, $conditions)
    {
        $conn = database::connect();

        foreach ($conditions as $key => $value) {

            $placeholder = str_word_count($key, 1);

            $conditionsArr[] = $key." :".$placeholder[0];
        }
        $conditionsResult = " WHERE ".implode(" AND ", $conditionsArr);

        $queryStr = "DELETE FROM {$tableName} {$conditionsResult}";

        $data = $conn->prepare($queryStr);

            foreach ($conditions as $key => &$value) {

                $placeholder = str_word_count($key, 1);
    
                $data->bindParam(":{$placeholder[0]}", $value);
            }

        try {

            $data->execute();

        }catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        // echo "Error: Something went wrong";
        }
    }
}
