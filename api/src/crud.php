<?php
/**
 * Created by PhpStorm.
 * User: cliff
 * Date: 26/10/2017
 * Time: 20:23
 */

function inserir($object, $conexao)
{
    $query = 'INSERT INTO tb_contato (nome, email, telefone) ';
    $query .= " VALUES ('$object->nome', '$object->email', '$object->telefone');";

    mysqli_query($conexao, $query) or die(mysqli_error($conexao));

    return mysqli_insert_id($conexao);
}

function buscar($conexao)
{
    $query = 'SELECT * FROM tb_contato;';

    $resultado = mysqli_query($conexao, $query) or die (mysqli_error($conexao));

    if (mysqli_num_rows($resultado) < 1) {
        return false;
    }

    $contatos = [];
    while ($linha = mysqli_fetch_object($resultado)) {
        $contatos[] = $linha;
    }

    return $contatos;
}

function filtrar()
{

}