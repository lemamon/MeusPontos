<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Boundary;

use Twig_Loader_Filesystem;
use Twig_Environment;
/**
 * Description of Home
 *
 * @author adenilton
 */
class Home {
    //put your code here
    private $loader;
    private $twig;

    public function __construct() {
        $this->loader = new Twig_Loader_Filesystem('/var/www/meuspontos/public');
        $this->twig = new Twig_Environment($loader, array(
            'cache' => '/var/www/meuspontos/public/compilation_cache',
            'auto_reload' => true
        ));
    }
    
    public static function exibir(){
        $this->twig->render('index.html');
    }
}
