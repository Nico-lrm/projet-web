<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="public/js/script.js"></script>
    </head>
    <body id="body">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <div class="container-fluid m-auto">
                <a class="navbar-brand" href="#">ShareMyHouse</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar" aria-controls="menuNavbar" aria-expanded="false" aria-label="Afficher le menu">>
                    <span class="navbar-toggle-icon"></span>
                </button>        <div id="test">
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
                            <a href="#modalConnexion" class="nav-link" data-bs-toggle="modal">Connexion</a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header>
            <!-- Modal de connexion-->
            <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Connexion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                    <div class="mb-2">
                                        <label for="email" class="form-label">Adresse e-mail</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="mb-2">
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div class="mb-2 form-check">
                                        <input type="checkbox" class="form-check-input bg-dark" id="reminder">
                                        <label class="form-check-label" for="reminder">Se rappeler de moi</label>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Se connecter</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="#" onclick="changeModal()">Créer son compte</a>
                            <a href="">Mot de passe oublié ?</a>
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
                            <form action="" method="post">
                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Nom</label>
                                            <input type="email" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="firstname" class="form-label">Prénom</label>
                                            <input type="password" class="form-control" id="firstname">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="email_inscription" class="form-label">Adresse e-mail</label>
                                        <div class="mb-2 input-group">
                                            <input placeholder="monadresse" type="text" class="form-control" id="email_inscription">
                                            <span class="input-group-text">@</span>
                                            <input placeholder="gmail.com" class="form-control" type="text" name="server" id="server">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="password_inscription" class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" id="password_inscription">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="confirm_password_inscription" class="form-label">Confirmation Mot de passe</label>
                                            <input type="password" class="form-control" id="confirm_password_inscription">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-dark">Créer son compte</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="#" onclick="changeModal()">Se connecter</a>
                        </div>
                    </div>
                </div>
            </div>
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

    </body>
</html>