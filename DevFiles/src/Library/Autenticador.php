<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Library;

/**
 * Description of Autenticador
 *
 * @author adenilton
 */
abstract class Autenticador {
    //put your code here
    private static $instancia = null;
 
    private function __construct() {}
 
    /**
     * 
     * @return Autenticador
     */
    public static function instanciar() {
 
        if (self::$instancia == NULL) {
            self::$instancia = new AutenticadorEmMemoria();
        }
 
        return self::$instancia;
 
    }
 
    public abstract function logar($email, $senha);
    public abstract function esta_logado();
    public abstract function pegar_usuario();
    public abstract function expulsar();
    
}
