<?php

namespace App;

use App\Db;
use App\Model;

class User extends Model
{
    protected static $table = 'users';

    /**
     * Check if the user is logged in
     *
     * @return bool
     */
    public static function isLoggedIn () : bool{
        return array_key_exists('user', $_SESSION);
    }

    /**
     * Get user by username
     *
     * @param string $username
     * @return array|null
     */
    public static function getByUsername (string $username) : ?array{
        $result = static::where([
            'username' => $_REQUEST['username'],
        ]);

        return ! empty($result) ? $result[0] : null;               
    }

    /**
     * Get user by email and username
     *
     * @param string $email
     * @param string $username
     * @return array|null
     */
    public static function geByEmailAndUsername (string $email, string $username) : ?array
    {
        $result = static::where([
            'AND' => [
                'username' => $_REQUEST['username'],
                'email'    => $_REQUEST['email'],
            ]
        ]);

        return ! empty($result) ? $result[0] : null;
    }

    /**
     * Change user's password
     *
     * @param int $userId
     * @param string $password
     * @return void
     */
    public static function changePassword (int $userId, string $password) : void
    {
        static::update([ 'password' => password_hash($password, PASSWORD_BCRYPT) ], ['id' => $userId]);
    }

    /**
     * User forgot his password
     *
     * @param int $userId
     * @return void
     */
    public static function forgotPassword (int $userId) : void
    {
        $password = static::generatePassword();

        static::changePassword($userId, $password);
        static::sendNewPassword($userId, $password);
    }

    /**
     * Generate a random password
     *
     * @return string
     */
    public static function generatePassword () : string{
        $hash     = hash('sha512', microtime());
        $password = '';

        for($i = 1; $i <= 32; $i++){
            $password .= $hash[random_int(0, strlen($hash) -1)];
        }

        return $password;
    }

    /**
     * Send new password to the user
     *
     * @param int $userId
     * @param string $password
     * @return void
     */
    public static function sendNewPassword (int $userId, string $password) : void
    {
        $user = static::find($userId);

        mail($user['email'], 'Your new password is here!', "Your new password is {$password}");
    }
}
