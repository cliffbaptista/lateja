<?php

/**
 * arquivo responsavel por carregar todos os arquivos necessarios pro PHP funcionar
 */

function config(){
    return require __DIR__ . '/config.php';
}

require_once 'src/conexao.php';
require_once 'src/crud.php';