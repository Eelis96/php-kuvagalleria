<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Kuvagalleria</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="jumbotron">
        <h1>PHP Kuvagalleria</h1>
    </div>

    <?php
        if(isset($_GET['failed'])){
            echo '<div class="alert alert-dismissible alert-danger">
                    <strong>Täytä Kaikki Tyhjät Kentät!</strong>
                  </div>';
        }

        if(isset($_GET['success'])){
            echo   '<div class="alert alert-dismissible alert-success">
                    <strong>Kuvasi Odottaa Hyväksyntää!</strong>
                </div>';
        }
    ?>

    <div class="container">
        <div class="gallery-container">
            <a href="#"></a>
                <div></div>
                <h2>Otsikko</h2>
                <p>Teksti</p>
            </a>
            <a href="#"></a>
                <div></div>
                <h2>Otsikko</h2>
                <p>Teksti</p>
            </a>
            <a href="#"></a>
                <div></div>
                <h2>Otsikko</h2>
                <p>Teksti</p>
            </a>
            <a href="#"></a>
                <div></div>
                <h2>Otsikko</h2>
                <p>Teksti</p>
            </a>
            <a href="#"></a>
                <div></div>
                <h2>Otsikko</h2>
                <p>Teksti</p>
            </a>
        </div>

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