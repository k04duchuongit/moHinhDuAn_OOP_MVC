<?php
// file kết nối db
namespace APP\config;

use PDO;                        // sử dụng use vì lớp pdo nằm trong namespace mặc định
use Exception;

class ConnectDb
{
    public static function connectDataBase()
    {
        try {
            $dsn = _DRIVER . ':dbname=' . _DB . ';host=' . _HOST;

            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Đẩy lỗi vào ngoại lệ khi truy vấn
            ];
            return $GLOBALS['conn'] = new PDO($dsn, _USER, _PASS, $options);
        } catch (Exception $exception) {
            print_r('Loi cmnr :' . $exception);
            die();
        }
    }
}
