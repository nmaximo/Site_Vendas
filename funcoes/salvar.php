<?php

// Incluindo arquivo de conexão
require_once('conn.php');

// Constantes
define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

// Verificando se selecionou alguma imagem
if (!isset($_FILES['foto'])) {
    echo retorno('Selecione uma imagem');
    exit;
}

// Recupera os dados dos campos
$foto = $_FILES['foto'];
$nome = $foto['name'];
$Produto_id = $foto['Produto_id'];




// Preparando comando
$stmt = $pdo->prepare('INSERT INTO imagem (nome, Produto_id) VALUES (:nome, :Produto_id)');

// Definindo parâmetros
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':Produto_id', $Produto_id, PDO::PARAM_INT);

// Executando e exibindo resultado
echo ($stmt->execute()) ? retorno('Foto cadastrada com sucesso', true) : retorno($stmt->errorInfo());