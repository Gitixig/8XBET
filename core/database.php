<?php

class Database
{
    private static $instance = null;

    public static function connect()
    {
        if (self::$instance === null) {
            $config = require 'config/database.php'; // ← dùng file bạn vừa tạo
            $db = $config['db'];

            try {
                self::$instance = new PDO(
                    'mysql:host=' . $db['host'] . ';dbname=' . $db['name'],
                    $db['username'],
                    $db['password']
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Lỗi kết nối CSDL: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
