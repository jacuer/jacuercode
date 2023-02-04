<?php 

class Credentials {
    private static $db_host = "localhost";
    private static $db_user = "root";
    private static $db_pass = "";
    private static $db_name = "votaciones";

    public static function getHost() {
        return self::$db_host;
    }

    public static function getUser() {
        return self::$db_user;
    }

    public static function getPassword() {
        return self::$db_pass;
    }

    public static function getDatabase() {
        return self::$db_name;
    }
}


?>