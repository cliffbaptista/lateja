<?php

$database = config()['database'];

$conexao = mysqli_connect($database['host'], $database['user'], $database['password'], $database['name']) or die ('Erro na Conexao com o Banco de Dados');

