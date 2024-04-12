<?php

namespace App\Session;

class User{
    /**
     * @return boolean
     */
    private static function init(){
        session_status() !== PHP_SESSION_ACTIVE ? session_start() : true; 
          
    }

    /**
     * @param string @name
     * @param string @email
     * @param string @picture

     */
    public static function login($name,$email,$picture){
        self::init();

        $_SESSION['user_google'] = [
            'name' => $name,
            'email' => $email,
            'picture' => $picture
        ];
    }
    /**
     * @return boolean
     */
    public static function isLogged(){
        self::init();

        return isset($_SESSION['user_google']);
    }

    /**
     * @return array
     */
    public static function getInfo(){
        self::init();

        return $_SESSION['user_google'] ?? [''];
    }

    public static function logout(){
        self::init();

        unset($_SESSION['user_google']);
    }
    
}

?>