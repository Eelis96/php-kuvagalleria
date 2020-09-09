<?php
if(isset($_POST['submit'])){

    if(empty($_POST['kuvan-nimi']) || empty($_POST['ottajan-nimi']) || !isset($_FILES['tiedosto']) || $_FILES['tiedosto']['error'] == UPLOAD_ERR_NO_FILE){
        header('location:index.php?error');
    }else{
        $file = $_FILES['tiedosto'];

        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileTempName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array("jpg", "jpeg", "png");

        //katsoo onko tiedoston tyyppi hyväksytty
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                //katsoo onko tiedoston koko tarpeeksi pieni
                if($fileSize < 200000){
                    //antaa uniikin nimen tedostolle ja siirtää sen kansioon
                    $fullFileName = $fileName . "." . uniqid("", true) . "." . $fileActualExt;
                    $fileDestination = "../img/gallery" . $fullFileName;

                    move_uploaded_file($fileTempName, $fileDestination);

                    include_once('functions.php');

                    saveToXml($_POST['kuvan-nimi'], $_POST['ottajan-nimi'], $fileDestination);

                    header('location:index.php?success');
                }else{
                    header('location:index.php?error=filesize');
                    exit();
                }
            }else{
                header('location:index.php?error');
                exit(); 
            }
        }else{
            header('location:index.php?error=filetype');
            exit();
        }
    }

}else{
    header('location:index.php');
}
