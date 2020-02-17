<?php

// Incluindo arquivo de conexão
require_once('conn.php');

$id = (int)$_GET['id'];

// Selecionando fotos
$stmt = $pdo->prepare('SELECT nome FROM imagem WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Se executado
if ($stmt->execute()) {
    // Alocando foto
    $foto = $stmt->fetchObject();

    // Se existir
    if ($foto != null) {
        // Definindo tipo do retorno
        header('Content-Type: ' . $foto->nome);

    }
}