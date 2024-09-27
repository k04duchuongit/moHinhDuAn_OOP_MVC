<?php
namespace App\Models;

use APP\config\ConnectDb;

class DatabaseInteract {
    public $connectDb;

    public function __construct()
    {
        $this->connectDb = ConnectDb::connectDataBase();
    }

    public static function get_str_keys($data) {  // static có thể gọi trực tiếp mà không cần khởi tạo đối tượng
        $keys = array_keys($data); 
        return implode(',', $keys); 
    }

    public static function get_virtual_params($data) {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }
        return implode(',', $tmp);
    }

    public function get_set_params($data) {  // for update queries
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "$key = :$key";
        }
        return implode(',', $tmp);
    }

    public function insert($tableName, $data = []) {
        try {
            $strKeys = self::get_str_keys($data);                               // gọi phương thức tĩnh của chính lớp hiện tại
            $virtual_params = self::get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtual_params)";
            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fielName => &$value) {
                $stmt->bindParam(":$fielName", $value);
            }
            $stmt->execute();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function listAll($tableName) {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY ID DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function showOne($tableName, $id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function update($tableName, $id, $data = []) {
        try {
            $setParams = self::get_set_params($data);
            $sql = "UPDATE $tableName SET $setParams WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $fielName => &$value) {
                $stmt->bindParam(":$fielName", $value);
            }
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function delete($tableName, $id) {
        try {
            $sql = "DELETE FROM $tableName WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }
}
?>
