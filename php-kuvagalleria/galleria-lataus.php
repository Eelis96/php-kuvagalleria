<?php
if(isset($_POST['submit'])){

    if(empty($_POST['kuvan-nimi']) || empty($_POST['ottajan-nimi']) || !isset($_FILES['tiedosto']) || $_FILES['tiedosto']['error'] == UPLOAD_ERR_NO_FILE){
        header('location:index.php?failure');
    }else{
        include_once('functions.php');

        saveToXml($_POST['kuvan-nimi'], $_POST['ottajan-nimi'], $_FILES['tiedosto']);

        header('location:index.php?success');
    }

}else{
    header('location:index.php');
}