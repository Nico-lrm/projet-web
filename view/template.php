<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/<?= $style ?>.css">
        <script src="public/js/script.js"></script>
    </head>
    <body id="body">
        <header>
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg px-4">
                <div class="container-fluid m-auto">
                    <a class="navbar-brand" href="#">ShareMyHouse</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar" aria-controls="menuNavbar" aria-expanded="false" aria-label="Afficher le menu">>
                        <span class="navbar-toggle-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="menuNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">   
                                <a href="/" class="nav-link"><i class="bi bi-house-fill"></i>Accueil</a>
                            </li>
                            <?php if(isset($_SESSION["loggedin"])):?>
                                <li class="nav-item">
                                    <a href="?page=locations" class="nav-link">Liste des locations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Mes réservations/locations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Mon profil</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=dc" class="nav-link">Déconnexion</a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a href="#modalConnexion" class="nav-link" data-bs-toggle="modal"><i class="bi bi-person-fill"></i>Connexion</a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php if(!isset($_SESSION["loggedin"])) :?>
                <!-- Modal de connexion-->
                <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Connexion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="?page=signin" method="post" id="form-si">
                                        <div class="mb-2">
                                            <label for="email-si" class="form-label">Adresse e-mail</label>
                                            <input type="email" class="form-control" id="email-si" name="email-si" required>
                                            <div class="invalid-feedback">Adresse e-mail incorrecte</div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="password-si" class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" id="password-si" name="password-si" required>
                                            <div class="invalid-feedback">Taille de mot de passe incorrecte</div>
                                        </div>
                                        <div class="mb-2 form-check">
                                            <input type="checkbox" class="form-check-input bg-dark" id="reminder-si">
                                            <label class="form-check-label" for="reminder-si">Se rappeler de moi</label>
                                        </div>
                                        <button id="button-si" type="submit" class="btn-form btn btn-dark">
                                            <span id="spinner-si" class="spinner-grow hidden"></span>
                                            <span id="button-text-si">Se connecter</span>
                                        </button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <a href="" data-bs-target="#modalInscription" data-bs-toggle="modal">Créer son compte</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal d'inscription -->
                <div class="modal fade" id="modalInscription" tabindex="-1" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Créer son compte</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="?page=signup" method="post" id="form-su">
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="firstname-su" class="form-label">Prénom</label>
                                                <input type="text" class="form-control" id="firstname-su" name="firstname-su" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="name-su" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="name-su" name="name-su" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-2">
                                                <label for="birthday-su" class="form-label">Date de naissance</label>
                                                <input type="date" class="form-control" id="birthday-su" name="birthday-su" required>
                                                <div class="invalid-feedback">Il faut avoir au moins 18 ans pour pouvoir accéder au site</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label for="email-su" class="form-label">Adresse e-mail</label>
                                                <input type="text" class="form-control" id="email-su" name="email-su" required>
                                                <div class="invalid-feedback">Adresse e-mail incorrecte</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="password-su" class="form-label">Mot de passe</label>
                                                <input type="password" class="form-control" id="password-su" name="password-su" required>
                                                <div class="invalid-feedback" id="password-su-i-fb">Mot de passe incorrect</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="confirm-password-su" class="form-label">Confirmation Mot de passe</label>
                                                <input type="password" class="form-control" id="confirm-password-su" name="confirm-password-su" required>
                                                <div class="invalid-feedback" id="password-su-i-fb">Les mots de passes ne correspondent pas</div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="button-su" type="submit" class="btn-form btn btn-dark">
                                        <span id="spinner-su" class="spinner-grow hidden"></span>
                                        <span id="button-text-su">Créer son compte</span>
                                    </button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <a href="" data-bs-target="#modalConnexion" data-bs-toggle="modal">Se connecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </header>
        <!-- Contenu principal, chargés dynamiquement via PHP -->
        <main>  
            <?= $content ?>
        </main>
        <!-- Pied de page -->
        <footer id="footer">
            <nav class="navbar navbar-dark bg-dark justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">CGV</a>
                    </li>
                </ul>
            </nav>
        </footer>   
        <?php if(!isset($_SESSION["loggedin"])):?>
            <script src="public/js/login.js"></script>
            <script src="public/js/signup.js"></script>
        <?php endif ?>
        <?= $script ?>
    </body>
</html>