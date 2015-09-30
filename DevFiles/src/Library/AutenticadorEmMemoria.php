<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Library;



/**
 * Description of AutenticadorEmMemoria
 *
 * @author adenilton
 */
class AutenticadorEmMemoria {
    //put your code here
    public function esta_logado() {
        $sess = Sessao::instanciar();
        return $sess->existe('usuario');
    }
 
    public function logar($email, $senha) {
        $sess = Sessao::instanciar();
        
        $usuario = $entityManager->find('Usuario', 'adenilton.barroso@yahoo.com.br');
        
        if($usuario){
            $pass = $usuario->getSenha();
            if(password_verify($senha, $pass)){
                $user['id'] = $usuario->getId();
                $user['email'] = $usuario->getEmail();
                $user['nome'] = $usuario->getNome();
                
                $sess->set('usuario', $user);
                return true;
            }
        } else {
            return false;
        }
    }
 
    public function pegar_usuario() {
        $sess = Sessao::instanciar();
 
        if ($this->esta_logado()) {
            $usuario = $sess->get('usuario');
            return $usuario;
        }
        else {
            return false;
        }
 
    }
 
    public function expulsar() {
        header('location: /nao_encontrado');
    }
}
