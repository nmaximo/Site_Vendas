<?php
require_once "../ligacao_bd.php";


// inicia sessao
session_start();

// verifica se o utilizador ja realizou o acesso
if (!isset($_SESSION['loggedin'])) {
    header("location: ../login.php");
} else {
// verifica nivel de utilizador e atribui variavel
    if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
        $iduser = $_SESSION['id'];
        require_once "../ligacao_bd.php";
        $sql = "select Tipo_Utilizador_id  from utilizador where id = $iduser and Tipo_Utilizador_id = 1";
        $result = $link->query($sql);
        if ($result->num_rows == 1) {
            //ok
        } else {
            header("location: ../login.php");
        }
    }

}


if (isset($_GET['id'])) {
    // escreva aqui a sua query de remoção
    $sql = "DELETE FROM categoria WHERE id =  " . $_GET['id'];
    // se a query de remoção for executada com sucesso
    // mensagem de ok
    $resultado = $link->query($sql);
    if ($resultado) // will return true if succefull else it will return false
    {


       echo "<table class='table' ><thead class='thead-light'><tr align='center'><th scope='col' >Apagado com sucesso!</th></tr></thead><tbody><tr align='center'><th scope='row'><a href='menu_admin.php'>Clique para voltar ao menu!</a></th></tr>";

    } else {
        echo "<p>Erro ao apagar!</p>";
//        Debug
//        echo("Error description: " . mysqli_error($conn));
//        echo $resultado->error;
    }
}
$link->close();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
