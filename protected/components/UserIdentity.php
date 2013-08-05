<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $usuario = Usuario::model()->findByAttributes(array('USU_usuario' => $this->username));
        //aca busco el usuario que se esta logeando
        if (!isset($usuario))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($usuario->USU_password !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {

            //si el usurio se logeo correctamente asigno a la variable idusuario el valor de $usuario->IDUSUARIO
            $this->setState('idusuario', $usuario->IDUSUARIO);

            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

}