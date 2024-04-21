<?php

namespace App\Session;

class UserWebMotors{
    /**
     * @return boolean
     */
    private static function init(){
        session_status() !== PHP_SESSION_ACTIVE ? session_start() : true; 
          
    }
    /**
    * @param string $email
    */
    public static function login($email){
        self::init() ;

        $_SESSION['login'] = [
            'email' => $email
        ];
    }
  
    /**
     * @param array
     */
    public static function setDados( $id, $cpf, $nome, $email, $genero, $data_nascimento,  $telefone, $cep, $cidade, $uf, $nivel ){
        self::init();
        
        $_SESSION['user_webmotors'] = [
            'id'=> $id,
            'cpf' => $cpf,
            'nome_completo' => $nome,
            'email' => $email,
            'genero' => $genero,
            'data_nascimento' => $data_nascimento,
            'telefone' => $telefone,
            'cep' => $cep,
            'cidade' => $cidade,
            'uf' => $uf,
            'nivel' => $nivel
        ];
    }
    /**
     * @return boolean
     */
    public static function isLogged(){
        self::init();

        return isset($_SESSION['login']);
    }

    /**
     * @return array
     */
    public static function getInfo(){
        self::init();

        return $_SESSION['user_webmotors'] ?? [''];
    }

    public static function logout(){
        self::init();

        unset($_SESSION['login']);
        echo '<script>alert("Você saiu da sua conta!");window.location.href ="../../public/index.php";</script>';
    }
    
}

?>