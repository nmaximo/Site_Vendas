<?php
// Incluindo arquivo de conexão
require_once('conn.php');

// Selecionando fotos
$stmt = $pdo->query('SELECT id, nome, produto_id FROM imagem');
?>

<div class="row">

    <?php while ($foto = $stmt->fetchObject()): ?>

        <div class="col-sm-6 col-md-4">

            <div class="thumbnail">

                <img src="converter.php?id=<?php echo $foto->id ?>" />

                <div class="caption">
                    <strong>Nome:</strong> <?php echo $foto->nome ?> <br/>
                    <strong>Id_Produto:</strong> <?php echo $foto->Produto_id ?> <br/>
                </div>

            </div>

        </div>

    <?php endwhile ?>

</div>
