<?php

class formValidation{

    public function email($email){
        return preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email);
    }

    public function password($password) {
        /*
            Разрешенные символы: A-Z a-z 0-9
            Длина: 6-32
        */
        return preg_match("/^[a-zA-Z0-9,\.!?_-]{6,32}$/", $password);
    }

    public function username($username){

      return preg_match('^[0-9A-Za-z_]+$^', $username);

    }

}