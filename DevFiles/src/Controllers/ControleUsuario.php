<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;
use Boundary\Home;
use Library\Autenticador;
use Library\AutenticadorEmMemoria;
use Twig_Loader_Filesystem;
use Twig_Environment;

/**
 * Description of ControleUsuario
 *
 * @author adenilton
 */
class ControleUsuario {
    //put your code here
    

    /**
     * 
     */
    public function __construct()
    {
        $this->authLogin();
    }
    
    private function authLogin()
    {
        if(array_key_exists('user', $_GET) and $_GET['user'] = login)
        {
            extract($_POST);
            $usuario = $entityManager->find('Usuario', $email);
            $hash = $usuario->getSenha(); 
            if(password_verify($senha, $hash)){
                Home::exibir();
            }
        }
    }
}
