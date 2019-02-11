<?php

class db
{

    private static $connect;

    public static function connect()
    {
        if (empty(self::$connect)) {
            try {
                self::$connect = new PDO('mysql:host=localhost;dbname=store', 'root', '');

            } catch (PDOException $e) {
                print "Couldn't connect to the database: " . $e->getMessage();
            }

        }
        return self::$connect;

    }
}