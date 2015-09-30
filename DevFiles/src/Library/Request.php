<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Library;

/**
 * Description of Request
 *
 * @author adenilton
 */
class Request {
    //put your code here
    /**
     * 
     * @param string $method POST or GET
     * @param string $chave
     * @return boolean
     */
    public static function get($method, $chave)
    {
        switch ($method) {
            case 'GET':
                if(array_key_exists($_GET, $chave)){
                    return $_GET[$chave];
                } else {
                    return FALSE;
                }
                break;

            case 'POST':
                if(array_key_exists($_POST, $chave)){
                    return $_POST[$chave];
                } else {
                    return FALSE;
                }
                break;
        }
    }
}
