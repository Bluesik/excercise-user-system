<?php

namespace App;

class Auth
{
    /**
     * Log in the user
     *
     * @param int $id
     * @return void
     */
    public static function login (int $id) : void
    {
        $GLOBALS['app']['user'] = $_SESSION['user'] = User::find($id);
    }

    /**
     * Log out the current user
     *
     * @return void
     */
    public static function logout () : void
    {   
        session_unset();
        session_destroy();

        $GLOBALS['app']['user'] = null;
    }

    /**
     * Get an authenticated user
     *
     * @return void
     */
    public static function user (){
        return $_SESSION['user'] ?? null;
    }

    /**
     * Get authenticated user's id
     *
     * @return int
     */
    public static function id () : int
    {
        return $_SESSION['user']['id'];
    }
}