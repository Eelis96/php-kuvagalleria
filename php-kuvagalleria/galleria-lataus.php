<?php
if(isset($_POST['submit'])){

    $kuvanNimi = htmlspecialchars($_POST['kuvan-nimi']);
    $ottajaNimi = htmlspecialchars($_POST['ottajan-nimi']);
    $kuva = $_FILES['tiedosto'];

    if(empty($kuvanNimi) || empty($ottajaNimi) || empty($kuva)){
        header('location:index.php?failed');
    }else{
        

    }



}else{
    header('location:index.php');
}
?>