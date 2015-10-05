<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

use Respect\Rest\Router;
use Library\Sessao;
use Twig_Loader_Filesystem;
use Twig_Environment;


/**
 * Description of ControleSessao
 *
 * @author adenilton
 */
class ControleSessao {
    //put your code here
    public function __construct() {
        $this->iniciaSessao();
        $this->teste();
    }
    
    private function iniciaSessao()
    {
        $ri = new Router;
        $ri->get('/', function(){
            $sess = Sessao::instanciar();

            $loader = new Twig_Loader_Filesystem('/var/www/meuspontos/public');
            $twig = new Twig_Environment($loader, array(
                'cache' => '/var/www/meuspontos/public/compilation_cache',
                'auto_reload' => true
            ));

            if($sess->existe('usuario')){
                echo $twig->render('index.html', array('foo' => 'bar'));
            } else {
                echo $twig->render('login.html', array('foo' => 'bar'));
            }
        });
    }
    
    private function teste()
    {
        $t = new Router;
        $t->get('/ajax/', function (){
            echo "OK";
        });
    }
}
