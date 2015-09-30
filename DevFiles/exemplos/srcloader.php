<?php
/**
 * Descartado
 * O Carregamento dos namespaces personalizados
 * está configurado no arquivo "composer.json"
 */
//ClassLoader personalizado
session_start();

/**
 * @param $classe Nome da classe de controle
 * @return boolean
 */
function controlLoader($classe)
{
    $dir = dirname(__FILE__);
    $arquivo = $dir . "/src/Controllers/$classe.php";
    if (file_exists($arquivo)) {
        require_once($arquivo);
        return true;
    }
}

/**
 * @param $classe Nome da classe de fronteira
 * @return boolean
 */
function boundaryLoader($classe)
{
    $dir = dirname(__FILE__);
    $arquivo = $dir . "/src/Boundary/$classe.php";
    
    if (file_exists($arquivo)) {
        require_once($arquivo);
        return true;
    }
}


function libraryLoader($classe)
{
    $dir = dirname(__FILE__);
    $arquivo = $dir . "/src/Library/$classe.php";
    
    if (file_exists($arquivo)) {
        require_once($arquivo);
        return true;
    }
}

//Registrando os loaders
spl_autoload_register('controlLoader');
spl_autoload_register('boundaryLoader');
spl_autoload_register('libraryLoader');

//Fechando e salvando a sessão
session_write_close();