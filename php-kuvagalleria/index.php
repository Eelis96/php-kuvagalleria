<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Kuvagalleria</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="jumbotron" style="background-color:#593196">
        <h1 style="color:white">PHP Kuvagalleria</h1>
    </div>

    <?php
        if(isset($_GET['error'])){
            echo '<div class="alert alert-dismissible alert-danger">
                    <strong>Jokin meni pieleen. Varmista, että kaikki kentät ovat täytetty!</strong>
                  </div>';
        }

        if(isset($_GET['success'])){
            echo   '<div class="alert alert-dismissible alert-success">
                    <strong>Kiitos Kuvasta!</strong>
                </div>';
        }

        if(isset($_GET['error=filetype'])){
            echo '<div class="alert alert-dismissible alert-danger">
                    <strong>Väärä tiedosto tyyppi!</strong>
                  </div>';
        }

        if(isset($_GET['error=filesize'])){
            echo '<div class="alert alert-dismissible alert-danger">
                    <strong>Tiedosto on liian suuri!</strong>
                  </div>';
        }
    ?>

    <div class="container">
        <div class="gallery-container">
            <?php
                $xml = simplexml_load_file('kuvat.xml');
                
                foreach($xml->kuvantiedot as $kuvantiedot){
                echo '<a href=""></a>
                    <img src="' .$kuvantiedot->kuva. '" width="200px" height="200px" alt=""> 
                    <h2>' .htmlspecialchars($kuvantiedot->nimi). '</h2>
                    <p> '.htmlspecialchars($kuvantiedot->ottaja). '</p>';
                } 
            ?>
        </div>
    </div>

    <div class="container">
        <div class="form-group">
            <form action="galleria-lataus.php" method="post" enctype="multipart/form-data">
                <input type="text" name="kuvan-nimi" placeholder="Kuvan Nimi" class="form-control"><br>
                <input type="text" name="ottajan-nimi" placeholder="Kuvan Ottajan Nimi" class="form-control"><br>
                <input type="file" name="tiedosto" class="form-control-file"><br>
                <button type="submit" name="submit" class="btn btn-primary">Lataa Kuva</button><br>
            </form>
        </div>
    </div>
</body>
</html>