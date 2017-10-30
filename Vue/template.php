<!--
/**
* Created by PhpStorm.
* User: Nico
* Date: 18/08/2017
* Time: 11:58
*/
-->
<?php

define('HOST', $host );
define('ASSETS', $host.'/P4/public/');


?>

<!doctype html>

<html lang="fr">
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Billet simple pour l'Alaska">
    <meta name="author" content="Jean Forteroche">

    <base href="<?= $racineWeb ?>" >
    <link rel="stylesheet" href="<?= ASSETS . "stylesheet"?>">
    <link rel="stylesheet" href="<?= ASSETS . "font-awesome.min.css"?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


    <title><?= $titre ?></title>

</head>

<body>
    <div id="bloc_page" class="container">
        <header>
        <div id="navigation" class="container-fluid">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills float-right">
                        <li class="nav-item">
                            <a class="nav-link" href="accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin">Admin<i class="fa fa-lock" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <h3 class="text-muted"><a class="nav-link" href="accueil">Billet simple pour l'Alaska</a></h3>
                </nav>

            </div>
        </div>
        </header>


    <div id="contenu">

        <?= $contenu ?>

    </div>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">@Nico2p</span>
        </div>
    </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>