<?php
//    header('Content-Type: application/json');

    require 'autoload.php';

    $metodos = [
        'inserir',
        'buscar',
        'filtrar',
    ];

    if (isset($_GET['acao']) && $_GET['acao'] == 'inserir') {

        $contato = new stdClass();
        $contato->nome = $_GET['nome'];
        $contato->email = $_GET['email'];
        $contato->telefone = $_GET['telefone'];

        inserir($contato, $conexao);

        echo json_encode(['status' => true, 'data' => $contato]);
        exit();

    } else if (isset($_GET['acao']) && $_GET['acao'] == 'buscar') {

        $contatos = buscar($conexao);

        if(!$contatos) {
            echo json_encode([
                'status' => false,
            ]);
            exit();
        }

        echo json_encode([
            'status' => true,
            'data' => $contatos,
        ]);

    } else if (isset($_GET['acao']) && $_GET['acao'] == 'filtrar') {

    } else {
        echo '404 - Pagina nao encontrada';
    }
