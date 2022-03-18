<?php $title = 'Page de Profil' ?>
<?php $style = 'profil' ?>
<?php $script = '<script src="public/js/locations.js"></script>' ?>
<?php ob_start(); ?>
<?php
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
                {
                    $tailleMax = 2097152;
                    $extensionsValides = array('jpg', 'jpeg', 'png');
                    if($_FILES['avatar']['size'] <= $tailleMax)
                    {
                        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));  //VERFIF
                        if(in_array($extensionUpload, $extensionsValides))
                        {
                            $chemin = "projet-web-main/avatar/".$_SESSION['id'].".".$extensionUpload;
                            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                            if($resultat)
                            {
                                $updateavatar = $bdd->prepare('UPDATE avatar SET avatar = :avatar WHERE id = :id'); // LIGNE A REVOIR CAR BDD
                                $updateavatar->execute(array('avatar' => $_SESSION['id'].".".$extensionUpload, 'id' => $_SESSION['id']));
                            }
                            else
                            {
                                $msg = "Erreur durant limportation de votre photo de profil";
                            }
                        }
                        else
                        {
                            $msg = "Votre photo de profil doit être au format jpg, jpeg ou png";
                        }
                    }
                    else
                    {
                        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
                    }
                }
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <form method="POST" action="" enctype="multipart/form-data"> <!--permet upload de fichier-->
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <input type="file" name="avatar"/>
                
                <span class="font-weight-bold">Alexandre</span><span class="text-black-50">alexandre.delavaquerie@gmail.com</span><span> </span></div>
            
        </div>

        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Modifier le profil :</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control" placeholder="Prénom" value=""></div>
                    <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" value="" placeholder="Nom"></div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Numéro de Téléphone</label><input type="text" class="form-control" placeholder="Entrez votre numéro de téléphone" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Infos</label><br><textarea name="textarea" class="form-control" placeholder="A propos de moi :"></textarea></div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Pays</label><input type="text" class="form-control" placeholder="Pays" value=""></div>
                    <div class="col-md-6"><label class="labels">Région</label><input type="text" class="form-control" value="" placeholder="Région"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="Submit"><a class="btn btn-primary" href="profileView" role="button">Enregistrer</a></button></div>
            </div>
            <hr>
            <div class="row mt-3">
                <h4 class="text-right">Commentaires :</h4>
            </div>
                
        </div>
        
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>