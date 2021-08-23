<?php

namespace Model;

class Users extends Template
{
    protected static $table = 'users';

    public static function delete($id)
    {
        $table = "users";

        $query = "DELETE FROM $table WHERE id='$id'";

        $stmt = self::$db->query($query);

        if ($stmt) {
            return "ok";
        } else {
            return "error";
        }
    }
}
