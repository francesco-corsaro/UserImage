<?php
$target_dir = "Img_caricate/"; //Indica dove le immagini devono essere caricate
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); /* specifica il percorso del file da caricare
                                                                         NB:nel form HTML il tag input=file
                                                                         deve avere Id e name = fileToUpload*/
$baseName=basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;// è una variabile per indicare che il programma sta caricando il file
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // contiene l'estensione del file
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ". check1 <br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.check1 <br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Esiste già un file chiamato così. Rinomina il file per poterlo caricare. check2 <br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large. check2 <br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. check3 <br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. check3 <br>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. check4 <br>";
            require 'backend/Database/Carica_proprietario.php';
        } else {
            echo "Sorry, there was an error uploading your file. check4 <br>";
        }
    }
    ?>