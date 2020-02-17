<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["tmp_name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


// VERIFICA TAMANHO DA IMAGEM (Este teste não é obrigatório)
if(is_uploaded_file($_FILES['f_foto_produto']['tmp_name'])) {
    if($_FILES['f_foto_produto']['size']>(64*1024)) { // se for maior de 64k
        echo 'Arquivo de imagem deve ser menor que 64Kb!';
    }
}
// INÍCIO: UPLOAD IMAGEM
if(is_uploaded_file($_FILES['f_foto_usuarios']['tmp_name'])) {
    $imgData = file_get_contents($_FILES['f_foto_usuarios']['tmp_name']);
    $sizeData = getimagesize($_FILES['f_foto_usuarios']['tmp_name']);
    $foto_usuarios = $imgData;
    $tipo_foto_usuarios = $sizeData['mime'];
?>