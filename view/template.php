<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="public/js/script.js"></script>
    </head>
    <body id="body">
        <div id="test">
            <header>
                <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
                    <div class="container-fluid m-auto">
                        <a class="navbar-brand" href="#">ShareMyHouse</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar" aria-controls="menuNavbar" aria-expanded="false" aria-label="Afficher le menu">>
                            <span class="navbar-toggle-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="menuNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Accueil</a>
                                </li>
                                <?php if(isset($_SESSION["login"])):?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Liste des locations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Mes réservations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Mes locations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Mon Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Déconnexion</a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Connexion</a>
                                </li>
                                <?php endif ?>
                                <
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main>  
                <?= $content ?>
            </main>
            <footer id="footer">
                <nav class="navbar navbar-dark bg-dark justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">CGV</a>
                        </li>
                    </ul>
                </nav>
            </footer>   
        </div>
    </body>
</html>